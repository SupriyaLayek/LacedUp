<?php

namespace App\Http\Controllers;
use App\Product;
use App\Cart;
use Stripe\Stripe;
use Stripe\Charge;
use App\Category;
use Session;
use Mail;
use Auth;
use App\Mail\ConfirmationMail;
use App\Mail\AdminMail;
use App\Order;
use App\OrderDetail;
use App\Shipping;
use App\User;
use Validator;
use PDF;


use Illuminate\Http\Request;

class CartController extends Controller
{
    /* Add products to cart*/ 
    public function getAddToCart(Request $request){
        $input = $request->all();
        $product = Product::find($input['product_id']); //find the product with its id
        $oldCart = Session::has('cart') ? Session::get('cart') :null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

         $request->session()->put('cart',$cart);
    // dd($request->session()->get('cart'));
              return ['status' => 'success'];

    }

    /* Cart listing: showing all the products in cart */
    public function getCart(){

        if(!Session::has('cart')){
            return view('Pages.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('Pages.cart',['products'=> $cart->items, 'totalPrice'=>$cart->totalPrice]);
    }
    /* Return payment page*/
    public function getCheckout(Request $request, $id){
           
      if(!Session::has('cart')){
            return view('Pages.cart');
        }  
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        $n = session()->get('cart');
        $OldAddress= Shipping::where('user_id',Auth::User()->id)->where('id',$id)->first(); 

        return view('Pages.checkout',['total' =>$total, 'products'=> $cart->items],compact('n','OldAddress')); 
    }
      /* handle payment */
    public function postcheckout(Request $request){
        /* if session does not have cart redirect to store */
      if (!Session::has('cart')) {
            return redirect()->route('shop');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
       
          Stripe::setApiKey('sk_test_donlLrAdIlkujPEoiB2wigKR00F9BomaR6');

            try {
            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtained from Stripe.js
                "description" => "Test Charge"
            ));

                 $order = new Order();
                $order->user_id = Auth::User()->id;
                $order->user_name = Auth::User()->name;
                $order->total_products = $cart->totalQty;
                $cart->totalPrice = $charge->amount/100;
                $order->total_price = $cart->totalPrice;
                $order->payment_id = $charge->id;
                $order->cart = serialize($cart);
                $order->save();

                $s = Order::where('id',$order->id)->first();
              
            foreach ($cart->items as $thing) {
                 $order_data=new OrderDetail();
                 $order_data->user_id = Auth::User()->id;
                 $order_data->order_id = $s->id;               
                 $order_data->product_id = $thing['item']['id'];
                 $order_data->quantity = $thing['qty'];
                 $order_data->price = $thing['price'];
                 $order_data->save();
            }

        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
          $user = Auth::user();
            $data = Order::find($s->id);
          
           // dd($pdf);
            //$url = url('resources/views/Pages/mail.blade.php');
          $pdfpath = public_path().'/invoiceuser/'.$order->id.'.pdf';
            // PDF::(loadHtml($pdf)->save($pdfpath)->render()->stream($order->id.'.pdf'));
  $pdf = PDF::loadView('Pages.mail', compact('cart'))->save($pdfpath)->stream($order->id.'.pdf');
  // return $pdf->stream($pdfpath);
            //dd($cart );
            /*$pdf = PDF::loadView('Pages.mail', compact('data'));
            return $pdf->download('invoice.pdf');*/
            Mail::to($user->email)->send(new ConfirmationMail($cart, $pdfpath));//send invoice mail to user

            Mail::to('admin@gmail.com')->send(new AdminMail($cart, $pdfpath)); //send invoice mail to admin
               Session::forget('cart'); //empty cart
               $order = Order::where('user_id',Auth::User()->id)->where('id',$order->id)->first();
               $cart = unserialize($order->cart);
           
        return view('Pages.orderConfirm')->with(compact('order','cart'));
    } 


     public function downloadPDF($id){
      $data = Order::find($id);

      $pdf = PDF::loadView('Pages.mail', compact('data'));
      return $pdf->download('invoice.pdf');

    }

    /* Reduce the quantity by one */
    public function reducebyone(Request $request) {
        $input = $request->all();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($input['product_id']); //calling the method from cart.php
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('Pages.minicart',['products' => $cart->items,'totalPrice' => $cart->totalPrice]);
         
    }



    /* Remove the complete product from cart */
     public function removeitem(Request $request) {
        $input = $request->all();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeitem($input['product_id']);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        //  dd($cart);
        return view('Pages.minicart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
      }

        /* Increase the quantity of product present in cart */
     public function addone(Request $request)
        {
        $input = $request->all();
        
                $oldCart = Session::has('cart') ? Session::get('cart') : null;
                $cart = new Cart($oldCart);
                $cart->addone($input['product_id']);
        
                Session::put('cart', $cart);
                
        //  dd($cart);
        return view('Pages.minicart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
        }

   /* handle shipping details*/
    public function getship(){
        $Oldaddress= Shipping::where('user_id',Auth::User()->id)->orderBy('created_at','desc')->take(2)->get(); //take 2 recently created shipping address
        if(!Session::has('cart')){ 
            return view('Pages.cart');
        }  
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;

        return view('Pages.shippingDetails',compact($Oldaddress) ,['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'Oldaddress' => $Oldaddress]);
    }

            /* Store the adress in the database*/
    public function store(Request $request){
       
        $validator = Validator::make($request->all(), [
            'address'=>'required',
           'phone'=>'required|numeric',
           'city'=>'required',
           'state'=>'required',
           'postcode'=>'required|numeric',
            'country'=>'required',
        ]);

     
        $data = new Shipping();
      $data->user_id = Auth::User()->id;
      $data->address = $request->input('address');
       $data->phone = $request->input('phone');
      $data->city = $request->input('city');
      $data->state = $request->input('state');
      $data->postcode = $request->input('postcode');
      $data->country = $request->input('country');

      $data->save();
      $Oldaddress= Shipping::where('user_id',Auth::User()->id)->orderBy('created_at','desc')->first();
      
      return redirect('/checkout/'.$Oldaddress['id'])->with('Success','successfully done');
      }
              /* Edit shipping address*/
     public function editaddress($id)
      {   
        $newad = Shipping::find($id);
        return view('Pages.editaddress', compact('newad','id'));
      }
         /* Update the shipping address*/
      public function updateaddress(Request $request)
        {     
             $id = $request->id;
            $newad = Shipping::find($id);
            $newad->address = $request->get('address');
            $newad->phone = $request->get('phone');
            $newad->city = $request->get('city');  
            $newad->postcode = $request->get('postcode');          
            $newad->country = $request->get('country');
            $newad->save();
            return redirect()->route('ship')->with('success','Address changed successfully');
        }

       /* Delete the existing shipping address of the user*/
    public function deleteaddress($id)
        {
          $newad = Shipping::where('id',$id)->delete();
          return redirect()->back()->with('success','Address Deleted Successfully !');
        }
   }




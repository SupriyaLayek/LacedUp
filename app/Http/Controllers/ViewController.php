<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Contact;
use Mail;
use App\Mail\ContactMail;

class ViewController extends Controller
{ 
    /* Single page view of the product */
    public function single($id) {

    	$products = Product::find($id);

    	return view('Pages.shop-single',compact('products'));
    }
    public function index(){
    	//$products = Product::all();

    	

      $category = Category::where('status',1)->pluck('id')->toArray();
        //dd($categories);
        $products = Product::orderBy('created_at','desc')->whereIn('category_id',$category)->where('status', 1)->paginate(6);;
        //$products= $products->paginate(6);

    	//$products = Product::where('status',1)
       return view('Pages.index', compact('products'));

    }

    public function shop(Request $request){
         
                   
    	$products = Product::all();
      //dd($products);
        $categories = Category::where('status',1)->pluck('id')->toArray();
        //dd($categories);
        $name=$request->get('search','');

            $condtion=$name!='' ? [['product_name','LIKE','%'.$name.'%']] : [];

        $products = Product::whereIn('category_id',$categories)->where($condtion)->where('status', 1)->paginate(8);
        if(count($products) <= 0){
        
        //dd($products); 
        
    	return view('Pages.noproducts',compact('products')); //no products available
          } 
    else{
      return view('Pages.shop',compact('products')); // return store page
    }
    }

        /* Product listing according to category*/  
      public function categoryList($id){
       $cat = Category::where(['id'=> $id])->first();
        $products = Product::where('category_id',$cat->id)->where('status', 1)->get();
        return view('Pages.shop',compact('products'));
    }

    /* Store contact details in database */
   public function contact(Request $request){
      
      $data = new Contact();
    
      $data->name = $request->get('name');
       $data->email = $request->get('email');
      $data->phone = $request->get('phone');
      $data->message = $request->get('message');
      $data->save();
       Mail::to('admin@gmail.com')->send(new ContactMail($data)); //sending mail to admin whenever anyone sends a message
      return redirect('/contact')->with('Success','successfully done');
      
   }
}

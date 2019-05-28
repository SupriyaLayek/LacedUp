<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Category;
use Session;
use DB;
use App\Review;
use Auth;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Product listing page
    public function index(Request $request)  
    {     
         $product = Product::orderBy('created_at','desc')->where('deleted_at',NULL);   
         if($request->has('search'))   //search products with their name
         {       
            $name=$request->search;
            $product = $product->where('product_name','LIKE','%'.$name.'%');
        }
        
         $product = $product->paginate(10); //pagination
         
         // $product = Product::where('status', 1)->get();
        
         return view('admin.adminPages.Products.products',compact('product'));
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    //creating category
    public function create()
    {

         $category = Category::all();
        return view('admin.adminPages.Products.createproducts',compact('category'))->with('success','Product created successfully!'); //returns the create product form
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    //store all the products in the database
    public function store(Request $request)
     {


          $this->validate($request,[
            
     'product_name'  =>  ['required','min:5','max:20'],           
     'product_colour' => ['required'],
     'description' => ['required','min:5','max:255'],
     'price' => ['required','numeric'],
     'size' => ['required'],
      'product_image' => ['required']


      ]);
       $product = new Product(); //new object creation
       
       $product ->category_id   =  $request->input('category_id');
       $product->product_name   =  $request->input('product_name');
       $product->product_colour =  $request->input('product_colour'); 
       $product->description    =  $request->input('description'); 
       $product->price          =  $request->input('price'); 
       $product->size           =  $request->input('size');

          

        if($request->has('product_image'))     //upload image 
        {
            $file = $request->product_image;

            $filename = time(). '.' . $file->getClientOriginalExtension();

            $file = $file->move(public_path().'/images/users/', $filename);

            $product->image = $filename;
        }

        $product->save();

        return redirect('/product')->with('Success','successfully done');
     

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /*edit the details of existing product */ 
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.adminPages.Products.editProduct', compact('product','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /* update product details */
    public function update(Request $request, $id)
     {
    //       $this->validate($request,[
    //             'name' => 'required',
    //             'description' => 'required'
           
    //        ]);

            $product = Product::find($id);  //find product using id
            
            $data = $request->all();
            $product->product_name = $request->get('product_name');
            $product->product_colour = $request->get('product_colour');
            $product->description = $request->get('description');
            $product->price = $request->get('price');
            $product->size = $request->get('size');
            $product_image = $request->get('product_image');

            if($request->hasFile('product_image'))
        {

            $imageName = time().'.'.$data['product_image']->getClientOriginalExtension();
                request()->product_image->move(public_path('images/users'),$imageName);
            $product->image = $imageName;
        }
        else {
            $product->image = $product_image;
        } 
            
        $product->save();


        return redirect('/product')->with('Success', 'Product updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /* delete product */
    public function destroy($id)
    {
         $product = Product::find($id);
        $product->delete(); //deleting the product
        return redirect('/product')->with('success', 'Data Deleted');//redirecting to the product page with flash message
    }

 /*Status of the product */  
public function changeProduct(Request $request){
        if($request->ajax()){

            $c_id = $request->input('id');
            $status = $request->input('status');

            if($status == 0){
                $status = 1;    //deactivate the product 
            }
            else {
                $status = 0;    //activate the product
            }

            $check = DB::table('products')->where('id',$c_id)->update(['status'=> $status]);
            if($check){
                return ['status' => true]; //product active->visible to user
            } else {
                return ['status' => false]; //product inactive->not visible in front end 
            }

           }
        }

        
   }

<?php

namespace App\Http\Controllers;
use App\Category;
use DB;
use App\Product;
use App\Cart;
use Session;
use Validator;


use Illuminate\Http\Request;

class CategoryController extends Controller  
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*Category listing */
    public function index(Request $request)  
    {
        $category= Category::where('deleted_at', NULL);
       // dd($category);
        if($request->has('search'))  //category searching by its name
        {       
            $name=$request->search;
            $category = $category->where('name','LIKE','%'.$name.'%');
        }
        $category = $category->paginate(3);
        return view('admin.adminPages.category.allcategories',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*Creating category */
    public function create()
    {
        return view('admin.adminPages.category.createcategory'); //returns the page to create category
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /* Store all the categories in database */
    public function store(Request $request)
    {    
        //server side validations
       $this->validate($request,[            
   'name'  =>  ['required','min:5','max:20'],           
     'description' => ['required','min:5','max:20']
      ]);
        $category = new Category();      //creating an object of category
       $category->name= $request->input('name');
       $category->description= $request->input('description');  
  
        $category->save();          //save category in the database
      return redirect('/category')->with('Success','Category added'); //redirects to the category listing page

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

        /*Edit category */
    public function edit($id)
    {
         $category = Category::find($id);
        return view('admin.adminPages.category.editCategory', compact('category','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

        /* Update category*/
    public function update(Request $request, $id)
    {
        
           $this->validate($request,[
                'name' => 'required',
                'description' => 'required'
           
           ]);

            $category = Category::find($id); 
            $category->name = $request->get('name');
            $category->description = $request->get('description');
             $category->save();


        return redirect('/category')->with('success','Category Updated'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

        /* Delete category*/
    public function destroy($id)
    {                                           
        $category = Category::find($id);
        $category->delete();                //delete category
        return redirect('/category')->with('success', 'Data Deleted');
    }

        /* Handle status of the category*/
    public function changeCategory(Request $request){
        if($request->ajax()){
            $c_id = $request->input('id');
            $status = $request->input('status');

            if($status == 0){
                $status = 1;
            }
            else {
                $status = 0;
            }

            $check = DB::table('category')->where('id',$c_id)->update(['status'=> $status]);
            if($check){
                return ['status' => true];  //active state
            } else {
                return ['status' => false]; //inactive state
            }

           }
        }

    }

    


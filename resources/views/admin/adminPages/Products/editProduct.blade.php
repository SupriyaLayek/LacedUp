@extends('layouts.adminMain')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">  

            <!-- Page-Title -->
           
                <h4 class="m-t-0 header-title"><b>Add Product</b></h4>
                    <div class="container">
                        <div class="rows">

                            
                         <form method="post" id="createproduct" action="{{ route('product.update', $id)}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                         <table class="tablesaw m-t-20 table m-b-0" data-tablesaw-mode="stack">
                           <tbody>
                            <!--  -->

                             
                             <td><label for"name">Name</label></td>
                             <td><input type="text" name="product_name" style="width:300px" value="{{$product->product_name}}" autocomplete="off" autofocus></td>
                             </tr>
                             <tr>
                             <tr>
                             <td><label for"color">Color</label></td>
                             <td><input type="text" name="product_colour" style="width:300px" value="{{$product->product_colour}}" autocomplete="off" autofocus></td>
                             </tr>
                             <tr>
                             <td><label for"price">Price</label></td>
                             <td><input type="number" name="price" style="width:300px"  autocomplete="off" value="{{$product->price}}" autofocus></td>
                             </tr>
                              <tr>
                             <td><label for"size">Size</label></td>
                             <td><input type="number" name="size" style="width:300px"  autocomplete="off" value="{{$product->size}}" autofocus></td>
                             </tr>
                             <tr>
                             <td><label for"name">Details</label></td>
                             <td>
                             <textarea id="description" name="description" class="form-control"  rows="3" placeholder="Description">{{$product->description}}</textarea>
                             </td>
                             </tr>
                             <tr>
                                 <td><label for="image">Upload Image </label><td>
                                <td><input type="file" name="product_image" id="image" >
                                 <img src="{{asset('images/users/'.$product->image)}}" width="100px">
                                 </td>
                             </tr>
                            
                                  
                                </div>
                            
                             
                             <tr>
                             <td><center><button class="btn btn-primary" type="submit">Submit</button></center></td>
                             </tr>
                         </tr>
                     </td>
                 </td>
             </tr>
         </tr>
     </tbody>
      </table>
  </form>
   </div>
   </div>
    </div>
     </div>
   </div>


        


@endsection


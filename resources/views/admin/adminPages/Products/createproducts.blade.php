@extends('layouts.adminMain')
@section('content')


@foreach($errors->all() as $error)
<div class="row">
    <div class="alert alert-danger alert-dismissible col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Warning!</strong> {{$error}}
    </div>
</div>
@endforeach
 @if($message = Session::get('success'))
   <div class="alert alert-success">
      <p>{{$message}}</p>     
</div>
 @endif
 

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid"> 

            <!-- Page-Title -->
          
                <h4 class="m-t-0 header-title"><b>Add Product</b></h4>
                    <div class="container">
                        <div class="rows">
                            
                            
                         <form method="post" id="createproduct" action="{{url('/product') }}" autocomplete="off"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                         <table class="tablesaw m-t-20 table m-b-0" data-tablesaw-mode="stack">
                           <tbody> 
                            <tr>
                              <td>  <label class="col-2 col-form-label">Category</label></td>
                                 <td>   <select id="category_id" style="width: 300px" name="category_id">
                                    <option selected disabled>Select</option>

                                    @foreach($category as $category)
                                       <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                </select> 
                            </td>

                            </tr>
                           
                             <tr>
                             <td><label for"name">Name</label></td>
                             <td><input type="text" name="product_name" style="width:300px"  autocomplete="off" autofocus></td>
                             </tr>
                             <tr>
                             <tr>
                             <td><label for"color">Color</label></td>
                             <td><input type="text" name="product_colour" style="width:300px"  autocomplete="off" autofocus></td>
                             </tr>
                             <tr>
                             <td><label for"price">Price</label></td>
                             <td><input type="number" name="price" style="width:300px"  autocomplete="off" autofocus></td>
                             </tr>
                              <tr>
                             <td><label for"size">Size</label></td>
                             <td><input type="number" name="size" style="width:300px"  autocomplete="off" autofocus></td>
                             </tr>
                             <tr>
                             <td><label for"name">Details</label></td>
                             <td>
                             <textarea id="description" name="description" class="form-control"  rows="3" placeholder="Message"></textarea>
                             </td>
                             </tr>
                             <tr>

                                 <td><label for="image">Upload Image </label><td>
                                <td><input type="file" name="product_image" id="image" width="100px"></td>
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

                     
               


                           </tbody>
                             </table>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        


@endsection


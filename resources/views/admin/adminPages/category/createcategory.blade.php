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

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title" style="font-size:20px;">Category </h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="{{url('/product')}}">Product</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/category')}}">Categories</a></li>
                            </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
</div>



            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">

                    <h4 class="m-t-0 header-title"><b>Add Category</b></h4>
                        <div class="container">
                            <div class="rows">
                             <form method="post" id="createcategory" name="createcategory" action="{{action('CategoryController@store') }}" autocomplete="off" >
                                {{ csrf_field() }}   
                             <table class="tablesaw m-t-20 table m-b-0" data-tablesaw-mode="stack">
                               <tbody>
                                <tr>
                                 <td><label for"name">Category name</label></td>
                                 <td><input type="text" name="name" style="width:300px"  autocomplete="off" autofocus ></td>
                                 </tr>
                                 <tr>
                                  <td><label for"description">Detail</label></td>
                                 <td><input type="text" name="description" style="width:300px; height:94px;"  autocomplete="off" autofocus  ></td> 


                                 </tr>
                                 <tr>
<td><center><button class="btn btn-primary" type="submit" style="position: relative; float: left;">Submit</button></center></td>
</tr>
                               </tbody>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> 
</table>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection

    

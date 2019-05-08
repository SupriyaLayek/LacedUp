@extends('layouts.adminMain')
@section('content')

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
           



            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">

                    <h4 class="m-t-0 header-title"><b>Edit Category</b></h4>
                        <div class="container">
                            <div class="rows">
                             <form method="post" id="createcategory" name="createcategory" action="{{ route('category.update', $id)}}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                             <table class="tablesaw m-t-20 table m-b-0" data-tablesaw-mode="stack">
                               <tbody>
                                <tr>
                                 <td><label for"name">Category name</label></td>
                                 <td><input type="text" name="name" value="{{$category->name}}" style="width:300px"  autocomplete="off" autofocus required></td>
                                 </tr>
                                 <tr>
                                  <td><label for"description">Detail</label></td>
                                 <td><input type="text" name="description" value="{{$category->description}}" style="width:300px; height:94px;" autocomplete="off" autofocus  required></td> 


                                 </tr>
                                 <tr>
<td><center><button class="btn btn-primary" type="submit" >Submit</button></center></td>
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

    

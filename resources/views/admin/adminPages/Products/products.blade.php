 @extends('layouts.adminMain')
 @section('content')

@if(Session::has('success'))
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>  
        </div>
    @endif
<div class="content-page"> 
    <!-- Start content -->
    <div class="content">  
        <div class="container-fluid">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                       <b style="position: relative;left: 393px;">PRODUCT MANAGEMENT</b>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">
                                <a href="{{action('ProductController@create')}}">Create</a></li>
                           
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


<div class="row">
    <div class="col-sm-12">
        <div class="card-box">

            <h4 class="m-t-0 header-title"><b>Products Table</b></h4>
             <ol class="breadcrumb float-left">
                          <li >
                            <form class="search" method="get" action="{{url('/product')}}" >

                                {{csrf_field()}}
                             <input type="text" placeholder="Search.." name="search">
                          <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                          </li>
                        </ol>


            <table class="tablesaw m-t-20 table m-b-0" data-tablesaw-mode="stack">
                <thead>
                <tr>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Name</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Colour</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Description</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">Price</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Size</th>
                     <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" >Image</th> 
                     <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" >Created_at</th> 
                     <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" >Updated_at</th> 
                     <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" >Status</th> 
                     

                    
                      <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">Action</th> 
                    
                </tr>
                </thead>  

                <tbody>
                @foreach($product as $rows)
                    <tr>
                        <td>{{$rows['product_name']}}</td>
                        <td>{{$rows['product_colour']}}</td>
                        <td>{{$rows['description']}}</td>
                        <td>${{$rows['price']}}</td>
                        <td>{{$rows['size']}}</td>
                      
                        
                       <td><img src="{{asset('images/users/'.$rows['image'])}}" width="100px"></td>
                       <td>{{$rows['created_at']->format('d/m/20y h:m:s')}}</td>
                        <td>{{$rows['updated_at']->format('d/m/20y h:m:s')}}</td>

                        <td>
                         @if($rows->status == 1)
                        <button class="btn btn-primary statusBtn" data-status="{{$rows->status}} " value="{{$rows->id}}">Active</button>
                         @else
                        <button class="btn btn-warning statusBtn" data-status="{{$rows->status}} " value="{{$rows->id}}">Deactive</button>
                         @endif

                     </td>

                        <td><a href="{{action('ProductController@edit',$rows['id'])}}" class="btn btn-primary">Edit</a>
                            <br>
                            <br>

                
             <form method="post" class="delete_form" action="{{action('ProductController@destroy',$rows['id'])}}">
              {{ csrf_field() }}
             <input type = "hidden" name = "_method" value = "DELETE" />
             <button type ="submit" class ="btn btn-danger">DELETE</button>

                </form>     
                       </td>
                    </tr>
                @endforeach
                
               
                </tbody>
    
            </table>
            {!!$product->links()!!}
        </div>
    </div>
</div>
<script type="text/javascript">
 $(document).ready(function(){
 $('.statusBtn').click(function(){
               var url = "{{ route('changeProduct') }}";
               var id= $(this).val();
               var status = $(this).data('status');
               var msg = (status== 0)? 'Activate' : 'Deactivate';
               if(confirm("Are you sure to "+ msg))
               {

                    $.ajax({
                        type: 'get',
                        url: url,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: {"id":id,"status":status},
                        success: function(data) {
                            console.log(data);
                            if(data.status){
                                location.reload();
                            }
                        },
                        error: { }
                    });
                }
           });
});
       </script>

  @endsection
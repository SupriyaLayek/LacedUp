<!-- All categories list-->

@extends('layouts.adminMain')

@section('content')
 
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                     <b style="position: relative;left: 393px;">CATEGORY MANAGEMENT</b>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href=" {{route('category.create')}}">Create</a></li>
                            
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            @if(\Session::has('success'))
            <div class="alert alert-succes">
                <p> {{ \Session::get('success') }}</p>
            </div>
            @endif
            <h4 class="m-t-0 header-title"><b>Category Table</b></h4>
             <ol class="breadcrumb float-left">
                          <li >
                            <form class="search" method="get" action="{{url('/category')}}" >

                                {{csrf_field()}}
                             <input type="text" placeholder="Search.." name="search">
                          <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                          </li>
                        </ol>
              <table class="table table-striped add-edit-table" id="datatable-editable">
                <thead>
                <tr>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Name</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Detail</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Created at</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Updated at</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Status</th>
                   
                    
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($category as $rows)
                <tr class="gradeX">
                    <td>{{$rows['name']}}</td>
                    <td>{{$rows['description']}}</td>
                    <td>{{$rows['created_at']->format('d-m-20y h:m:s') }}</td>
                    <td>{{$rows['updated_at']->format('d-m-20y h:m:s') }}</td>
                    <td>
                         @if($rows->status == 1)
                        <button class="btn btn-primary statusBtn" data-status="{{$rows->status}} " value="{{$rows->id}}">Active</button>
                         @else
                        <button class="btn btn-warning statusBtn" data-status="{{$rows->status}} " value="{{$rows->id}}">Deactive</button>
                         @endif

                     </td>

                   
                    
                    <td><a href="{{action('CategoryController@edit',$rows['id'])}}" class="btn btn-primary" >Edit</a>
                        <br>
                        <br>
                   
                    
             <form method="post" class="delete_form" action="{{action('CategoryController@destroy',$rows['id'])}}">
              {{ csrf_field() }}
             <input type = "hidden" name = "_method" value = "DELETE" />
             <button type ="submit" class ="btn btn-danger">DELETE</button>

                </form>             
                         

                 </td>
                </tr>
                @endforeach
            </tbody>
             {!!$category->links()!!}
        </table>
        </div>
    </div>
</div>


<script type="text/javascript">
 $(document).ready(function(){
 $('.statusBtn').click(function(){
               var url = "{{ route('changeCategory') }}";
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
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
                        <h4  class="page-title"><b style="position: relative;left: 393px; font-size: 15px;">ORDER MANAGEMENT</b></h4>
                       
                       
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
            <h4 class="m-t-0 header-title"><b>Orders</b></h4>
              <table class="table table-striped add-edit-table" id="datatable-editable">
                <thead>
                <tr>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">ID</th>
                     <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">User_ID</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">User</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Total Products purchased</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Total Price</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Payement Id</th>                   
                    
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Created At</th>
                     <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Updated At</th>
                     <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Details</th>
                     
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $rows)
                <tr class="gradeX">
                    <td>{{$rows['id']}}</td>
                     <td>{{$rows['user_id']}}</td>

                    <td>{{$rows['user_name']}}</td>
                    <td style="position: relative;left: 72px;">{{$rows['total_products']}}</td>
                    <td>${{$rows['total_Price']}}</td>
                    <td>{{$rows['payment_id']}}</td>
                    <td>{{$rows['created_at']->format('d/m/20y h:m:s')}}</td>
                    <td>{{$rows['updated_at']->format('d/m/20y h:m:s')}}</td>
                    <td>
                        <a href="{{url('orderDetails/'.$rows->id)}}">
                    <button class="btn btn-primary statusBtn">Order Detail</button></a>
                </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        {!!$orders->links()!!}
        </div>
    </div>
</div>


@endsection
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
                        <h4  class="page-title"><b style="position: relative;left: 393px;">ORDER DETAILS</b></h4>
                         <a href="{{url('orders')}}" style="position: relative;left: 850px;">Back</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">  
                        
                        <h4 class="m-t-0 header-title"><b>Orders</b></h4>
                        <table class="table table-striped add-edit-table" id="datatable-editable">
                            <thead>
                            <tr>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">ID</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Products Qty.</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Products Image</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Product_name</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Total Price</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderdetail as $rows)
                            
                            <tr class="gradeX">
                                <td>{{$rows->id}}</td> 
                                <td>{{$rows->quantity}}</td>
                                   
                                <td><img src="{{asset('images/users/'.$rows->product['image'])}}" width="100px"></td>
                                <td>{{$rows->product['product_name']}}</td>
                                <td>${{$rows->price}}</td>
                            </tr>
                            @endforeach
                                
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
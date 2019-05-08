@extends('layouts.app')
@section('content')


<div class="content-page" style="margin-top: 20px;" >
	

    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <center><h4  class="page-title"><b>ORDER DETAILS</b></h4></center>
                        
                         
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col-sm-12">
                    <div class="card-box">  
                        
                       
                        <center><table class="table table-striped add-edit-table" id="datatable-editable" style="width: 80%;">
                            <thead class="thead-dark" >
                            <tr>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Order Id</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Products Qty</th>
                             
                                
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Products Image</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Product_name</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Total Price</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Payment id</th>
                                 <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Time</th>
                                
                                
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($orderdetails as $rows)
                           
                            
                            <tr class="gradeX">
                               <td>{{$rows->order_id}}</td>
                                <td>{{$rows->quantity}}</td>
                              
                                
                                 <td><img src="{{asset('images/users/'.$rows->product['image'])}}" width="100px"></td>
                                
                                <td>{{$rows->product['product_name']}}</td>
                                <td>${{$rows->price}}</td>
                                 <td>{{$rows->order->payment_id}}</td>
                                  <td>{{$rows->created_at->format('d/m/y h:m:s')}}</td>

                            </tr>
                            @endforeach
                                
                        </tbody>
                    </table>
                </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
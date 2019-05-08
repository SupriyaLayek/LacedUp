@extends('layouts.app')

@section('content')
@if($orders->count()) 

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <br>
            <h2>My Orders</h2>
            <br>
            @foreach($orders as $order)

            <div class="panel panel-default">
            <div class="panel-body">
            <ul class="list-group">
                @foreach($order->cart->items as $item)
                
                    <li class="list-group-item">
                    <span class="badge">Price:${{ $item['price'] }}</span>
                    {{ $item['item']['product_name'] }} | {{ $item['qty'] }} Units
                    </li>

                    <li class="list-group-item">
                        <img src="{{asset('images/users/'.$item['item']['image'])}}" width="150px" height="100px">

                    </li>
                @endforeach
            </ul>
            <ul class="list-group" >


            <li class="list-group-item">
            <span class="badge">{{ $order->created_at }}</span>
            Ordered At
            </li>
            <li class="list-group-item">
            <span class="badge">{{  $order->payment_id }}</span>
            Payment Id
            </li>
            <li class="list-group-item">
            <span class="badge">{{  $order->id }}</span>
            Order Id
            </li>

            </ul>

            </div>
            <div class="panel-footer">
            <strong>Total Product Purchased: {{ $order->total_products}}</strong>

            <strong style="float: right;">Total Price: ${{ $order->cart->totalPrice+150 }}</strong>

            </div>
            </div>
            @endforeach
                {{ $orders->links() }}
        </div>
    </div>

@else


<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <br>
            <center><h2>You don't have any orders yet.</h2>
                <a href="{{route('shop')}}" class="btn btn-primary">visit store</a>
            </center>
            <br>
            <br>
        </div>
    </div>

@endif
<style>
    .badge{
        background-color: white;
        color:#707172;
        font-size: 15px;
    }
</style>
@endsection
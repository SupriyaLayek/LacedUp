@extends('layouts.app')
@section('content')
<center><div class="jumbotron text-xs-center">
  <h1 class="display-3">Thank You for buying from us.</h1>
  <p class="lead"><strong>Please check your email for the invoice.</strong>  
Your order will be delivered to you very soon.</p>
 
  <hr>
  <p>
    Having trouble? <a href="{{url('contact')}}">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="{{url('/')}}" role="button">Continue to homepage</a>
  </p>
  <center>Order Summary</center>
</center>
  <div class="panel panel-default">
            <div class="panel-body">
            <ul class="list-group">
                @foreach($cart->items as $item)
                
                   <li class="list-group-item">
                    <span class="badge">${{ $item['price'] }}</span>
                    {{ $item['item']['product_name'] }} | {{ $item['qty'] }} Units
                    </li>
                    

                   
                @endforeach
            </ul>
           <ul class="list-group">


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

            <strong style="float: right;">Total Price: ${{ $cart->totalPrice+150 }}</strong>

            </div>
            </div>
</div>

@endsection  
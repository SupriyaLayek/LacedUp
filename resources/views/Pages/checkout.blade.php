 @extends('layouts.app')
@section('content')
<br>
<br>

<div class="container">
  <div class="row" id="background">
    <div class="col" style="margin-top: 20px;"  >
      <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''  }}">
                {{ Session::get('error') }}
      </div>
        <h3><b>Your cart items:</b></h3>
      <table  class="table table-bordered" style="width:90%;box-shadow: 10px 5px 5px lightgrey">

        <thead style="background-color: #428bca; color: white; ;">
          <tr>
            <th scope="col">Product</th>
            <th scope="col">Quantity</th>
            
            <th scope="col">Price</th>
      
          </tr>
          </thead>

            <tbody >
              @foreach($products as $product)
              <tr class="gradeX">
                <td>{{$product['item']['product_name']}}</td>
                <td>{{$product['qty']}}</td>
               
                <td>${{$product['item']['price']}}</td>
              </tr>

            </tbody>
               @endforeach
      </table>
         
            <h3 style="float: center "><strong>Total:${{$total}}</strong></h3>
         
  <div>
    
  </div>
  <div style=" display: block;box-sizing: border-box;padding: 12px;border: 1px solid #D3D3D3; width: 90%;border-radius: 5px; box-shadow: 10px 5px 5px lightgrey">
   

         <h4><b>Delivering To:-</b></h4>
         House No:{{$OldAddress->address}},{{ucfirst($OldAddress->city)}},<br>{{ucfirst($OldAddress->state)}}<br>
         Zip:{{$OldAddress->postcode}}
         <br>
         {{ucfirst($OldAddress->country)}}
         <br>
         Phone:{{$OldAddress->phone}}
         <br>
        
       <a href="{{route('ship')}}" class="btn btn-primary">Change Address</a> <br>
       
  </div>
  </div>
 
  
<script src="https://js.stripe.com/v3/"></script>

 <div class="col" style="margin-top: 60px;" > 
  <div style=" width: 600px;height: 50px;vertical-align: middle;" class="btn btn-primary">
    <h3 style="position: relative;bottom: 13px; ">Enter payment details</h3>
  </div>

<form action="{{route('checkout')}}" method="post" id="payment-form" style="position: relative; ">
  {{csrf_field()}}
  
  <div  style="display: block;box-sizing: border-box;padding: 12px;border: 1px solid #D3D3D3;  border-radius: 3px; box-shadow: 10px 5px 5px lightgrey">
    <label for="card-element" >
      Credit or debit card
    </label>

        <div id="card-element" >
            <!-- A Stripe Element will be inserted here. -->
        </div>

               <!-- Used to display form errors. -->
        <div id="card-errors" role="alert">
        </div>
         <br>

 <input type="submit" class="btn submit" value="Submit Payment"  onclick = "return myFunction();"id="trigger" style="background-color:#428bca;color: white; ">
          
 </div>
 <div id="preload" style="display: none;" ><img src="/images/users/load.gif">
 </div>


</form> 



</div>


<script src="{{asset('js/checkout.js')}}"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js">
</script>



</div>
<br><br>
@endsection
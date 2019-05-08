@extends('layouts.app')
@section('content')


@foreach($errors->all() as $error)
<div class="alert alert-danger">
  {{$error}}
</div>
@endforeach

 @if($message = Session::get('success'))
   <div class="alert alert-success">
      <p>{{$message}}</p>     
</div>
 @endif
 

<style type="text/css">
  .error{
    color: red;
  }
</style>
<div class="container">
  <div class="row" style="margin-top: 70px;">
    <div class="col" style="margin-top: -20px;">
        <h3><b>Your cart items:</b></h3>
       <table  class="table table-bordered" style="width:90%; box-shadow: 10px 5px 5px lightgrey;">
         <thead style="background-color: #428bca; color: white;">
            <tr>
              <th scope="col">Product</th>
              <th scope="col">Quantity</th>
              <th scope="col">Price</th> 
            </tr>
          </thead>

          <tbody>
            @foreach($products as $product)
               <tr>
                  <td>{{$product['item']['product_name']}}</td>
                  <td>{{$product['qty']}}</td>
                  <td>${{$product['price']}}</td>               
                </tr>
            @endforeach
          </tbody>     
        </table>
        <div>
          <h3><b>Total<i>-</i> <span>${{$totalPrice}}</span></b></h3> 
        </div>
        <div>
          <a href="{{url('cart')}}" class="btn btn-primary" style="width:40%;">Continue to basket <i class="fa fa-angle-right"></i></a>
        </div>
        <br>

         
        @foreach($Oldaddress as $data)
           
         <div style=" display: block;box-sizing: border-box;padding: 12px;border: 1px solid #D3D3D3; width: 90%;border-radius: 5px; box-shadow: 10px 5px 5px lightgrey;">
   

         <h4><b>Deliver To:-</b></h4>
         House No:{{$data->address}},{{ucfirst($data->city)}},<br>

         {{ucfirst($data->state)}}<br>
         Zip:{{$data->postcode}}
         <br>
         {{ucfirst($data->country)}}
         <br>
         Phone:{{$data->phone}}
         <br>
        
       <a href="{{url('checkout/'.$data->id)}}" class="btn btn-primary">Select Address</a> 
      <span><a href="{{url('editaddress/'.$data->id)}}" class="btn btn-primary" style="left: 189px;">Edit Address</a></span>
      <a href="{{url('deladdress/'.$data->id)}}"  type="button" onclick="return myFunction();" class="btn btn-danger ">Delete address</a>
  </div>
 <br>

  @endforeach  
    </div>

     
  

    <!--- Shipping details-->
     
                 
          
      
      
<div class="col">
      <div class="btn btn-primary" style=" width: 600px;background-color: #428bca; color: white;">
        <h3>New shipping address</h3>
      </div>
  <form method="post" action="{{url('shipping')}}" name="shipping" id="shipping" 
            style=" width: 600px;
            border-color: #428bca; 
            border-left: 1px solid #D3D3D3;
            border-right: 1px solid #D3D3D3;
            padding: 20px 20px;
            border-top: 1px solid #D3D3D3;
            border-bottom: 1px solid #D3D3D3;
            box-shadow:  10px 5px 5px lightgrey;
            border-radius: 3px;
            ">
          {{csrf_field()}}
      
      <div class="form-group ">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address" value="">         
      </div>

      <div class="form-row ">
          <div class="form-group col-md-6">
            <label for="phone">Phone</label>
            <input type="number" class="form-control" id="phone" name="phone"  value="">
          </div>
        
      </div>
      
      <div class="form-row ">
        <div class="form-group col-md-6">
          <label for="inputCity">City</label>
          <input type="text" class="form-control" id="inputCity" name="city" value="">
          
        </div>
        <div class="form-group col-md-4 ">
              <label for="inputState">State</label>
               <input type="text" class="form-control" id="state" name="state" value="">
              
        </div>

        <div class="form-group col-md-2  ">
              <label for="inputZip">Zip</label>
              <input type="number" class="form-control" id="postcode" name="postcode" value="">
               
        </div>
      </div>

      <div class="form-row ">
        <div class="form-group col-md-6">
          <label for="country">Country</label>
          <input type="text" class="form-control" id="country" name="country" value="" >
        </div><br>
      </div>
        
       <button type="submit" class="btn btn-primary">Proceed to checkout</button>
  </form>
</div>
</div>
</div>
<br>
<br>
<script >
    $(document).ready(function () {
    $('#shipping').validate({ // initialize the plugin
        rules: {
            
            address: {
                required:true,
                maxlength: 100,
                minlength:5

            },
            phone: {
                required: true,
                pattern:"[0-9]+",
                minlength:10,
                maxlength:10

            },
            city:{
                required:true,
                minlength:2,
                maxlength:50
            },
            state:{
                required:true,
                minlength:2,
                maxlength:50
            },
            postcode:{
                required:true,
                pattern:"[0-9]+",
                minlength:6,
                maxlength:6
            },
            country:{ required:true,
                minlength:2,
                maxlength:50}



        },
        messages:{
            
           address:{
                required:"Address is required"

            },
            phone:{
                required:"Mobile number is required",
                pattern:"please enter valid mobile number",
                minlength:"only 10 digits required",
                maxlength:"Enter only 10 digit valid phone number"
            },
            city:{
                required:"City can't be blank!",
            },
            state:{
                required:"State can't be blank!",
            },
            postcode:{
                required:"Postcode can't be blank!",
                 pattern:"please enter valid zip code",
                 minlength:"mininum 6 digits required",
                maxlength:"Enter only 6 digit valid postcode"
            },
            country:{
                required:"Country can't be blank!",
            }
        }



    });

});
</script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this?"))
      event.preventDefault();
  }
 </script>

    
@endsection





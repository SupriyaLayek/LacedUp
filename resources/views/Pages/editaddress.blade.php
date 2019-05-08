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
  </div>
 

 
    </div>

     
  

    <!--- Shipping details-->
     
                 
          
  <center>
 <div class="col">
      <div class="btn btn-primary" style=" width: 700px;background-color: #428bca; color: white;">
        <h3>Edit shipping address</h3>
      </div>
    <form method="post" action="{{url('/updateaddress')}}" name="shipping" id="shipping"  style=" width: 700px;
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
          <input type="hidden" name="_method" value="PATCH" />
          <input type="hidden" name="id" value="{{ $newad->id }}">

            <div class="form-group ">
              <label  for="inputAddress" style="float: left;">Address:</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address" value="{{$newad->address}}">         
            </div>

            <div class="form-row ">
                <div class="form-group col-md-6">
                  <label for="phone" style="float: left;">Phone:</label>
                  <input type="number" class="form-control" id="phone" name="phone"  value="{{$newad->phone}}">
                </div>
              
            </div>
      
            <div class="form-row ">
              <div class="form-group col-md-6">
                <label for="inputCity" style="float: left;">City:</label>
                <input type="text" class="form-control" id="inputCity" name="city" value="{{$newad->city}}">
                
              </div>
              <div class="form-group col-md-4 ">
                    <label for="inputState" style="float: left;">State:</label>
                     <input type="text" class="form-control" id="state" name="state" value="{{$newad->state}}">
                    
              </div>

              <div class="form-group col-md-2  ">
                    <label for="inputZip" style="float: left;">Zip:</label>
                    <input type="number" class="form-control" id="postcode" name="postcode" value="{{$newad->postcode}}">
                     
              </div>
            </div>

          <div class="form-row ">
            <div class="form-group col-md-6">
              <label for="country" style="float: left;">Country:</label>
              <input type="text" class="form-control" id="country" name="country" value="{{$newad->country}}" >
            </div><br>
          </div>
        <button class="btn btn-primary" type="submit" value="Proceed to chekout">Proceed to checkout</button>
    </form>
  </div>
</div>
</center>    
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


    
@endsection





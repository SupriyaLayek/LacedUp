@extends('layouts.app')
@section('content')
 
 <style type="text/css">
   .error{
    color: red;
   }
 </style>
    <!-- mian-content -->

    <!--//main-content-->
    <!---->
    <ol class="breadcrumb">

        

        <li class="breadcrumb-item">
            <a href="{{url('/')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">Shop Single</li>
    </ol>
    <!---->
    <!-- banner -->
    <section class="ab-info-main py-md-5 py-4">
        <div class="container py-md-3">
            <!-- top Products -->
            <div class="row">
                <!-- product left -->
                
                <!-- //product left -->
                <!-- product right -->
                <div class="left-ads-display col-lg-8">
                    <div class="row">
                        <div class="desc1-right col-md-6">
                            <img  id="myimage" src="{{asset('images/users/'.$products['image'])}}" class="img-fluid" alt="">
                        </div>
                        <div class="desc1-right col-md-6 pl-lg-5">
                            <h2>Product Name:{{$products->product_name}}</h2>
                           <span> <h5>price: ${{$products->price}} &nbsp;&nbsp;  
                                  <del>${{$products->price+300}}</del></h5></span>
                            <div class="add-to-cart">
                                <div class="qty-label">
                                  
                                </div>
                               
                            </div>
                            <div class="available mt-3">
                                <form action="#" method="post" class="w3layouts-newsletter">
                                 
                       <a href="javascript:void(0);" id="{{$products->id}}" class="btn btn-primary submitBtn">
                             <span class="glyphicon glyphicon-shopping-cart"></span> Add to cart
                       </a>
      
                                    

                                </form>
                                <span></span>
                                <p>Description:{{$products->description}} </p>
                            </div>
                            <div class="share-desc">
                                <div class="share">
                                    <h4>Share Product :</h4>
                                    <ul class="w3layouts_social_list list-unstyled">
                                        <li>
                                            <a href="https://www.facebook.com/" class="w3pvt_facebook">
                                                <span class="fa fa-facebook-f"></span>
                                            </a>
                                        </li>
                                        <li class="mx-2">
                                            <a href="https://twitter.com/login?lang=en" class="w3pvt_twitter">
                                                <span class="fa fa-twitter"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://dribbble.com/session/new" class="w3pvt_dribble">
                                                <span class="fa fa-dribbble"></span>
                                            </a>
                                        </li>
                                        <li class="ml-2">
                                            <a href="#" class="w3pvt_google">
                                                <span class="fa fa-google-plus"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                   
                    <br>
                    
                  
                   
</div>
</div>
</div>
<div class="row" style="margin-left: 20px; margin-right: 20px;">
  <div class="col-sm-6">
    <div class="card">
     <button class="btn btn-primary">Product Reviews</button>
      <div style="margin-left: 20px;margin-right: 20px;">   
       @foreach($products->reviews as $product)
       <div class="row-md-4 row-md-4">

       <h4 class="card-title ">{{$product->title}}</h4>
       <span class="pull-right card-text" style="position: relative;bottom: 27px;">by: {{$product->name}} on:{{$product->created_at->format('d/m/y')}}</span>
        </div>
        <p class="card-text" style="width: 80%;">{{$product->description}}</p>
       
         <hr>
           @endforeach
      </div>
    </div>
  </div>
   
  
  <div class="col-sm-6">
    <div class="card">
     <button class="btn btn-primary">Add Review</button>
      <div class="card-body">
        <form class="form-horizontal" action="{{url('/reviews/'.$products->id)}}" method="post"  id="reviews">
            {{csrf_field()}}
               <div class="form-group">
           
      <label class="control-label col-sm-2" for="email">Title:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
      </div>
    </div>   
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Comment:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="comment" placeholder="Your review" name="description">
      </div>
    </div>   
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
      </div>
    </div>
  </div>
</div>
    </section>
    

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
        $(document).ready(function(){
            $('.submitBtn').click(function(){
                var id = $(this).prop("id");
                var url = "/add-to-cart";               
                $.ajax({
                    type: 'post',
                    url: url,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {product_id: id},
                    success: function(data) {
                        let oldcount = parseInt($(".badge").html());
                        if(oldcount < 1 || isNaN(oldcount)){
                            $(".badge").html(1);
                        } else {
                            $(".badge").html(oldcount + 1);
                        }
                       
                        
                        swal("Order!", "Item has been added to your cart!!", "success");
                    }
                });
            });
        });

</script>


 <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
     
      
  <script >
    $(document).ready(function () {
    $('#reviews').validate({ // initialize the plugin
        rules: {
            
            title: {
                required:true,
                maxlength: 10,
                minlength:5

            },            
            description:{
                required:true,
                minlength:10,
                maxlength:50
            },
            

        },
        messages:{
            
           title:{
                required:"title is required"

            },            
            description:{
                required:"description can't be blank!",
            }
        }



    });

});
</script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

 @endsection  



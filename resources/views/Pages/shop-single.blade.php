@extends('layouts.app')
@section('content')

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




    <!-- //contact -->

    @endsection

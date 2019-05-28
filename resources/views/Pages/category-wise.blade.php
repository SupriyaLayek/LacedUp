@extends('layouts.app')
@section('content')
      
    
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('/')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">Single Page</li>
    </ol>
    <!---->
    <!-- banner -->
    <section class="ab-info-main py-md-5 py-4">  
        

           
                    
                    <!-- //deals -->
 
            
                <!-- //product left -->
                <!-- product right -->
                <div class="left-ads-display col-lg-12">


                    <div class="row">
                       
                         @foreach($cat->products as $product)  
                         

                       
                        <div class="col-md-3 product-men">
                            <div class="product-shoe-info shoe text-center">
                                <div class="men-thumb-item">
                                    <img src="{{asset('images/users/'.$product['image'])}}" class="img-fluid" alt="">
                                    <span class="product-new-top">{{$product->product_name}</span>
                                </div>
                                <div class="item-info-product">
                                    <h4>
                                        <a href="{{url('/single/'.$product['id'])}}">Price: ${{$product->price}} </a>
                                    </h4>

                                    <div class="product_price">
                                        <div class="grid-price">
                                            <span class="money"></span>
                                        </div>

                                    </div>
                                   <a href="#" class="btn btn-primary submitBtn" role="button" style = "position: absolute; left: 107px; bottom: 1px">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                       
                       @endforeach
                        
                        {{}}
                        
                        </div>
                       
                        
                    </div>
                    
                </div>
            </div>
       

        </div>

    </section>

@endsection
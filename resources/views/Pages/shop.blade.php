@extends('layouts.app')
@section('content')
      
        <!--//main-content-->

@if(Session::has('success'))
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
    @endif
        
    <!---->
    <ol class="breadcrumb">
        
        <li class="breadcrumb-item">
            <a href="{{url('/')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">Single Page</li>
    </ol><br><br>
    <section class="ab-info-main">             
                <div class="left-ads-display " >
                    <div class="row" style="margin-left: 10px;margin-right: 10px;">
                          @foreach($products as $row)
                            <div class="col-md-3 product-men" style="height: 100%; width: 100%; " >
                                <div class="product-shoe-info shoe text-center">
                                    <div class="men-thumb-item">
                                        <img src="{{asset('images/users/'.$row['image'])}}" class="img-fluid" alt="" style="height: 150px;width: 200px; margin:10px;">
                                            <a href="{{url('/single/'.$row['id'])}}" class=" btn btn-primary">
                                                 {{$row['product_name']}}
                                            </a>
                                    </div>
                                    <div class="item-info-product">
                                        <h4>
                                            Price: ${{$row['price']}} </a>
                                        </h4>
                                        <div class="product_price">
                                            <div class="grid-price">
                                                <span class="money"></span>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" id="{{$row->id}}" class="btn btn-primary submitBtn" role="button" style = "position: relative;  bottom: 1px">Add to Cart</a>
                                    </div>
                                </div>
                                <br>
                            </div>
                           @endforeach
                       
                    </div>
     {!!$products->links()!!}
                </div>
              
    </section>
    <br>
    <br>
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
                        swal("Success!", "Item has been added to your cart!!", "success");
                        setTimeout(function(){
                            swal.close();
                        },1000);
                    }
                });
            });
        });

</script>
@endsection




   

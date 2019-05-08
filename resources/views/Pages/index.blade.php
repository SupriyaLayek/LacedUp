@extends('layouts.app')
@section('content')



    <!-- mian-content -->
    
    <!--//main-content-->
    <!--/ab -->
    <section class="about py-md-5 py-5">
        <div class="container-fluid">
            <div class="feature-grids row px-3">
                <div class="col-lg-3 gd-bottom">
                    <div class="bottom-gd row">
                        <div class="icon-gd col-md-3 text-center"><span class="fa fa-truck" aria-hidden="true"></span></div>
                        <div class="icon-gd-info col-md-9">
                            <h3 class="mb-2">FREE SHIPPING</h3>
                            <p>On all order over $2000</p>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-3 gd-bottom">
                    <div class="bottom-gd row bottom-gd2-active">
                        <div class="icon-gd col-md-3 text-center"><span class="fa fa-bullhorn" aria-hidden="true"></span></div>
                        <div class="icon-gd-info col-md-9">
                            <h3 class="mb-2">FREE RETURN</h3>
                            <p>On 1st exchange in 30 days</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 gd-bottom">
                    <div class="bottom-gd row">
                        <div class="icon-gd col-md-3 text-center"> <span class="fa fa-gift" aria-hidden="true"></span></div>

                        <div class="icon-gd-info col-md-9">
                            <h3 class="mb-2">MEMBER DISCOUNT</h3>
                            <p>Register & save up to $29%</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 gd-bottom">
                    <div class="bottom-gd row">
                        <div class="icon-gd col-md-3 text-center"> <span class="fa fa-usd" aria-hidden="true"></span></div>
                        <div class="icon-gd-info col-md-9">
                            <h3 class="mb-2">PREMIUM SUPPORT</h3>
                            <p>Support 24 hours per day</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //ab -->
    <!--/ab -->
      <h3 class="tittle text-center">New Arrivals</h3>

    <section class="about py-5">

        <div class="container pb-lg-3">
        
        <div class="row">

   

      
        @foreach($products as $row)  
                    
                <div class="col-md-4 product-men" style="box-shadow: 10px 5px 5px lightgrey;">

                    <div class="product-shoe-info shoe text-center">
                        <div class="men-thumb-item">
                          <center><img src="{{asset('images/users/'.$row['image'])}}" class="img-fluid" style="height: 200px;width: 200px;position: relative;" ><br>
                            <a href="{{url('/single/'.$row['id'])}}" class="btn btn-primary" 
                             style="position: relative;  background-color: #428bca;  border-color: #357ebd;   top: 26px; color: #fff;">{{$row['product_name']}}</a>  
                        </a>
                        </center>
                        </div>
                        <br>
                        <div class="item-info-product">
                            <h4>
                                Price:${{$row['price']}}
                            </h4>

                            <div class="product_price">
                                <div class="grid-price">
                                    <span class="money"/></span>
                                </div>
                            </div>
                                 

                       <a href="javascript:void(0);" id="{{$row->id}}" class="btn btn-primary submitBtn" role="button" style = "position: relative;  bottom: 1px;">Add to Cart</a>


                            </ul>
                        </div>

                    </div>
                    <br><br>
                </div>
                
            @endforeach

         
            </div>
             
  
            </div>

        </section>
        
       

        <span style="position: relative;left: 82px;">
         {!!$products->links()!!}
     </span>
      


    <!-- //ab -->
    <!--/testimonials-->
    <section class="testimonials py-5">
        <div class="container">
            <div class="test-info text-center">
                <h3 class="my-md-2 my-3">Boots</h3>

               
                <p><span class="fa fa-quote-left"></span> Good shoes take you good places! <span class="fa fa-quote-right"></span></p>

            </div>
        </div>
    </section>
    <!--//testimonials-->
    <!--/ab -->
 
    <section class="about py-5">
        <div class="container pb-lg-3">
            <h3 class="tittle text-center">Specialization</h3>
            <div class="row">
                <div class="col-md-6 latest-left">
                    <div class="product-shoe-info shoe text-center" style="
    margin-block-start: 77px;">
                        <img src="images/men1.jpg" class="img-fluid" alt="">
                        <div class="shop-now"><a href="{{url('category-wise')}}" class="btn">Men</a></div>
                    </div>
                </div>
                <div class="col-md-6 latest-right">
                    <div class="row latest-grids">
                        <div class="latest-grid1 product-men col-12">
                            <div class="product-shoe-info shoe text-center">
                                <div class="men-thumb-item">
                                    <img src="images/women.jpeg" class="img-fluid" alt="">
                                    <div class="shop-now"><a href="#" class="btn">Women</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="latest-grid2 product-men col-12 mt-lg-4">
                            <div class="product-shoe-info shoe text-center">
                                <div class="men-thumb-item">
                                    <img src="images/img3.jpg" class="img-fluid" alt="">
                                    <div class="shop-now"><a href="#" class="btn">Kids</a></div>

                                </div>
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //ab -->
    <!-- brands -->
    

    <script type="text/javascript">
        function addToCart(id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                 console.log(this.responseText);
                }
            };
            xhttp.open("POST", "http://localhost:8000/add-to-cart", true);
            xhttp.send();
            }
    </script>
    <!-- brands -->
    <!-- footer -->
 
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
                       
                        
                        swal(" Success!", "Item has been added to your cart!!", "success");
                        setTimeout(function(){
                            swal.close();
                        },1000);
                    }
                });
            });
        });

</script>






@endsection

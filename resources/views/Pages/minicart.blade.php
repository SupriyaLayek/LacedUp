@if(Session::has('cart'))
<div class="cart_section">
        <div id="breadcrumb" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">  
 
                

              <div class="col-md-12">
                        <div class="section-title">
                           <center> <table  class="table" style="width:80%">
                        <thead class="thead-dark">
                            <br>
                            <tr>  

                                <!-- <th>SL No.</th> -->
                                <th  scope="col">Product</th>
                                <th  scope="col">Quantity</th>
                                <th  scope="col">Product Name</th>
                                <th  scope="col">Total Price</th>
                                <th  scope="col">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>  

                                <!-- <a href ="{{url('/single'.$product['item']->id) }}"> -->
                            
                                <!-- <td>1</td> -->
                                <td> <a href="{{url('/single/'.$product['item']->id)}}">
                                    <img src="{{ asset('images/users/'.$product['item']['image']) }}" alt=" " class="img-responsive" style = "width:150px; height:100px"></a></td>

                                

                                
                                      <td class = "invert" style="vertical-align: middle;">  <a href="javascript:void(0);" id="{{ $product['item']['id']}}" quantity="{{ $product['qty']}}" class="submitBtn2"> <span class="glyphicon glyphicon-minus-sign"> </a>{{$product['qty']}}
                                    <a href="javascript:void(0);" id="{{ $product['item']['id']}}" quantity="{{ $product['qty']}}"class="submitBtn1" role="button" ><span class="glyphicon glyphicon-plus-sign"></a>

                              
                                    </td>
                                <td style="vertical-align: middle;">{{$product ['item']['product_name']}}</td>
                                    
                                <td style="vertical-align: middle;">$ {{$product ['price']}}</td>


                                
                               <td style="vertical-align: middle;"> <a href="javascript:void(0);" id="{{$product['item']['id']}}"  quantity = "{{$product['qty']}}" class = "submitBtn"><button type="button" class="btn btn-link btn-xs">
                                    <span class="glyphicon glyphicon-trash"> </span>
                                </button>
                            </a>

                            </td>
                                
                            </tr>

                        
                            @endforeach
                        
                            </tbody>
                            <br>
                            <br>
                            <br>
                         

                      <tfoot>
                        
                        <tr>
                            <td><a href="{{url('shop')}}" class=" btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                            <td colspan="2" class="hidden-xs"></td>
                            <td class="hidden-xs text-center">Total:<strong>&nbsp;&nbsp;&nbsp;$ {{$totalPrice}}</strong></td>
                            <td><a href="{{url('ship')}}" class="btn btn-primary btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                        </tr>
                    </tfoot>

                    </table>
                    </center>
                
                    </div>
                </div>
             </div>
        </div>
    </div>    

       
</div>
@else
<center><h2>Your cart is empty</h2>
 <a href="{{route('shop')}}" class="btn btn-primary">visit store</a>
</center>
@endif

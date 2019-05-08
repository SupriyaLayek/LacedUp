
    <!-- //Fonts -->





    <!-- mian-content -->
    <div class="main-banner inner" id="home">
        <!-- header -->
        <header class="header" >
            <div class="container-fluid px-lg-5">
                <!-- nav -->
                <nav class="py-4">
                    <div id="logo">
                        <h1> <a href="{{url('/')}}"><span  aria-hidden="true"></span>Laced Up</a></h1>
                    </div>

                    <label for="drop" class="toggle">Menu</label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu mt-2" style="color: red;">
                       
                      
                       

                        <li><a href="{{url('/')}}">Home</a></li>
                        <li ><a href="{{url('about')}}">About</a></li>
                        <li><a href="{{url('blog')}}">Blog</a></li>


                      


                            <!--Drpdown-->

                            <li>
                            <!-- First Tier Drop Down -->
                            <label for="drop-2" class="toggle">Category <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                            <a href="#">Category<span class="fa fa-angle-down" aria-hidden="true"></span></a>
                            
                            <ul>
                                @foreach(App\Category::all() as $cat)
                                <li><a class="nav-link"  href="{{ url('/categoryList/'.$cat->id)}}" class="dropdown-item"> {{($cat->name)}}</a></li>
                                </li>
                                @endforeach
                                <li><a href="{{route('shop')}}">Store</a></li>
                            </ul>
                        </li>
                        



                        
                        <!-- Authentication Links -->
                        @guest

                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>

                        @else
                              







                            <li class="dropdown">
                                <a href="#"  role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                     
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                         <a class="dropdown-item" href="{{ url('/edit/'.@Auth::user()->id) }}">{{ __('Edit Profile') }}</a>
                                         <li>                                  


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                        

                                    </li> 
                                    <li>
                                        <a class="dropdown-item" href="{{ url('/myOrders/'.@Auth::user()->id)}}">{{ __('My Orders') }}</a>
                                    </li>  

                                    </li>
                                </ul>
                            </li>
                        @endguest



                       
                        <li><a href="{{url('contact')}}">Contact</a></li>
                         <li>
                        <a href="{{url('cart')}}"><i class = "fa fa-shopping-cart" aria-hidden = "true"></i>
                             Cart

                             <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
                       </a>            
                      </li>

                      <li>
                          <form action="{{route('shop')}}" method="get" class="d-flex">
                            <input type="search" placeholder="Product name..." name="search" class="form-control" required="" style="float: left; width: 80%;">
                            <button class="btn1"><span class=" fa fa-search"  aria-hidden="true"></span></button>
                        </form>
                      </li>
                         
                    </ul>
                     
                     

                    
              </nav>
                <!-- //nav -->
            </div>
            


        </header>

        <!--/banner-->
        
        <!--// banner-inner -->
</div>
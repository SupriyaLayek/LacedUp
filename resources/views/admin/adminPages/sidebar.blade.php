

 <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title">Main</li>

                            <li>
                                <a href="{{url('/admin')}}" class="waves-effect waves-primary">
                                    <i class="ti-home"></i><span> Dashboard </span>
                                </a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect waves-primary">
                                    <i class="ti-shine"></i><span> Categories </span> 
                                    
                                </a><ul class="list-unstyled">
                                    <li><a href="{{url('/category')}}" style="font-size: 15px;">List</a></li>
                                   
                                
                                    <li><a href="{{route('category.create')}}"  style="font-size: 15px;">Add Category</a></li>
                                   
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect waves-primary">
                                    <i class="ti-shine"></i><span> Products </span> 
                                    
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{url('/product')}}"  style="font-size: 15px;">List</a></li>
                                   
                                
                                
                                    <li><a href="{{route('product.create')}}"  style="font-size: 15px;">Add Products</a></li>
                                </ul>
                                    <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect waves-primary">
                                    <i class="ti-shine"></i><span > Users </span> 
                                    
                                </a><ul class="list-unstyled">
                                    <li><a href="{{url('users')}}"  style="font-size: 15px;">list</a></li>
                                </ul>

                            </li>

                             <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect waves-primary">
                                    <i class="ti-shine"></i><span> Orders</span> 
                                    
                                </a><ul class="list-unstyled">
                                    <li><a href="{{route('orders')}}"  style="font-size: 15px;">List</a></li>
                                </ul>
                                
                            </li>
                                   
                                </ul>
                            </li>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

                           </ul>
                       </div>
                   </div>
               </div>

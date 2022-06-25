@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
{{--@dd($route)--}}

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{asset('/home')}}" class="brand-link">
        <img src="{{asset('/BackEndSourceFile')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Site logo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('/BackEndSourceFile')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                {{--================================  CATEGORY PART============================================--}}

                <li class="nav-item has-treeview {{($prefix == '/category') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="{{route('show_cate_table')}}" class="nav-link {{($route == 'show_cate_table') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('manage_cate')}}" class="nav-link {{($route == 'manage_cate') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

{{--================================  DELIVER BOY PART============================================--}}

                <li class="nav-item nas-treeview {{($prefix == '/delivery') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Delivery Boy
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="{{route('show_deliveryBoy_add_table')}}" class="nav-link {{($route == 'show_deliveryBoy_add_table') ? 'active' : ''}}">
                                <i class="far fa-plus-circle nav-icon"></i>
                                <p>Add Delivery Boy</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('delivery_boy_manage')}}" class="nav-link {{($route == 'delivery_boy_manage') ? 'active' : ''}}">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Manage Delivery Boy</p>
                            </a>
                        </li>
                    </ul>
                </li>
{{--================================  COUPON PART============================================--}}

            <li class="nav-item nas-treeview {{($prefix == '/coupon') ? 'menu-open' : ''}}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Coupon
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview ml-4">
                    <li class="nav-item">
                        <a href="{{route('show_Coupon_add_table')}}" class="nav-link {{($route == 'show_Coupon_add_table') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Coupon</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Coupon_manage')}}" class="nav-link {{($route == 'Coupon_manage') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Manage Coupon</p>
                        </a>
                    </li>
                </ul>
            </li>


{{--================================  DISH PART============================================--}}

                <li class="nav-item nas-treeview {{($prefix == '/dish') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dish
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="{{route('show_Dish_add_table')}}" class="nav-link {{($route == 'show_Dish_add_table') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Dish</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Dish_manage')}}" class="nav-link {{($route == 'Dish_manage') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Dish</p>
                            </a>
                        </li>
                    </ul>
                </li>


{{--================================  ORDER PART============================================--}}

                <li class="nav-item nas-treeview {{($prefix == '/order') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-bars" aria-hidden="true"></i>
                        <p>
                            Order
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('show_order')}}" class="nav-link {{($route == 'show_order') ? 'active' : ''}}">
                                <i class="far fa-plus-circle nav-icon"></i>
                                <p>Manage order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Dish_manage')}}" class="nav-link {{($route == 'Dish_manage') ? 'active' : ''}}">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Lol</p>
                            </a>
                        </li>
                    </ul>
                </li>



            </ul>


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

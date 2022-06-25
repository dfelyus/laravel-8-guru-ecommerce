@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
$currentUrl = url()->full();
$currentUrl1 = Request::path();



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
                {{--<a href="#" class="d-block"><span>{{ admin()->name }}</span></a>--}}
            </div>
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
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

                {{--================================ PACKAGE PART============================================--}}

                <li class="nav-item has-treeview {{($prefix == 'admin/package') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Package
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="/admin/package/add" class="nav-link {{($currentUrl1 == 'admin/package/add') ? 'active' : ''}}">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>Add new package</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/package/manage" class="nav-link {{($currentUrl1 == 'admin/package/manage') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Manage Packages</p>
                            </a>
                        </li>
                    </ul>
                </li>





                {{--================================ SETTINGS PART============================================--}}

                <li class="nav-item has-treeview {{($prefix == 'admin/setting') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="/admin/setting/add" class="nav-link {{($currentUrl1 == 'admin/setting/add') ? 'active' : ''}}">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>Add new Setting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/setting/manage" class="nav-link {{($currentUrl1 == 'admin/setting/manage') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Manage Settings</p>
                            </a>
                        </li>
                    </ul>
                </li>



                {{--================================ OFFERS PART============================================--}}

                <li class="nav-item has-treeview {{($prefix == 'admin/offers') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Offers

                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="/admin/offers/add" class="nav-link {{($currentUrl1 == 'admin/offers/add') ? 'active' : ''}}">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>Add Offers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/offers/manage" class="nav-link {{($currentUrl1 == 'admin/offers/manage') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Manage Offers</p>
                            </a>
                        </li>
                    </ul>
                </li>



                {{--================================ CATEGORY PART============================================--}}

                <li class="nav-item has-treeview {{($prefix == 'admin/category') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="/admin/category/add" class="nav-link {{($currentUrl1 == 'admin/category/add') ? 'active' : ''}}">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>Add new Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/category/manage" class="nav-link {{($currentUrl1 == 'admin/category/manage') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Manage Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--================================ DELIVER BOY PART============================================--}}

                <li class="nav-item nas-treeview {{($prefix == 'admin/delivery') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                        <p>
                            Delivery Boy
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="/admin/delivery/add" class="nav-link {{($currentUrl1 == 'admin/delivery/add') ? 'active' : ''}}">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>Add New Delivery Boy</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/delivery/manage" class="nav-link {{($currentUrl1 == 'admin/delivery/manage') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Manage Delivery Boy</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--================================ COUPON PART============================================--}}

                <li class="nav-item nas-treeview {{($prefix == 'admin/coupon') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="fa fa-building" aria-hidden="true"></i>
                        <p>
                            Coupon
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="/admin/coupon/add" class="nav-link {{($currentUrl1 == 'admin/coupon/add') ? 'active' : ''}}">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>Add new Coupon</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/coupon/manage" class="nav-link {{($currentUrl1 == 'admin/coupon/manage') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Manage Coupons</p>
                            </a>
                        </li>
                    </ul>
                </li>


                {{--================================ DISH PART============================================--}}

                <li class="nav-item nas-treeview {{($prefix == 'admin/dish') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>
                            Dish
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="/admin/dish/add" class="nav-link {{($currentUrl1 == 'admin/dish/add') ? 'active' : ''}}">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>Add new Dish</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/dish/manage" class="nav-link {{($currentUrl1 == 'admin/dish/manage') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Manage Dishes</p>
                            </a>
                        </li>
                    </ul>
                </li>





                {{--================================ GALLERY PART============================================--}}

                <li class="nav-item nas-treeview {{($prefix == 'admin/gallery') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Gallery
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="/admin/gallery/add" class="nav-link {{($currentUrl1 == 'admin/gallery/add') ? 'active' : ''}}">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>Add new Image</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/gallery/manage" class="nav-link {{($currentUrl1 == 'admin/gallery/manage') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Manage Gallery</p>
                            </a>
                        </li>
                    </ul>
                </li>





                {{--================================ IMAGES PART============================================--}}

                <li class="nav-item nas-treeview {{($prefix == 'admin/images') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Images
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="/admin/images/add" class="nav-link {{($currentUrl1 == 'admin/images/add') ? 'active' : ''}}">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>Add new Image</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/images/manage" class="nav-link {{($currentUrl1 == 'admin/images/manage') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Manage Images</p>
                            </a>
                        </li>
                    </ul>
                </li>











                {{--================================ TESTIMONIALS PART============================================--}}

                <li class="nav-item nas-treeview {{($prefix == 'admin/post') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="far fa-comment"></i>
                        <p>
                            Testimonials / posts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="/admin/post/add" class="nav-link {{($currentUrl1 == 'admin/post/add') ? 'active' : ''}}">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>Add new Posts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/post/manage" class="nav-link {{($currentUrl1 == 'admin/post/manage') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Manage Posts</p>
                            </a>
                        </li>
                    </ul>
                </li>







                {{--================================ ORDER PART============================================--}}

                <li class="nav-item nas-treeview {{($prefix == 'admin/order') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-bars" aria-hidden="true"></i>
                        <p>
                            Order
                            <i class="fas fa-inbox"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="/admin/order/manage" class="nav-link {{($currentUrl1 == 'admin/order/manage') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-ellipsis-h"></i>
                                <p>Manage orders</p>
                            </a>
                        </li>

                    </ul>
                </li>



                {{--================================ CONTACT TO GO PART============================================--}}

                <li class="nav-item has-treeview {{($prefix == 'admin/contact') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user"></i>
                        <p>
                            Contacts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="/admin/contact/add" class="nav-link {{($currentUrl1 == 'admin/contact/add') ? 'active' : ''}}">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>Add new contact</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/contact/manage" class="nav-link {{($currentUrl1 == 'admin/contact/manage') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Manage Contact</p>
                            </a>
                        </li>
                    </ul>
                </li>




                {{--================================ TRAY TO GO PART============================================--}}

                <li class="nav-item has-treeview {{($prefix == 'admin/tray') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="fas fa-shopping-cart"></i>
                        <p>
                            Tray To Go
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="/admin/tray/add" class="nav-link {{($currentUrl1 == 'admin/tray/add') ? 'active' : ''}}">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>Add new tray</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/tray/manage" class="nav-link {{($currentUrl1 == 'admin/tray/manage') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Manage Tray</p>
                            </a>
                        </li>
                    </ul>
                </li>



                {{--================================ MAIN WEDDING ============================================--}}

                <li class="nav-item has-treeview {{($prefix == 'admin/wedding') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="fa fa-building" aria-hidden="true"></i>
                        <p>
                            WEDDINGS OPTIONS
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="/admin/wedding/add" class="nav-link {{($currentUrl1 == 'admin/wedding/add') ? 'active' : ''}}">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>Add Option</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/wedding/manage" class="nav-link {{($currentUrl1 == 'admin/wedding/manage') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Manage</p>
                            </a>
                        </li>
                    </ul>
                </li>













                {{--================================ WEDDING PART============================================--}}

                <li class="nav-item has-treeview {{((Request::segment(1) == 'admin') && (Request::segment(3) == 'add' or Request::segment(3) == 'manage')) ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            MANAGE WEDDINGS
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>




                    <ul class="nav nav-treeview ml-2">

                        <li class="nav-item has-treeview {{$prefix == 'admin/wedding_standard' ? 'menu-open' : ''}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>
                                    STANDRD WEDDING
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>




                            <ul class="nav nav-treeview ml-2">
                                <li class="nav-item">

                                <li class="nav-item has-treeview {{Request::segment(4) == 'cocktails' ? 'menu-open' : ''}}">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            Cocktail hour
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview ml-2">
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_standard/add','cocktails')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_standard/add/cocktails') ? 'active' : ''}}">
                                                <i class="nav-icon far fa-plus-square"></i>
                                                <p>Add Cocktail hour</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_standard/manage','cocktails')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_standard/manage/cocktails') ? 'active' : ''}}">
                                                <i class="nav-icon fas fa-edit"></i>
                                                <p>Manage Cocktail hour</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item has-treeview {{Request::segment(4) == 'buffets' ? 'menu-open' : ''}}">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            The wedding buffet
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview ml-2">
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_standard/add','buffets')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_standard/add/buffets') ? 'active' : ''}}">
                                                <i class="nav-icon far fa-plus-square"></i>
                                                <p>Add wedding buffet</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_standard/manage','buffets')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_standard/manage/buffets') ? 'active' : ''}}">
                                                <i class="nav-icon fas fa-edit"></i>
                                                <p>Manage wedding buffet</p>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item has-treeview {{(Request::segment(4) == 'dessert') ? 'menu-open' : ''}}">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            Desserts
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview ml-2">
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_standard/add','dessert')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_standard/add/dessert') ? 'active' : ''}}">
                                                <i class="nav-icon far fa-plus-square"></i>
                                                <p>Add desserts</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_standard/manage','dessert')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_standard/manage/dessert') ? 'active' : ''}}">
                                                <i class="nav-icon fas fa-edit"></i>
                                                <p>Manage desserts</p>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item has-treeview {{(Request::segment(4) == 'extra') ? 'menu-open' : ''}}">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            Extrats
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview ml-2">
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_standard/add','extra')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_standard/add/extra') ? 'active' : ''}}">
                                                <i class="nav-icon far fa-plus-square"></i>
                                                <p>Add extrats</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_standard/manage','extra')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_standard/manage/extra') ? 'active' : ''}}">
                                                <i class="nav-icon fas fa-edit"></i>
                                                <p>Manage extrats</p>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </li>





                        <!--**********************************************************-->


                        <li class="nav-item has-treeview {{($prefix == 'admin/wedding_deluxe') ? 'menu-open' : ''}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>
                                    DELUXE WEDDING
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>




                            <ul class="nav nav-treeview ml-2">
                                <li class="nav-item">

                                <li class="nav-item has-treeview {{(Request::segment(4) == 'cocktails') ? 'menu-open' : ''}}">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            Cocktail hour
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview ml-2">
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_deluxe/add','cocktails')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_deluxe/add/cocktails') ? 'active' : ''}}">
                                                <i class="nav-icon far fa-plus-square"></i>
                                                <p>Add Cocktail hour</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_deluxe/manage','cocktails')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_deluxe/manage/cocktails') ? 'active' : ''}}">
                                                <i class="nav-icon fas fa-edit"></i>
                                                <p>Manage Cocktail hour</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item has-treeview {{(Request::segment(4) == 'buffets') ? 'menu-open' : ''}}">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            The wedding buffet
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview ml-2">
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_deluxe/add','buffets')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_deluxe/add/buffets') ? 'active' : ''}}">
                                                <i class="nav-icon far fa-plus-square"></i>
                                                <p>Add wedding buffet</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_deluxe/manage','buffets')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_deluxe/manage/buffets') ? 'active' : ''}}">
                                                <i class="nav-icon fas fa-edit"></i>
                                                <p>Manage wedding buffet</p>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item has-treeview {{(Request::segment(4) == 'dessert') ? 'menu-open' : ''}}">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            Desserts
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview ml-2">
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_deluxe/add','dessert')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_deluxe/add/dessert') ? 'active' : ''}}">
                                                <i class="nav-icon far fa-plus-square"></i>
                                                <p>Add desserts</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_deluxe/manage','dessert')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_deluxe/manage/dessert') ? 'active' : ''}}">
                                                <i class="nav-icon fas fa-edit"></i>
                                                <p>Manage desserts</p>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item has-treeview {{(Request::segment(4) == 'extra') ? 'menu-open' : ''}}">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-columns"></i>
                                        <p>
                                            Extrats
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview ml-2">
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_deluxe/add','extra')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_deluxe/add/extra') ? 'active' : ''}}">
                                                <i class="nav-icon far fa-plus-square"></i>
                                                <p>Add extrats</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_deluxe/manage','extra')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_deluxe/manage/extra') ? 'active' : ''}}">
                                                <i class="nav-icon fas fa-edit"></i>
                                                <p>Manage extrats</p>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </li>



                        <!--**********************************************************-->



                        <li class="nav-item has-treeview {{($prefix == 'admin/wedding_gold') ? 'menu-open' : ''}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>
                                    GOLD PACKAGE
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>




                            <ul class="nav nav-treeview ml-2">
                                <li class="nav-item">

                                <li class="nav-item has-treeview {{(Request::segment(4) == 'cocktails') ? 'menu-open' : ''}}">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            Cocktail hour
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview ml-2">
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_gold/add','cocktails')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_gold/add/cocktails') ? 'active' : ''}}">
                                                <i class="nav-icon far fa-plus-square"></i>
                                                <p>Add Cocktail hour</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_gold/manage','cocktails')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_gold/manage/cocktails') ? 'active' : ''}}">
                                                <i class="nav-icon fas fa-edit"></i>
                                                <p>Manage Cocktail hour</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item has-treeview {{(Request::segment(4) == 'buffets')  ? 'menu-open' : ''}}">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            The wedding buffet
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview ml-2">
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_gold/add','buffets')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_gold/add/buffets') ? 'active' : ''}}">
                                                <i class="nav-icon far fa-plus-square"></i>
                                                <p>Add wedding buffet</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_gold/manage','buffets')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_gold/manage/buffets') ? 'active' : ''}}">
                                                <i class="nav-icon fas fa-edit"></i>
                                                <p>Manage wedding buffet</p>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item has-treeview {{(Request::segment(4) == 'dessert') ? 'menu-open' : ''}}">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            Desserts
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview ml-2">
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_gold/add','dessert')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_gold/add/dessert') ? 'active' : ''}}">
                                                <i class="nav-icon far fa-plus-square"></i>
                                                <p>Add desserts</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_gold/manage','dessert')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_gold/manage/dessert') ? 'active' : ''}}">
                                                <i class="nav-icon fas fa-edit"></i>
                                                <p>Manage desserts</p>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item has-treeview {{(Request::segment(4) == 'extra') ? 'menu-open' : ''}}">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            Extrats
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview ml-2">
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_gold/add','extra')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_gold/add/extra') ? 'active' : ''}}">
                                                <i class="nav-icon far fa-plus-square"></i>
                                                <p>Add extrats</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_gold/manage','extra')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_gold/manage/extra') ? 'active' : ''}}">
                                                <i class="nav-icon fas fa-edit"></i>
                                                <p>Manage extrats</p>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </li>


                        <!--**************************************************************-->

                        <li class="nav-item has-treeview {{($prefix == 'admin/wedding_optional') ? 'menu-open' : ''}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>
                                    OPTIONALS ITEMS
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>




                            <ul class="nav nav-treeview ml-2">
                                <li class="nav-item">

                                <li class="nav-item has-treeview {{(Request::segment(4) == 'per_peop') ? 'menu-open' : ''}}">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            Per Person
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview ml-2">
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_optional/add','per_peop')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_optional/add/per_peop') ? 'active' : ''}}">
                                                <i class="nav-icon far fa-plus-square"></i>
                                                <p>Add</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_optional/manage','per_peop')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_optional/manage/per_peop') ? 'active' : ''}}">
                                                <i class="nav-icon fas fa-edit"></i>
                                                <p>Manage</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item has-treeview mb-2 {{(Request::segment(4) == 'choice_ofs') ? 'menu-open' : ''}}">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            Choice Of Standard...
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview ml-2">
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_optional/add','choice_ofs')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_optional/add/choice_ofs') ? 'active' : ''}}">
                                                <i class="nav-icon far fa-plus-square"></i>
                                                <p>Add</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('/admin/wedding_optional/manage','choice_ofs')}}" class="nav-link {{($currentUrl1 == 'admin/wedding_optional/manage/choice_ofs') ? 'active' : ''}}">
                                                <i class="nav-icon fas fa-edit"></i>
                                                <p>Manage</p>
                                            </a>
                                        </li>

                                    </ul>
                                </li>




                            </ul>
                        </li>
                    </ul>
                </li>









            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
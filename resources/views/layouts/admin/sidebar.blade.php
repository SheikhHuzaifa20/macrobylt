<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item">
                <a href="javascript:;"><i class="la la-home"></i><span class="menu-title" data-i18n="Dashboard">Home</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->routeIs('admin.dashboard'))? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/dashboard')}}"><i></i>
                            <span data-i18n="eCommerce">Dashboard</span>
                    </a>
                    </li>
                    <li class="{{ (request()->routeIs('home'))? 'active' : '' }}">
                        <a class="menu-item" href="{{ URL('') }}"><i></i>
                            <span data-i18n="Crypto">Visit Website</span>
                        </a>
                    </li>
                    <li class="{{ (request()->routeIs('admin.favicon.edit'))? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/favicon/edit')}}"><i></i>
                            <span data-i18n="Crypto">Favicon Management</span>
                        </a>
                    </li>
                    <li class="{{ (request()->routeIs('admin.logo.edit'))? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/logo/edit')}}"><i></i>
                            <span data-i18n="Sales">Logo Management</span>
                        </a>
                    </li>
                    <li class="{{ (request()->routeIs('admin.banner.index') || request()->routeIs('admin.banner.create') || request()->routeIs('admin.banner.edit')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/banner')}}"><i></i>
                            <span data-i18n="Sales">Banner Management</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('user_management/user_management') || request()->is('user_management/user_management/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('user_management/user_management')}}"><i></i>
                            <span data-i18n="eCommerce">User Management</span>
                        </a>
                    </li>
                    <li class="{{ (request()->routeIs('admin.config.setting'))? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/config/setting')}}"><i></i>
                            <span data-i18n="Sales">Config</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:;"><i class="la la-share-alt"></i><span class="menu-title" data-i18n="Dashboard">Inquires</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('admin/contact/inquiries') || request()->is('admin/contact/inquiries/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/contact/inquiries')}}"><i></i>
                            <span data-i18n="eCommerce">Contact Inquiries</span>
                    </a>
                    </li>
                    <li class="{{ (request()->is('admin/newsletter/inquiries')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/newsletter/inquiries')}}"><i></i>
                            <span data-i18n="Crypto">Newsletter Inquiries</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:;"><i class="la la-list"></i><span class="menu-title" data-i18n="Dashboard">CMS</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('admin/page') || request()->is('admin/page/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('admin/page') }}"><i></i>
                            <span data-i18n="eCommerce">Pages Content</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a href="javascript:;"><i class="la la-shopping-cart"></i><span class="menu-title" data-i18n="Dashboard">Ecommerce</span></a>
                <ul class="menu-content">

                    <li class="{{ (request()->is('admin/attributes') || request()->is('admin/attributes/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/attributes')}}"><i></i>
                            <span data-i18n="eCommerce">Attributes</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/attributes-value') || request()->is('admin/attributes-value/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/attributes-value')}}"><i></i>
                            <span data-i18n="eCommerce">Attributes Values</span>
                        </a>
                    </li>

                    <li class="{{ (request()->is('admin/category') || request()->is('admin/category/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/category')}}"><i></i>
                            <span data-i18n="eCommerce">Categories</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/product') || request()->is('admin/product/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/product')}}"><i></i>
                            <span data-i18n="eCommerce">Products</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/order/list') || request()->is('admin/order/list/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/order/list')}}"><i></i>
                            <span data-i18n="eCommerce">Orders</span>
                        </a>
                    </li>
                </ul>
            </li>


            <!-- <li class="nav-item">
                <a href="{{url('admin/blog')}}" target="_blank"><i class="la la-tags"></i>
                    <span class="menu-title" data-i18n="eCommerce">Blog</span>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('admin/testimonial') || request()->is('admin/testimonial/*')) ? 'active' : '' }}">
                <a href="{{url('admin/testimonial')}}"><i class="la la-quote-left"></i>
                    <span class="menu-title" data-i18n="eCommerce">Testimonials</span>
                </a>
            </li> -->



             <li class="nav-item">
                <a href="javascript:;"><i class="la la-music"></i><span class="menu-title" data-i18n="Dashboard">Media Management</span></a>
                <ul class="menu-content">

                    <li class="{{ (request()->is('artist/artist') || request()->is('artist/artist/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('artist/artist')}}"><i></i>
                            <span data-i18n="eCommerce">Artist Type</span>
                        </a>
                    </li>

                    <li class="{{ (request()->is('audio_gallery') || request()->is('audio_gallery/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('audio_gallery')}}"><i></i>
                            <span data-i18n="eCommerce">Audio Gallery</span>
                        </a>
                    </li>

                    <li class="{{ (request()->is('gallery_picture/gallery_picture') || request()->is('gallery_picture/gallery_picture/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('gallery_picture/gallery_picture')}}"><i></i>
                            <span data-i18n="eCommerce"> Gallery Pictures </span>
                        </a>
                    </li>

                    <li class="{{ (request()->is('favorite_dj/favorite_dj') || request()->is('favorite_dj/favorite_dj/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('favorite_dj/favorite_dj')}}"><i></i>
                            <span data-i18n="eCommerce"> Favorite DJ </span>
                        </a>
                    </li>

                    <li class="{{ (request()->is('favorite_signed_artist/favorite_signed_artist') || request()->is('favorite_signed_artist/favorite_signed_artist/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('favorite_signed_artist/favorite_signed_artist')}}"><i></i>
                            <span data-i18n="eCommerce"> Favorite Signed Artist </span>
                        </a>
                    </li>


                    <li class="{{ (request()->is('music_event/music_event') || request()->is('music_event/music_event/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('music_event/music_event')}}"><i></i>
                            <span data-i18n="eCommerce"> Music Events </span>
                        </a>
                    </li>

                    <li class="{{ (request()->is('music_news/music_news') || request()->is('music_news/music_news/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('music_news/music_news')}}"><i></i>
                            <span data-i18n="eCommerce"> Music News </span>
                        </a>
                    </li>


                </ul>
            </li>


            <li class="nav-item">
                <a href="javascript:;"><i class="la la-music"></i><span class="menu-title" data-i18n="Dashboard">Subscription Management</span></a>
                <ul class="menu-content">

                    <li class="{{ (request()->is('subscription_plan/subscription_plan') || request()->is('subscription_plan/subscription_plan/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('subscription_plan/subscription_plan')}}"><i></i>
                            <span data-i18n="eCommerce"> Subscription Plan </span>
                        </a>
                    </li>

                </ul>
            </li>



            @php
                $url = '/'.request()->segment(1).'/'. request()->segment(2);
            @endphp
            @foreach($laravelAdminMenus->menus as $section)
                @if(count(collect($section->items)) > 0)
                    @foreach($section->items as $menu)
                    <li class="nav-item {{ ($url == $menu->url) ? 'active' : '' }}">
                        <a href="{{ url($menu->url) }}" target="_blank">{!! $menu->icon !!}
                            <span class="menu-title" data-i18n="eCommerce">{{ $menu->title }}</span>
                        </a>
                    </li>
                    @endforeach
                @endif
            @endforeach
            <li class="nav-item">
                <a href="{{url('admin/account/settings')}}"><i class="la la-shopping-cart"></i>
                    <span class="menu-title" data-i18n="eCommerce">Account Settings</span>
                </a>
            </li>
        </ul>
    </div>
</div>

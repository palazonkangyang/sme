

    <div class="col-md-4 col-sm-12 col-xs-12 leftbar-stick blog-sidebar">

        <div class="user-profile">
            <img src="{{ URL::asset('uploads/user_photos/'. Auth::buyer()->user()->user_photo) }}" alt="Profile">

            <div class="profile-detail">

                <h6> {{ Auth::buyer()->user()->name }}</h6>

                <ul class="contact-details">
                    <li>
                        <i class="fa fa-map-marker"></i>  {{ Auth::buyer()->user()->address }}
                    </li>
                    <li>
                        <i class="fa fa-envelope"></i> {{ Auth::buyer()->user()->email }}
                    </li>
                    <li>
                        <i class="fa fa-phone"></i>  {{ Auth::buyer()->user()->contact_no }}
                    </li>
                </ul>

            </div><!-- end profile-detail -->

            <ul>
                <li class="{{ Request::path() == 'auth/profile/edit' ? 'active' : '' }}"><a href="{{ route('buyer.auth.profile.edit') }}">Profile</a></li>
                <li class="{{ Request::path() == 'auth/profile/active' ? 'active' : '' }}"><a href="{{ route('buyer.auth.profile.active') }}">My Ads <span class="badge">{{ $my_ads }}</span></a></li>
                <li class="{{ Request::path() == 'auth/profile/wishlist' ? 'active' : '' }}"><a href="{{ route('buyer.auth.profile.wishlist') }}">Wish Lists <span class="badge">{{ $my_wishlists }}</span></a></li>
                <li class="{{ Request::path() == 'auth/profile/archieve' ? 'active' : '' }}"><a href="{{ route('buyer.auth.profile.archieve') }}">Archives<span class="badge">{{ $my_archives }}</span></a></li>
                <li class="{{ Request::path() == 'auth/profile/blog' ? 'active' : '' }}"><a href="{{ route('buyer.auth.profile.blog') }}">Blog<span class="badge">{{ $my_blog }}</span></a></li>
                <li><a href="{{ route('buyer.auth.logout') }}">Logout</a></li>
            </ul>

        </div><!-- end user-profile -->

    </div><!-- end col-md-4 col-sm-12 col-xs-12 leftbar-stick blog-sidebar -->

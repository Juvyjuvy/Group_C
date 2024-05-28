    @extends('layouts.dashboard')

    @section('content')

    <div class="main-container d-flex">

        <!-- Sidebar -->
        <div class="sidebar" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-center">
                <h1 class="fs-4">
                    <img src="{{ asset('asset/Ellipse 63.png') }}" alt="Lost & Found Logo" width="80" height="80" class="me-2">
                    <p>Lost & Found</p>
                </h1>
                <button class="btn close-btn px-1 py-0 text-white" id="closeButton">
                    <img src="{{ asset('asset/close.png') }}" alt="Close" width="24" height="24">
                </button>
            </div>
            <ul class="list-unstyled px-2">
                <li class="active"><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-home"></i> Dashboard</a></li>
                <li><a href="{{ url('/profile') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-list"></i> Profile</a></li>
                <li>
                    <a href="{{ url('/messages') }}" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
                        <span><i class="fal fa-comment"></i>Messages</span>
                        <img src="{{ asset('asset/Message.gif') }}"  alt="Message Icon" width="25" height="25">
                    </a>
                </li>
                <li><a href="{{ url('/user/adverts') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-envelope-open-text"></i>Create an Advert</a></li>
                <li><a href="{{ url('/lostitem') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-envelope-open-text"></i>Lost and Found Items</a></li>&nbsp;&nbsp;
                <li class="logout-link"><a href="{{ route('logout') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-bell"></i> Logout</a></li>
            </ul>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="maroon-header">
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white menu-btn" id="menuButton">
                    <img src="{{ asset('asset/menu.png') }}" alt="Menu" width="24" height="24">
                </button>
            </div>

            <div class="col-md-4x">
                <div class="profile">
                    @if(Auth::check() && Auth::user()->profile_image)
                    <img src="{{ asset('asset/' . Auth::user()->profile_image) }}" alt="Profile Image"width="60" height="60">
                @else
                    <!-- Add a default image or placeholder if the user doesn't have a profile image -->
                    <img src="{{ asset('path_to_default_image/default.png') }}" alt="Default Image">
                @endif
                                <form  action="{{ route('profile.update') }}" method="post">
                                    @csrf
                        @auth <!-- Check if user is authenticated -->
                        <p>Hello,  {{ Auth::user()->name}}!</p>
                        <a href="{{ url('profile') }}" class="btn btn-light">Profile</a>

                        @endauth
                    </div>
                </div>
                <div class="button" id="advertButton">
                    <img src="{{ asset('asset/plusiCon.png') }}" width="40" height="40">
                    <div>
                        <p><strong>Create an advert</strong></p>
                        <div class="text">
                            <p style="padding-right: 20px;">
                                <a href="{{ url('user/adverts') }}" style="color: maroon;">Report you find or lost an item</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="button" id="lostFoundButton">
                    <img src="{{ asset('asset/suitcase.gif') }}" width="40" height="40">
                    <div>
                        <p><strong>LOST & FOUND ITEM</strong></p>
                        <p style="padding-right: 20px;">
                            <a href="{{ url('lostitem') }}" style="color: maroon;">Go through the lost and found items</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const menuButton = document.getElementById('menuButton');
            const sideNav = document.getElementById('side_nav');
            const closeButton = document.getElementById('closeButton');

            menuButton.addEventListener('click', function () {
                sideNav.classList.toggle('active');
            });

            closeButton.addEventListener('click', function () {
                sideNav.classList.remove('active');
            });
        });
    </script>

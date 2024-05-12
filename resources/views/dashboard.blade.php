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
                <a href="{{ url('/message') }}" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
                    <span><i class="fal fa-comment"></i> Messages</span>
                </a>
            </li>
            <li><a href="{{ url('/user/adverts') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-envelope-open-text"></i>Create an Advert</a></li>
            <li><a href="{{ url('/lostitem') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-envelope-open-text"></i>Lost and Found Items</a></li>&nbsp;&nbsp;
            <li class="logout-link"><a href="{{ url('/') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-bell"></i> Logout</a></li>
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
                <img src="{{ asset('asset/tristan.png') }}" alt="Tristan Image" width="60" height="60">
                <div>
                    @auth <!-- Check if user is authenticated -->
                    <p>Hello,  {{ Auth::user()->Username }}!</p>
                    <a href="{{ url('profile') }}" class="btn btn-light">Profile</a>
                    @else <!-- If not authenticated, display a message or redirect to login page -->
                    <p>Hello, </p>
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

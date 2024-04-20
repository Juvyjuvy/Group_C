@extends('layouts.lostitem')

@section('content')
<div class="main-container d-flex">
    <!-- Sidebar -->
    <div class="sidebar" id="side_nav">
        <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-center">
            <h1 class="fs-4">
                <img src="{{ asset('asset/Ellipse 63.png') }}" alt="Lost & Found Logo" width="80" height="80" class="me-2">
                <p>Lost & Found</p>
            </h1>
            <button class="btn close-btn px-1 py-0 text-white" id="closeButton" style="align-self: center;">
                <img src="{{ asset('asset/close.png') }}" alt="Close" width="24" height="24">
            </button>
        </div>



        <ul class="list-unstyled px-2">
            <li><a href="dashboard" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-home"></i> Dashboard</a></li>
            <li><a href= "{{ asset('dashboard') }} "profile" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-list"></i> Profile</a></li>
            <li>
                <a href="http://127.0.0.1:8000/message/? " class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
                    <span><i class="fal fa-comment"></i> Messages</span>
                </a>
            </li>
            <li><a href="http://127.0.0.1:8000/user/adverts#" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-envelope-open-text"></i>Create an Advert</a></li>
            <li class="active"><a href="http://127.0.0.1:8000/user/adverts#" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-envelope-open-text"></i>Lost and Found Items</a></li>&nbsp;&nbsp;
            <li class="logout-link"><a href="http://127.0.0.1:8000/" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-bell"></i> Logout</a></li>
        </ul>
    </div>

        <div class="content ">
            <button class="btn d-md-none d-block close-btn px-1 py-0 text-white menu-btn" id="menuButton">
                <img src="{{ asset('asset/menu.png') }}" alt="Menu" width="24" height="24">
            </button>


          <div class="card my-4 mx-auto" style="max-width: 300px;">
            <div class="card-header bg-maroon text-white text-center">
                FOUND
            </div>

            <img src="{{ asset('asset/wallet.png') }}" alt="Lost Item">
            <div class="card-body">
                <p class="Description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br>
                Brand: LeatherCraft<br>
                Color: Brown<br>
                Material: Genuine Leather</p>
            </div>
            <div class="card-footer bg-white">
                <img src="{{ asset('asset/pablo.png') }}" alt="User" class="rounded-circle" style="width: 50px; height: 50px;">
                <span class="font-weight-bold">Pablo</span>
            </div>
        </div>
    </div>
</div>
@endsection


<script>
     document.addEventListener("DOMContentLoaded", function() {
    const menuButton = document.getElementById('menuButton');
    const sideNav = document.getElementById('side_nav');
    const closeButton = document.getElementById('closeButton'); // Add this line

    menuButton.addEventListener('click', function() {
        sideNav.classList.toggle('active');
    });

    closeButton.addEventListener('click', function() { // Add this block
        sideNav.classList.remove('active');
    });
});
    </script>


@extends('layouts.profile')

@section('content')
<div class="main-container d-flex">
    <!-- Sidebar -->
    <div class="sidebar" id="side_nav">
        <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-center">
            <h1 class="fs-4">
                <img src="{{ asset('asset/Ellipse 63.png') }}" alt="Lost & Found Logo" width="80" height="80" class="me-2">
                <p class="text-white">Lost & Found</p>
            </h1>
            <button class="btn close-btn px-1 py-0 text-white" id="closeButton" style="align-self: center;">
                <img src="{{ asset('asset/close.png') }}" alt="Close" width="24" height="24">
            </button>
        </div>

        <ul class="list-unstyled px-2">
            <li><a href="http://127.0.0.1:8000/dashboard/" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-home"></i> Dashboard</a></li>
            <li class="active"><a href="http://127.0.0.1:8000/profile/" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-list"></i> Profile</a></li>
            <li>
                <a href="http://127.0.0.1:8000/notifications " class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between text-white">
                    <span><i class="fal fa-comment"></i>Notification</span>
                </a>
            </li>
            <li><a href="http://127.0.0.1:8000/user/adverts" class="text-decoration-none px-3 py-2 d-block text-white"><i class="fal fa-envelope-open-text"></i>Create an Advert</a></li>
            <li><a href="http://127.0.0.1:8000/lostitem/" class="text-decoration-none px-3 py-2 d-block text-white"><i class="fal fa-envelope-open-text"></i>Lost and Found Items</a></li>
            <li class="logout-link"><a href="{{ route('logout') }}" class="text-decoration-none px-3 py-2 d-block text-white"><i class="fal fa-bell"></i> Logout</a></li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <button class="btn d-md-none d-block close-btn px-1 py-0 text-white menu-btn" id="menuButton">
            <img src="{{ asset('asset/menu.png') }}" alt="Menu" width="24" height="24">
        </button>

        <div class="container my-5">
            <div class="profile-card text-center bg-dark-blue text-white p-5 rounded">
                @if(Auth::check() && Auth::user()->profile_image)
                    <img src="{{ asset('asset/' . Auth::user()->profile_image) }}" alt="Profile Image" class="rounded-circle mb-3">
                @else
                    <!-- Add a default image or placeholder if the user doesn't have a profile image -->
                    <img src="{{ asset('path_to_default_image/default.png') }}" alt="Default Image" class="rounded-circle mb-3">
                @endif
                <form action="{{ route('profile.update') }}" method="post">
                    @csrf
                    <div class="profile-details">
                        <h2 class="mb-4">Profile</h2>
                        <input type="text" name="name" class="form-control mb-3" placeholder="Name" value="{{ Auth::user()->name }}">
                        <input type="text" name="course" class="form-control mb-3" placeholder="Course" value="{{ Auth::user()->course }}">
                        <input type="text" name="address" class="form-control mb-3" placeholder="Address" value="{{ Auth::user()->address }}">
                        <input type="text" name="religion" class="form-control mb-3" placeholder="Religion" value="{{ Auth::user()->religion }}">
                        <input type="text" name="birthday" class="form-control mb-3" placeholder="Birthday" value="{{ Auth::user()->birthday }}">
                        <input type="text" name="contact_number" class="form-control mb-3" placeholder="Contact Number" value="{{ Auth::user()->contact_number }}">
                        <input type="file" name="profile_image" class="form-control mb-3">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="inputName" class="col-form-label">Name:</label>
                                <input type="text" class="form-control" id="inputName" value="Tristan L. Parijas">
                            </div>
                            <div class="form-group">
                                <label for="inputCourse" class="col-form-label">Course:</label>
                                <input type="text" class="form-control" id="inputCourse" value="BSIT-2">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress" class="col-form-label">Address:</label>
                                <input type="text" class="form-control" id="inputAddress" value="Prk 2, Tambacan Iligan City">
                            </div>
                            <div class="form-group">
                                <label for="inputReligion" class="col-form-label">Religion:</label>
                                <input type="text" class="form-control" id="inputReligion" value="Roman Catholic">
                            </div>
                            <div class="form-group">
                                <label for="inputBirthday" class="col-form-label">Birthday:</label>
                                <input type="text" class="form-control" id="inputBirthday" value="January 2, 2004">
                            </div>
                            <div class="form-group">
                                <label for="inputContactNumber" class="col-form-label">Contact Number:</label>
                                <input type="text" class="form-control" id="inputContactNumber" value="095184817">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <style>
        .profile-card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #f8f9fa;
        }
        .profile-card input[type="file"] {
            border: none;
            background-color: #fff;
            padding: 8px;
        }
        .profile-card button[type="submit"] {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 8px 16px;
            transition: background-color 0.3s ease;
        }
        .profile-card button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .modal-content {
            background-color: #f8f9fa;
        }
        .modal-content input[type="text"] {
            border: 1px solid #ced4da;
        }
    </style>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuButton = document.getElementById('menuButton');
        const sideNav = document.getElementById('side_nav');
        const closeButton = document.getElementById('closeButton');

        menuButton.addEventListener('click', function() {
            sideNav.classList.toggle('active');
        });

        closeButton.addEventListener('click', function() {
            sideNav.classList.remove('active');
        });
    });
</script>


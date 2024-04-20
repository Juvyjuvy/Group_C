@extends('layouts.profile')

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
            <li><a href="http://127.0.0.1:8000/dashboard/" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-home"></i> Dashboard</a></li>
            <li class="active"><a href="http://127.0.0.1:8000/profile/" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-list"></i> Profile</a></li>
            <li>
                <a href="http://127.0.0.1:8000/message/? " class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
                    <span><i class="fal fa-comment"></i> Messages</span>

                </a>
            </li>
            <li><a href="http://127.0.0.1:8000/user/adverts" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-envelope-open-text"></i>Create an Advert</a></li>
            <li><a href="http://127.0.0.1:8000/lostitem/" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-envelope-open-text"></i>Lost and Found Items</a></li>&nbsp;&nbsp;
            <li class="logout-link"><a href="http://127.0.0.1:8000/" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-bell"></i> Logout</a></li>
        </ul>
    </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <button class="btn d-md-none d-block close-btn px-1 py-0 text-white menu-btn" id="menuButton">
            <img src="{{ asset('asset/menu.png') }}" alt="Menu" width="24" height="24">
        </button>


        <div class="container my-5">
            <div class="profile-card text-center bg-dark-blue text-white">
                <img src="{{ asset('asset/profile.png') }}" alt="Profile Image">
                <div class="profile-details">
                    <h2>Profile</h2>
                    <p>Name: Tristan L. Parijas</p>
                    <p>Course: BSIT-2</p>
                    <p>Address: Prk 2, Tambacan Iligan City</p>
                    <p>Religion: Roman Catholic</p>
                    <p>Birthday: January 2, 2004</p>
                    <p>Contact Number: 09518429817</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfileModal">
                        Edit Profile
                    </button>
                </div>
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
                            <input type="text" class="form-control" id="inputContactNumber" value="09518429817">
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



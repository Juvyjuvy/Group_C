@extends('layouts.admindashboard')

@section('content')
<div class="main-container d-flex">
    <!-- Sidebar -->
    <div class="sidebar" id="side_nav">
        <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-center">
            <h1 class="fs-4">
                <img src="{{ asset('asset/Ellipse 63.png') }}" alt="Lost & Found Logo" width="80" height="80" class="me-2">
                <p>Lost & Found</p>
            </h1>

        </div>

        <!-- Menu Button -->
        <ul class="list-unstyled px-2">
            <li><a href="http://127.0.0.1:8000/admin/admindashboard" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-home"></i> Dashboard</a></li>

              <li>  <a href="/" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
                    <span><i class="fal fa-comment"></i> Notification</span>
                </a>
            </li>

            <li><a href="{{ asset('admin/lostitemadmin') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-envelope-open-text"></i>Lost and Found Items</a></li>
            <li class="logout-link"><a href="{{ route('admin-logout')}}"  class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-bell"></i> Logout</a></li>
        </ul>
    </div>
    <!-- Content -->
    <div class="content">
        <nav class="navbar navbar-expand-md navbar-light bg-maroon">
            <div class="container-fluid">
                <a class="navbar-brand fs-4" href="#"><span class="bg-gradient-danger rounded px-2 py-0 text-white">Welcome to Dashboard</span></a>
            </div>
        </nav>


        <div class="col-md-4x">
            <div class="profile">
                <img src="{{ asset('asset/admin.png') }}" alt="admin" width="60" height="60">
                <div>
                    <p>Hello, Admin</p>

                </div>
            </div>
         <div class="button" id="lostFoundButton">
                <img src="{{ asset('asset/suitcase.gif') }}" width="40" height="40">
                <div>
                    <p><strong>LOST & FOUND ITEM</strong></p>
                    <p style="padding-right: 20px;">
                        <a href="{{ asset('admin/lostitemadmin') }}" style="color: maroon;">Go through the lost and found items</a>
                    </p>
                </div>
            </div>
            <div class="button" id="lostFoundButton">
                <img src="{{ asset('asset/user.gif') }}" width="40" height="40">
                <div>
                    <p><strong>Users</strong></p>
                    <p style="padding-right: 20px;">
                        <a href="{{ asset('lostitem') }}" style="color: maroon;">Active users</a>
                    </p>
                </div>
        </div>
    </div>
</div>
<div class="modal fade" id="createAdvertModal" tabindex="-1" aria-labelledby="createAdvertModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-maroon text-white">
                <h5 class="modal-title" id="createAdvertModalLabel">Create New Advert</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create-advert-form">
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="">Select Category</option>
                            <option value="lost">Lost</option>
                            <option value="found">Found</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <button type="submit" class="btn btn-maroon">Create Advert</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

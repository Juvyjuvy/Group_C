@extends('layouts.advertss')

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

        <!-- Menu Button -->
        <ul class="list-unstyled px-2">
            <li><a href="http://127.0.0.1:8000/admin/admindashboard" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-home"></i> Dashboard</a></li>
            <li><a href="/" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
                <span><i class="fal fa-comment"></i> Notification</span>
            </a></li>
            <li class="active"><a href="/" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-envelope-open-text"></i> Create an Advert</a></li>
            <li><a href="/" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-envelope-open-text"></i>Lost and Found Items</a></li>
            <li class="logout-link"><a href="{{ route('logout') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-bell"></i> Logout</a></li>
        </ul>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-maroon text-white text-center">Create New Advert</div>
                    <div class="card-body">
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
                            <div class="text-center">
                                <button type="submit" class="btn btn-maroon">Create Advert</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<style>
    .bg-maroon {
        background-color: #800000; /* Replace with your exact maroon color */
    }

    .btn-maroon {
        background-color: #800000; /* Replace with your exact maroon color */
        color: white;
    }

    .btn-maroon:hover {
        background-color: #660000; /* Darker shade for hover effect */
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const menuButton = document.getElementById('menuButton');
        const sideNav = document.getElementById('side_nav');
        const closeButton = document.getElementById('closeButton');

        menuButton?.addEventListener('click', function () {
            sideNav.classList.toggle('active');
        });

        closeButton?.addEventListener('click', function () {
            sideNav.classList.remove('active');
        });

        document.getElementById('create-advert-form').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission

            // Display SweetAlert confirmation
            Swal.fire({
                title: 'Advert Created',
                text: 'Your advert has been successfully created.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to admin dashboard
                    window.location.href = '/admin/admindashboard';
                }
            });
        });
    });
</script>

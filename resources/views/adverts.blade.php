@extends('layouts.adverts')

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
            <li><a href="http://127.0.0.1:8000/dashboard/" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-home"></i> Dashboard</a></li>
            <li><a href="http://127.0.0.1:8000/profile/" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-list"></i> Profile</a></li>
            <li>
                <a href="http://127.0.0.1:8000/notifications " class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
                    <span><i class="fal fa-comment"></i>Notification</span>
                </a>
            </li>
            <li class="active"><a href="http://127.0.0.1:8000/user/adverts#" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-envelope-open-text"></i> Create an Advert</a></li>
            <li><a href="http://127.0.0.1:8000/lostitem/" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-envelope-open-text"></i>Lost and Found Items</a></li>
            <li class="logout-link"><a href="{{ route('logout') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-bell"></i> Logout</a></li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <button class="btn d-md-none d-block close-btn px-1 py-0 text-white menu-btn" id="menuButton">
            <img src="{{ asset('asset/menu.png') }}" alt="Menu" width="24" height="24">
        </button>

        <div class="container">
            <div class="row justify-content-center"> <!-- Center the row -->
                <div class="col-md-6"> <!-- Make the column medium-sized -->
                    <section class="form-container">
                        <h2>Add a new entry</h2>
                        <form id="advertForm" action="{{ route('/user/adverts.store')}}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="found-lost" class="form-label">Found/Lost:</label>
                                <select id="found-lost" name="found_lost" class="form-select">
                                    <option value="found">Found</option>
                                    <option value="lost">Lost</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="item-name" class="form-label">Item Name:</label>
                                <input type="text" id="item_name" name="item_name" class="form-control" placeholder="Enter item name" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <textarea id="description" name="description" class="form-control" placeholder="Enter item description" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="contact-number" class="form-label">Contact Number:</label>
                                <input type="tel" id="contact-number" name="contact_number" class="form-control" placeholder="Enter contact number" required>
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Location:</label>
                                <input type="text" id="location" name="location" class="form-control" placeholder="Enter location" required>
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">Photo:</label>
                                <input type="file" id="photo" name="photo" class="form-control" accept="image/*" capture>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuButton = document.getElementById('menuButton');
        const sideNav = document.getElementById('side_nav');
        const closeButton = document.getElementById('closeButton'); // Add this line
        const form = document.getElementById('advertForm'); // Select the form element

        menuButton.addEventListener('click', function() {
            sideNav.classList.toggle('active');
        });

        closeButton.addEventListener('click', function() { // Add this block
            sideNav.classList.remove('active');
        });

        // Intercept form submission
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            swal({
                title: "Are you sure?",
                text: "Once submitted, you won't be able to modify the entry!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willSubmit) => {
                if (willSubmit) {
                    // If user confirms, submit the form
                    form.submit();
                    // Show success message after submission
                    swal("Success!", "Your entry has been submitted successfully.", "success");
                }
            });
        });
    });
</script>

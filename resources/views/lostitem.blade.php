@extends('layouts.lostitemLayout')

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
            <li><a href="{{ asset('dashboard') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-home"></i> Dashboard</a></li>
            <li><a href="http://127.0.0.1:8000/profile" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-list"></i> Profile</a></li>
            <li>
                <a href="http://127.0.0.1:8000/notifications" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
                    <span><i class="fal fa-comment"></i>Notification</span>
                </a>
            </li>
            <li><a href="http://127.0.0.1:8000/user/adverts" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-envelope-open-text"></i> Create an Advert</a></li>
            <li class="active"><a href="http://127.0.0.1:8000/user/adverts" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-envelope-open-text"></i> Lost and Found Items</a></li>
            <li class="logout-link"><a href="{{ route('logout') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-bell"></i> Logout</a></li>
        </ul>
    </div>

    <div class="content">
        <button class="btn d-md-none d-block close-btn px-1 py-0 text-white menu-btn" id="menuButton">
            <img src="{{ asset('asset/menu.png') }}" alt="Menu" width="24" height="24">
        </button>

        @if(isset($items) && $items->count() > 0)
            @foreach ($items as $item)
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('asset/' . $item->addphoto) }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->status }}</h5>
                        <p class="card-text">{{ $item->description }}</p>
                        <button class="btn btn-primary check-item-btn" data-target="#itemModal{{ $item->Post_ID }}">Check Item</button>
                        <!-- Delete button -->
                        <button class="btn btn-danger delete-item" data-id="{{ $item->Post_ID }}">DELETE</button>
                        <!-- End Delete button -->
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="itemModal{{ $item->Post_ID }}" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel{{ $item->Post_ID }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="itemModalLabel{{ $item->Post_ID }}">{{ $item->status }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Description: {{ $item->description }}</p>
                                <p>Contact Number: {{ $item->Contact_no }}</p>
                                <p>Location: {{ $item->location }}</p>
                                <img src="{{ asset('asset/' . $item->addphoto) }}" alt="Item Photo" width="200">
                                <!-- Add other item information here if needed -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
            @endforeach
        @else
            <p>No items found.</p>
        @endif
    </div>
</div>

@endsection

<!-- Include jQuery and SweetAlert -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

        // Add event listener for Check Item buttons
        const checkItemButtons = document.querySelectorAll('.check-item-btn');
        checkItemButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const modalId = button.getAttribute('data-target');
                const modal = document.querySelector(modalId);
                modal.classList.add('show');
                modal.style.display = 'block';
                document.body.classList.add('modal-open');

                // Handle modal closing when clicking close button or outside modal
                modal.addEventListener('click', function(event) {
                    if (event.target === modal) {
                        modal.classList.remove('show');
                        modal.style.display = 'none';
                        document.body.classList.remove('modal-open');
                    }
                });

                const closeModalButton = modal.querySelector('[data-dismiss="modal"]');
                if (closeModalButton) {
                    closeModalButton.addEventListener('click', function() {
                        modal.classList.remove('show');
                        modal.style.display = 'none';
                        document.body.classList.remove('modal-open');
                    });
                }
            });
        });

        // Add event listener for Delete Item buttons with SweetAlert
        const deleteItemButtons = document.querySelectorAll('.delete-item');
        deleteItemButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const itemId = button.getAttribute('data-id');
                const deleteUrl = "{{ url('lostitem/delete') }}/" + itemId;

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to delete URL
                        window.location.href = deleteUrl;
                    }
                });
            });
        });
    });
</script>

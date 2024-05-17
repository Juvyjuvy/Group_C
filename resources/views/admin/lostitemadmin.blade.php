@extends('layouts.adminlost')

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
            <li><a href="{{ url('admin/admindashboard') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-home"></i> Dashboard</a></li>
            <li><a href="/" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between"><span><i class="fal fa-comment"></i> Notification</span></a></li>
            <li class="active"><a href="/" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-envelope-open-text"></i> Create an Advert</a></li>
            <li><a href="/" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-envelope-open-text"></i> Lost and Found Items</a></li>
            <li class="logout-link"><a href="{{ route('logout') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-bell"></i> Logout</a></li>
        </ul>
    </div>

    <div class="content flex-grow-1 p-3">
        <button class="btn d-md-none d-block close-btn px-1 py-0 text-white menu-btn" id="menuButton">
            <img src="{{ asset('asset/menu.png') }}" alt="Menu" width="24" height="24">
        </button>

        @if(isset($items) && $items->count() > 0)
            <div class="row">
                @foreach ($items as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('asset/' . $item->addphoto) }}" alt="Item Photo">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->status }}</h5>
                                <p class="card-text">{{ $item->description }}</p>
                                <button class="btn btn-primary check-item-btn" data-toggle="modal" data-target="#itemModal{{ $item->Post_ID }}">Check Item</button>
                                <!-- Delete button -->
                                <form action="{{ route('items.destroy', $item->Post_ID) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <!-- End Delete button -->
                            </div>
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
                                    <img src="{{ asset('asset/' . $item->addphoto) }}" alt="Item Photo" class="img-fluid">
                                    <!-- Add other item information here if needed -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                @endforeach
            </div>
        @else
            <p>No items found.</p>
        @endif
    </div>
</div>

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
    });
</script>

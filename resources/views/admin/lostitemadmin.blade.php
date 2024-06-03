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

        </div>

        <!-- Menu Button -->
        <ul class="list-unstyled px-2">
            <li><a href="http://127.0.0.1:8000/admin/admindashboard" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-home"></i> Dashboard</a></li>

              <!--li>  <a href="#" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
                    <span><i class="fal fa-comment"></i> Notification</span>
                </a>
            </li-->

            <li><a href="{{ asset('admin/lostitemadmin') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-envelope-open-text"></i>Lost and Found Items</a></li>
            <li class="logout-link"><a href="{{ route('admin-logout')}}"  class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-bell"></i> Logout</a></li>
        </ul>
    </div>
    <!-- Content -->
    <div class="content">
        <nav class="navbar navbar-expand-md navbar-light bg-maroon">
            <div class="container-fluid">
                <a class="navbar-brand fs-4" href="#"><span class="bg-gradient-danger rounded px-2 py-0 text-white">Lost&Found Items</span></a>
            </div>
        </nav>

<div class="container">


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(isset($items) && $items->count() > 0)
        <div class="row">
            @foreach ($items as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('asset/' . $item->addphoto) }}" alt="Item Photo" width="200" height="300">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->status }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <!-- View Details and Delete Buttons -->
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-primary view-details"
                                        data-toggle="modal"
                                        data-target="#itemModal"
                                        data-Item-Name="{{ $item->identify_name }}"
                                        data-description="{{ $item->description }}"
                                        data-contact="{{ $item->Contact_no }}"
                                        data-location="{{ $item->location }}"
                                        data-photo="{{ asset('asset/' . $item->addphoto) }}"
                                        data-status="{{ $item->status }}">
                                    View Details
                                </button>
                                <button class="btn btn-danger delete-item" data-id="{{ $item->Post_ID }}">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No items found.</p>
    @endif
</div>

<!-- Modal -->
<div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="itemItemName"></p>

                <p id="itemDescription"></p>
                <p id="itemContact"></p>
                <p id="itemLocation"></p>
                <img id="itemPhoto" src="" alt="Item Photo" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Custom Styles for transitions and hover effects -->
<style>
    .view-details {
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .view-details:hover {
        background-color: #0056b3;
        color: white;
    }

    .modal.fade .modal-dialog {
        transition: transform 0.3s ease-out;
    }

    .modal.fade.show .modal-dialog {
        transform: translate(0, 0);
    }

    .modal.fade .modal-dialog {
        transform: translate(0, -50%);
    }
</style>

<script>
    $(document).ready(function () {
        // Delete Item SweetAlert
        $(document).on('click', '.delete-item', function () {
            var itemId = $(this).data('id');
            var deleteUrl = "{{ url('admin/lostitemadmin/delete/') }}" + '/' + itemId;

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

        // View Details functionality
        $(document).on('click', '.view-details', function () {
            var itemName = $(this).data('item-name');
            var itemDescription = $(this).data('description');
            var itemContact = $(this).data('contact');
            var itemLocation = $(this).data('location');
            var itemPhoto = $(this).data('photo');
            var itemStatus = $(this).data('status');

            $('#itemModalLabel').text(itemStatus);
            $('#itemItemName').text('Item Name: ' + itemName);
            $('#itemDescription').text('Description: ' + itemDescription);
            $('#itemContact').text('Contact Number: ' + itemContact);
            $('#itemLocation').text('Location: ' + itemLocation);
            $('#itemPhoto').attr('src', itemPhoto);

            // Smooth transition
            setTimeout(function () {
                $('#itemModal').modal('show');
            }, 150);
        });

        // Fix for modal backdrop issue
        $('#itemModal').on('hidden.bs.modal', function () {
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        });
    });
</script>

@endsection

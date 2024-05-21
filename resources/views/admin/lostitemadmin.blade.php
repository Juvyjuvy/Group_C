@extends('layouts.adminlost')

@section('content')
<div class="container">
    <h1>Lost and Found Items</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(isset($items) && $items->count() > 0)
        <div class="row">
            @foreach ($items as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('asset/' . $item->addphoto) }}" alt="Item Photo">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->status }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <!-- Edit and Delete Buttons -->
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-primary view-details" data-toggle="modal" data-target="#itemModal{{ $item->Post_ID }}">View Details</button>
                                <div>
                                    <button class="btn btn-secondary edit-item" data-id="{{ $item->id }}">Edit</button>
                                    <button class="btn btn-danger delete-item" data-id="{{ $item->Post_ID }}">Delete</button>
                                </div>
                            </div>
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
                                <img src="{{ asset('storage/' . $item->addphoto) }}" alt="Item Photo" class="img-fluid">
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

<!-- Include jQuery and SweetAlert -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Edit Item functionality (implement as needed)
    $(document).on('click', '.edit-item', function () {
        var itemId = $(this).data('id');
        // Implement edit functionality here
        alert("Edit button clicked for item ID: " + itemId);
    });

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
</script>

@endsection

@extends('layouts.messages')

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
        <button class="btn close-btn px-1 py-0 text-white" id="closeButton">
            <img src="{{ asset('asset/close.png') }}" alt="Close" width="24" height="24">
        </button>
        <!-- Menu Button -->
        <ul class="list-unstyled px-2">
            <li><a href="{{ url('/dashboard') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-home"></i> Dashboard</a></li>
            <li><a href="{{ url('/profile') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-list"></i> Profile</a></li>
            <li class="active">
                <a href="{{ url('/notifications') }}" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
                    <span><i class="fal fa-comment"></i> Messages</span>
                    <img src="{{ asset('asset/Message.gif') }}" alt="Message Icon" width="25" height="25">
                </a>
            </li>
            <li><a href="{{ url('/user/adverts') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-envelope-open-text"></i> Create an Advert</a></li>
            <li><a href="{{ url('/lostitem') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-envelope-open-text"></i> Lost and Found Items</a></li>
            <li class="logout-link"><a href="{{ route('logout') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-bell"></i> Logout</a></li>
        </ul>
    </div>

    <div class="content">
        <button class="btn d-md-none d-block close-btn px-1 py-0 text-white menu-btn" id="menuButton">
            <img src="{{ asset('asset/menu.png') }}" alt="Menu" width="24" height="24">
        </button>

        <div class="card mb-4 fade-in">
            <div class="card-header">
                <h1>Inbox</h1>
            </div>
            <div class="card-body scrollable">
                @if ($messages->isEmpty())
                    <p>No messages.</p>
                @else
                    <ul class="list-group">
                        @foreach ($messages as $message)
                        @php
                        $user = Auth::user();
                        $sender = App\Models\User::find($message->sender_id);
                        @endphp
                        @if ($message->receiver_email == $user->email)
                            <li class="list-group-item fade-in">
                                <strong>From:</strong> {{ $sender->email }}<br>
                                <strong>Message:</strong> {{ $message->content }}<br>
                                <small class="text-muted">Received at: {{ $message->created_at }}</small>
                            </li>
                        @endif
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <div class="card fade-in">
            <div class="card-header">
                <h1>Send a Message</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('messages.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="userxName">To:</label>
                        <input type="text" id="userxName" name="userxName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="content">Message:</label>
                        <textarea name="content" id="content" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
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
});
</script>

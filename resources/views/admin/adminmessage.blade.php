@extends('layouts.adminmessages')

@section('content')

<div class="message-list">
    <h1>Send a Message</h1>

    <form action="{{ route('messages.store') }}" method="POST">
        @csrf
        <div>
            <label for="receiver_id">To:</label>
            <select name="receiver_id" id="receiver_id">
                @foreach($messages as $message)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
    <div>
        <label for="content">Message:</label>
        <textarea name="content" id="content" rows="4"></textarea>
    </div>
    <div>
        <button type="submit">Send</button>
    </div>
</form>
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

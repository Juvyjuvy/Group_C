@extends('layouts.adminlogin')

@section('content')

<header>


<div class="container">
    <div class="col-left">
        <div class="login-text">
            <h2>Welcome Back</h2>
        </div>
    </div>
    <div class="col-right">
        <form method="POST" action="{{ route('admin.adminlogin') }}">
            @csrf
            <div class="login-form">
                <h2>Login</h2>
                <p>
                    <label for="email">Username or email address<span>*</span></label>
                    <input id="email" name="email" type="text" placeholder="Username or Email" value="{{ old('email') }}" required>
                </p>
                <p>
                    <label for="password">Password<span>*</span></label>
                    <input id="password" name="password" type="password" placeholder="Password" required>
                </p>
                <p>
                    <input type="submit" value="Sign In" />
                </p>
            </div>
        </form>
    </div>
</div>

@endsection

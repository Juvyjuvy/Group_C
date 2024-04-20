@extends('layouts.signup')

@section('content')
<div class="login-form">
<form id="loginForm" method="POST" action="{{ route('register.store')}}" method="post">
    @csrf

    <div class="input-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter Username">
    </div>
   <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter Email">
    </div>
    <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter Password">
    </div>
    <div class="input-group">
        <button type="submit" class="racetrack-button">Sign Up</button>
    </div>

    <div class="footer">
        <a style="color:rgb(236, 230, 230);">Login</a>&nbsp;
    &nbsp;
    <a href="#"style="color:white;">Forgot Password?</a>&nbsp;
    </div>
</form>
</div>


 @endsection

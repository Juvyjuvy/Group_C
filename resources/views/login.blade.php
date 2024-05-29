@extends('layouts.layout')

@section('content')
<div class="login-form" style="animation: slideInRight 0.5s ease;">
    <form method="POST" action="{{ route('login')}}">
        @csrf
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter Email" >
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" >
        </div>
        <div class="input-group">
            <button type="submit" href=""class="racetrack-button">Login</button>
        </div>
        <div class="footer">
            <a class="text-dark" href="register">Register</a>&nbsp;
            &nbsp;
            <a  class="text-dark" href="#">Forgot Password?</a>&nbsp;
        </div>
    </form>
</div>
@endsection

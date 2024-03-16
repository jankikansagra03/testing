@extends('layouts.guest_master')

@section('dynamic_section')
    <!-- Login Page -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Login</h2>
                <form action="{{ URL::to('/') }}/login_action" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="submit" class="btn" value="Login" />
                </form>
                <div class="mt-3">
                    <a href="forgot_password">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>
@endsection

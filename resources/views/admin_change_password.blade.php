@extends('layouts.admin_master')
@section('dynamic_section')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Change Passsword Form</h2>

                <form method="POST" action="{{ URL::to('/') }}/update_admin_password" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="password1">Old Password:</label>
                        <input type="password" class="form-control" id="password1" name="old_password"
                            value="{{ old('old_password') }}">
                        @error('old_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">New Password:</label>
                        <input type="password" class="form-control" id="password" name="password"
                            value="{{ old('password') }}">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm New Password:</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                            value="{{ old('password_confirmation') }}">
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="submit" class="btn" value="Register" />
                </form>

            </div>
        </div>
    </div>
@endsection

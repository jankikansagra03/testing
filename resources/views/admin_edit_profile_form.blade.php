@extends('layouts.admin_master')

@section('dynamic_section')
 <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Update Profile</h2>
                @php
                    $hobbies = explode(',', $result->hobbies);
                @endphp
                <form method="POST" action="{{ URL::to('/') }}/admin_update_form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="fullname">Full Name:</label>
                        <input type="text" class="form-control" id="fullname" name="fullname"
                            value="{{ $result->fullname }}">
                        @error('fullname')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Gender:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                                {{ $result->gender == 'male' ? 'checked' : '' }}>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                                {{ $result->gender == 'female' ? 'checked' : '' }}>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <!-- Add more radio buttons for other genders if needed -->
                        @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="mobile_number">Mobile Number:</label>
                        <input type="text" class="form-control" id="mobile_number" name="mobile_number"
                            value="{{ $result->mobile }}">
                        @error('mobile_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="hobbies">Hobbies:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="hobbies[]" id="hobby_reading"
                                value="Reading" {{ in_array('Reading', $hobbies) ? 'checked' : '' }}>
                            <label class="form-check-label" for="hobby_reading">Reading</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="hobbies[]" id="hobby_travelling"
                                value="Travelling" {{ in_array('Travelling', $hobbies) ? 'checked' : '' }}>
                            <label class="form-check-label" for="hobby_traveling">Travelling</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="hobbies[]" id="hobby_singing"
                                value="Singing" {{ in_array('Singing', $hobbies) ? 'checked' : '' }}>
                            <label class="form-check-label" for="hobby_singing">Singing</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="hobbies[]" id="hobby_dancing"
                                value="Dancing" {{ in_array('Dancing', $hobbies) ? 'checked' : '' }}>
                            <label class="form-check-label" for="hobby_reading">Dancing</label>
                        </div>
                        <!-- Add more checkboxes for other hobbies if needed -->
                        @error('hobbies')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <img src="{{ URL::to('/') }}/uploads/{{ $result->profile_picture }}" class="img-fluid" />
                    </div>
                    <div class="form-group">
                        <label for="profile_picture">Profile Picture:</label>
                        <input type="file" class="form-control-file" id="profile_picture" name="profile_picture"
                            accept="image/*">
                        @error('profile_picture')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="submit" class="btn" value="Register" />
                </form>

            </div>
        </div>
    </div>
    @endsection
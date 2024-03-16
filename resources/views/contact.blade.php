@extends('layouts.guest_master')

@section('dynamic_section')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Contact Details</h2>
                <p><strong>Email:</strong> info@example.com</p>
                <p><strong>Phone:</strong> +1 (123) 456-7890</p>
                <p><strong>Address:</strong> 123 Main Street, City, Country</p>
                <p><strong>Office Hours:</strong> Monday to Friday, 9:00 AM to 5:00 PM</p>
                <p><strong>Social Media:</strong></p>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">LinkedIn</a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <h2>Contact Form</h2>
                <p>Have a question or need assistance? Fill out the form below, and we'll get back to you as soon as
                    possible.</p>
                <form action="{{ URL::to('/') }}/contact_action" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="mobile1">Mobile Number:</label>
                        <input type="text" class="form-control" id="mobile1" name="mobile">
                        @error('mobile')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" name="message" rows="5"></textarea>
                        @error('message')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="submit" class="btn" value="Submit" />
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('student.layouts.app')


@section('title')
    My-Profile
@endsection


@section('student-content')
    <div class="col-lg-8 mt_30">
        <form action="#" class="donate_from_cart">
            <div class="row">
                <div class="col-lg-12 mb_30">
                <div class="text-center">
                    <img src="{{ asset('frontend/img/avatar.jpg') }}" alt="icon" class="avatar_img">
                </div>
                </div>
                <div class="col-lg-6">
                    <input type="text" placeholder="Full Name">
                </div>
                <div class="col-lg-6">
                    <input type="email" placeholder="Email Address">
                </div>
                <div class="col-lg-6">
                    <input type="number" placeholder="Phone No">
                </div>
                <div class="col-lg-6">
                    <input type="text" placeholder="Address">
                </div>
                <div class="col-lg-12">
                    <hr>
                </div>
                <div class="col-lg-4">
                    <input type="password" placeholder="Current Password">
                </div>
                <div class="col-lg-4">
                    <input type="password" placeholder="New Password">
                </div>
                <div class="col-lg-4">
                    <input type="password" placeholder="Confirm Password">
                </div>
                <div class="col-lg-6">
                    <button class="button">Update Profile</button>
                </div>
            </div>

        </form>
    </div>
@endsection

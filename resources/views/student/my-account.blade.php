@extends('frontend.layouts.app')


@section('title')
    My-account
@endsection


@section('content')
    <main class="overflow-hidden">
        <!-- inner home -->
        <div class="inner_home" style="background-image: url({{ asset('frontend/img/bannr-img.jpg') }});">
            <div class="container">
                <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                <h2>My-Account</h2>
            </div>
        </div>
        {{-- my_account_area --}}
        <div class="my_account_area mt_50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mt_30">
                        <ul class="profile_list">
                            <li><a href="#" class="active">Profile</a></li>
                            <li><a href="#">Courses</a></li>
                            <li><a href="#">Certificate</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-8 mt_30">
                        <form action="#" class="donate_from_cart">
                            <div class="row">
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
                                    <input type="text" placeholder="Subject">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Your Message"></textarea>
                                </div>
                                <div class="col-lg-6">
                                    <button class="button">Send Message</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

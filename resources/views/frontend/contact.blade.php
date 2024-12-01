@extends('frontend.layouts.app')


@section('title')
    Contact
@endsection


@section('content')
    <main class="overflow-hidden">
        <!-- inner home -->
        <div class="inner_home" style="background-image: url({{ asset('frontend/img/bannr-img.jpg') }});">
            <div class="container">
                <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                <h2>Contact Us</h2>
            </div>
        </div>
        <!-- contact_area -->
        <div class="contact_area">
            <div class="container">
                <div class="heading text-center">
                    <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                    <p>Help and guide you</p>
                    <h2>Dont Be a Stranger Just Say Hello</h2>
                </div>
                <div class="row mt_50">
                    <div class="col-lg-7 mt_50">
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
                    <div class="col-lg-5 mt_50">
                        <div class="contact-us">
                            <div>
                                <h4>Phone No:</h4>
                                <a href="tel:0012565256525">001 2565 2565 25</a>
                                <a href="tel:0012565256525">001 2565 2565 25</a>
                            </div>
                            <i>
                                <img src="{{ asset('frontend/img/cont-1.svg') }}" alt="">
                            </i>
                        </div>
                        <div class="contact-us">
                            <div>
                                <h4>Email Address:</h4>
                                <a href="mailto:help@domain.com">help@domain.com</a>
                                <a href="mailto:support@domain.com">support@domain.com</a>
                            </div>
                            <i>
                                <img src="{{ asset('frontend/img/cont-2.svg') }}" alt="">
                            </i>
                        </div>
                        <div class="contact-us">
                            <div>
                                <h4>Location:</h4>
                                <p>House-15 (3rd floor), Road-21, Sector-11,<br> Uttara, Dhaka-1230</p>
                            </div>
                            <i>
                                <img src="{{ asset('frontend/img/cont-3.svg') }}" alt="">
                            </i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="iframe_area mb_30">
            <div class="container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.390305551269!2d90.37948567846941!3d23.87577462875711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c411ff974505%3A0xeb73908e4eca9358!2sHouse%2015%20Road-21%2C%20Sector-11%2C%20Uttara%2C%20Dhaka-1230%2C%20Bangladesh%2C%20Dhaka%201230!5e0!3m2!1sen!2sbd!4v1732771590998!5m2!1sen!2sbd"
                    width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </main>
@endsection

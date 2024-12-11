@extends('frontend.layouts.app')


@section('title')
    Enroll
@endsection


@section('content')
    <main class="overflow-hidden">
        <!-- inner home -->
        <div class="inner_home" style="background-image: url({{ asset('frontend/img/bannr-img.jpg') }});">
            <div class="container">
                <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                <h2>Enroll</h2>
            </div>
        </div>
        {{-- enrol_course_area --}}
        <div class="enrol_course_area">
            <div class="container">
                <div class="enrol_cont_wrap" style="background-image: url({{ asset('frontend/img/banner11.jpg') }});">
                    <h2>Data Science and Machine Learning Career Path</h2>
                    <ul>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                    </ul>
                    <h3><strong>Course Price :</strong> ৳ 6,000</h3>
                </div>
            </div>
        </div>
        <!-- donate_from_area -->
        <div class="donate_from_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mt_50">
                        <div class="donate_from_cart">
                            <div class="bank_wrap">
                                <img src="{{ asset('frontend/img/Bank.png') }}" alt="">
                                <ul>
                                    <li>Name- MOTIUR RAHMAN</li>
                                    <li><strong>AC No-</strong> 20503830200444418</li>
                                    <li>Branch- Sonargaon janapath Road</li>
                                    <li>Islami Bank Bangladesh Ltd </li>
                                </ul>
                            </div>
                            <img src="{{ asset('frontend/img/line.png') }}" alt="" class="w-100 line-opacity">
                            <div class="bkash_wrap">
                                <img src="{{ asset('frontend/img/bkash.png') }}" alt="">
                                <ul>
                                    <li><strong>Bkash No-</strong> 01648888163</li>
                                </ul>
                            </div>
                            <img src="{{ asset('frontend/img/line.png') }}" alt="" class="w-100 line-opacity">
                            <div class="bkash_wrap">
                                <img src="{{ asset('frontend/img/nagad.jpg') }}" alt="">
                                <ul>
                                    <li><strong>Nagad No-</strong> 01648888163</li>
                                </ul>
                            </div>
                            <img src="{{ asset('frontend/img/line.png') }}" alt="" class="w-100 line-opacity">
                            <div class="bkash_wrap">
                                <img src="{{ asset('frontend/img/Rocket.png') }}" alt="">
                                <ul>
                                    <li><strong>Rocket No-</strong> 01648888163</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt_50">
                        <form action="#" class="donate_from_cart">
                            <input type="text" placeholder="Full Name">
                            <input type="email" placeholder="Enter Email">
                            <input type="bumber" placeholder="Phone Number">
                            <select>
                                <option value="Islami-Bank">Islami Bank Bangladesh Ltd</option>
                                <option value="Bkash">Bkash</option>
                                <option value="Nagad">Nagad</option>
                            </select>
                            <input type="text" placeholder="Transaction ID">
                            <input type="number" placeholder="Amount">
                            <button class="button">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection

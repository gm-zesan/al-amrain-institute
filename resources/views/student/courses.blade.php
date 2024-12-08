@extends('frontend.layouts.app')


@section('title')
    Courses
@endsection


@section('content')
    <main class="overflow-hidden">
        <!-- inner home -->
        <div class="inner_home" style="background-image: url({{ asset('frontend/img/bannr-img.jpg') }});">
            <div class="container">
                <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                <h2>Courses</h2>
            </div>
        </div>
        {{-- my_account_area --}}
        <div class="my_account_area mt_50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mt_30">
                        <ul class="profile_list">
                            <li><a href="{{ route('student.my-account') }}">Profile</a></li>
                            <li><a href="{{ route('student.courses') }}" class="active">Courses</a></li>
                            <li><a href="{{ route('student.certificate') }}">Certificate</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-8 mt_30">
                       <div class="row">
                        <div class="col-lg-4 mb_30">
                            <div class="course-block_two-inner">
                                <div class="course-block_two-image">
                                    <a href="course-detail.html"><img src="{{ asset('frontend/img/course-7.jpg') }}" alt=""></a>
                                </div>
                                <div class="course-block_two-content">
                                    <div class="course-block_two-icon">
                                        <img src="{{ asset('frontend/img/course-block_two.png') }}" alt="">
                                    </div>
                                    <a href="course-detail.html" class="course-block_two-study">Study Now</a>
                                    <h4 class="course-block_two-heading"><a href="course-detail.html">Tafseer of Surah
                                            Al-Fatiha Short Course </a></h4>
                                    <ul
                                        class="course-block_two-list d-flex justify-content-between flex-wrap align-items-center">
                                        <li><span>20</span>lessons</li>
                                        <li><span>10</span>weeks</li>
                                        <li><span>50</span>enroll</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb_30">
                            <div class="course-block_two-inner">
                                <div class="course-block_two-image">
                                    <a href="course-detail.html"><img src="{{ asset('frontend/img/dev_ops.jpg') }}" alt=""></a>
                                </div>
                                <div class="course-block_two-content">
                                    <div class="course-block_two-icon">
                                        <img src="{{ asset('frontend/img/course-block_two.png') }}" alt="">
                                    </div>
                                    <a href="course-detail.html" class="course-block_two-study">Study Now</a>
                                    <h4 class="course-block_two-heading"><a href="course-detail.html">Tafseer of Surah
                                            Al-Fatiha Short Course </a></h4>
                                    <ul
                                        class="course-block_two-list d-flex justify-content-between flex-wrap align-items-center">
                                        <li><span>20</span>lessons</li>
                                        <li><span>10</span>weeks</li>
                                        <li><span>50</span>enroll</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb_30">
                            <div class="course-block_two-inner">
                                <div class="course-block_two-image">
                                    <a href="course-detail.html"><img src="{{ asset('frontend/img/course-7.jpg') }}" alt=""></a>
                                </div>
                                <div class="course-block_two-content">
                                    <div class="course-block_two-icon">
                                        <img src="{{ asset('frontend/img/course-block_two.png') }}" alt="">
                                    </div>
                                    <a href="course-detail.html" class="course-block_two-study">Study Now</a>
                                    <h4 class="course-block_two-heading"><a href="course-detail.html">Tafseer of Surah
                                            Al-Fatiha Short Course </a></h4>
                                    <ul
                                        class="course-block_two-list d-flex justify-content-between flex-wrap align-items-center">
                                        <li><span>20</span>lessons</li>
                                        <li><span>10</span>weeks</li>
                                        <li><span>50</span>enroll</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@extends('frontend.layouts.app')


@section('title')
 Course
@endsection


@section('content')
    <main class="overflow-hidden">
        <!-- inner home -->
        <div class="inner_home" style="background-image: url({{ asset('frontend/img/bannr-img.jpg') }});">
            <div class="container">
                <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                <h2>All Courses</h2>
            </div>
        </div>
         <!-- all_courses -->
         <div class="selling_courses_area" style="background-image: url({{ asset('frontend/img/courses-two_bg.png') }});">
            <div class="container">
               <form action="#" class="course_search">
                <select>
                    <option>Topic</option>
                    <option>Web Development</option>
                    <option>Laravel</option>
                    <option>Data Science</option>
                    <option>Graphic Design</option>
                </select>
                <select>
                    <option>Level</option>
                    <option>Web Development</option>
                    <option>Laravel</option>
                    <option>Data Science</option>
                    <option>Graphic Design</option>
                </select>
                <button class="button">Search</button>
               </form>
                <div class="row mt_70">
                    <div class="col-lg-4 mt_30">
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
                                <div class="course-block_two-lower d-flex justify-content-between flex-wrap">
                                    <div class="course-block_two-author">
                                        <div class="course-block_two-author_image"><img src="{{ asset('frontend/img/author-4.png') }}"
                                                alt=""></div>
                                        <strong>Habib Al Noor</strong>
                                        <p>Arabic Teacher</p>
                                    </div>
                                    <div class="course-block_two-price">2000৳ <span>course free</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt_30">
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
                                <div class="course-block_two-lower d-flex justify-content-between flex-wrap">
                                    <div class="course-block_two-author">
                                        <div class="course-block_two-author_image"><img src="{{ asset('frontend/img/author-4.png') }}"
                                                alt=""></div>
                                        <strong>Habib Al Noor</strong>
                                        <p>Arabic Teacher</p>
                                    </div>
                                    <div class="course-block_two-price">2000৳ <span>course free</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt_30">
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
                                <div class="course-block_two-lower d-flex justify-content-between flex-wrap">
                                    <div class="course-block_two-author">
                                        <div class="course-block_two-author_image"><img src="{{ asset('frontend/img/author-4.png') }}"
                                                alt=""></div>
                                        <strong>Habib Al Noor</strong>
                                        <p>Arabic Teacher</p>
                                    </div>
                                    <div class="course-block_two-price">2000৳ <span>course free</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

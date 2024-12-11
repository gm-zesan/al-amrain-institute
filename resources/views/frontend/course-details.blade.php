@extends('frontend.layouts.app')


@section('title')
    Course Details
@endsection


@section('content')
    <main class="overflow-hidden">
        <!-- inner home -->
        <div class="inner_home" style="background-image: url({{ asset('frontend/img/bannr-img.jpg') }});">
            <div class="container">
                <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                <h2>{{ $course->title }}</h2>
            </div>
        </div>
        <!-- course_details_area -->
        <div class="course_details_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mt_50">
                        <div class="courses-details_cont hoverimg">
                            <figure>
                                <img src="{{ asset('storage/'.$course->image) }}" alt="{{ $course->title }}" class="w-100">
                            </figure>
                            <h2>{{ $course->title }}</h2>
                            <div class="total_student">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h2>{{ $course->enrolled_students_count }}+</h2>
                                        <p>Student</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <h2>{{ $course->weeks }}+</h2>
                                        <p>Weeks</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <h2>{{ $course->total_lessons }}+</h2>
                                        <p>Total Lessons</p>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <button class="nav-link active" id="pills-paths-tab" data-toggle="pill"
                                        data-target="#pills-paths" type="button" aria-controls="pills-paths"
                                        aria-selected="true">About this course</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="pills-learn-tab" data-toggle="pill"
                                        data-target="#pills-learn" type="button" aria-controls="pills-learn"
                                        aria-selected="false">what you will learn</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="pills-for-tab" data-toggle="pill" data-target="#pills-for"
                                        type="button" aria-controls="pills-for" aria-selected="false">pre
                                        requisite</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="pills-time-tab" data-toggle="pill"
                                        data-target="#pills-time" type="button" aria-controls="pills-time"
                                        aria-selected="false">Time & schedule</button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="pills-paths" aria-labelledby="pills-paths-tab">
                                    <ul class="this_course_cont">
                                        {!! $course->description !!}
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="pills-learn" aria-labelledby="pills-learn-tab">
                                    <ul class="this_course_cont">
                                        {!! $course->what_will_learn !!}
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="pills-for" aria-labelledby="pills-for-tab">
                                    <ul class="this_course_cont">
                                        {!! $course->prerequisites !!}
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="pills-time" aria-labelledby="pills-time-tab">
                                    <ul class="time_course">
                                        {!! $course->time_schedule !!}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt_50">
                        <div class="path_box possition_fixed">
                            <h2>What is this course?</h2>
                            {!! $course->description !!}
                            <h3>৳ {{ number_format($course->price,0) }}</h3>
                            <a href="{{ route('frontend.enroll', $course->id) }}" class="button">Enroll Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- course_share -->
         <div class="course_review_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="review_share">
                            <h2>User reviews</h2>
                            <div class="share_wrap">
                                <h3>Share</h3>
                                <div class="icon_box">
                                    <a href="#" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" target="_blank">
                                        <i class="fab fa-youtube"></i>
                                    </a>                        
                                    <a href="#" target="_blank">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="#" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a> 
                                </div>
                            </div>
                        </div>
                        <div class="comments-box-wrapper">
                            <div class="comments-count">
                                <h2>02 Comments</h2>
                            </div>
                            <div class="single-comment my-2">
                                <div class="authors-info">
                                    <div class="author-thumb">
                                        <a href="#"><img src="{{ asset('frontend/img/author-4.png') }}" alt=""></a>
                                    </div>
                                    <div class="author-data">
                                        <a href="#">Angel Mela</a>
                                        <p>05 October, 2023</p>
                                        <div class="comment">
                                            <p>Proactively envisioned multimedia based expertise and cross-media growth strategies. Seamlessly ize quality intellectual capital without superior collaboration and idea-sharing. Holistically pontificate installed</p>
                                        </div>
                                        <a href="#" class="reply-btn">Reply</a>
                                    </div>
                                </div>
                            </div>
                            <div class="single-comment my-2">
                                <div class="authors-info">
                                    <div class="author-thumb">
                                        <a href="#"><img src="{{ asset('frontend/img/author-4.png') }}" alt=""></a>
                                    </div>
                                    <div class="author-data">
                                        <a href="#">Jhon Deo</a>
                                        <p>05 October, 2023</p>
                                        <div class="comment">
                                            <p>Proactively envisioned multimedia based expertise and cross-media growth strategies. Seamlessly ize quality intellectual capital without superior collaboration and idea-sharing. Holistically pontificate installed</p>
                                        </div>
                                        <a href="#" class="reply-btn">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment-form-wrapper mt_30">
                            <h2> Write Your Comment</h2>
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea name="comment_message" id="comment_message" cols="30" rows="10" class="form-control" placeholder="Write Your Comment"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="button">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
    </main>
@endsection

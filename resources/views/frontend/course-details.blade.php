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
                <h2>Courses Details</h2>
            </div>
        </div>
        <!-- course_details_area -->
        <div class="course_details_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mt_50">
                        <div class="courses-details_cont hoverimg">
                            <figure>
                                <img src="{{ asset('frontend/img/dev_ops.jpg') }}" alt="img" class="w-100">
                            </figure>
                            <h2>Tafseer of Surah Al-Fatiha Short Course- Batch 1</h2>
                            <div class="total_student">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h2>150</h2>
                                        <p>Student</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <h2>12+</h2>
                                        <p>Hours of Lessons</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <h2>222</h2>
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
                                        <li>
                                            Nam vel lacus eu nisl bibendum accumsan vitae vitae nibh. Nam nec eros id magna
                                            hendrerit sagittis. Nullam sed mi non odio feugiat volutpat sit amet nec elit.
                                            Maecenas id hendrerit ipsum. Sed eget auctor metus, ac dapibus dolor. Nam vel
                                            lacus eu nisl bibendum accumsan vitae vitae nibh.
                                        </li>
                                        <li>Himenaeos. Vestibulum sollicitudin varius mauris non dignissim. Sed quis iaculis
                                            est. Nulla quam neque, interdum vitae fermentum lacinia, interdum eu magna.
                                            Mauris non posuere tellus. Donec quis euismod tellus. Nam vel lacus eu nisl
                                            bibendum accumsan vitae vitae nibh. Nam nec eros id magna hendrerit sagittis.
                                            Nullam sed mi non odio feugiat volutpat sit amet nec elit. Maecenas id hendrerit
                                            ipsum. Sed eget auctor metus, ac dapibus dolo</li>
                                        <li>Nam vel lacus eu nisl bibendum accumsan vitae vitae nibh. Nam nec eros id magna
                                            hendrerit sagittis. Nullam sed mi non odio feugiat volutpat sit amet nec elit.
                                            Maecenas id hendrerit ipsum. Sed eget auctor metus, ac dapibus dolor. Nam vel
                                            lacus eu nisl bibendum accumsan vitae vitae nibh.</li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="pills-learn" aria-labelledby="pills-learn-tab">
                                    <ul class="this_course_cont">
                                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, ipsum?
                                        </li>
                                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, ipsum?
                                        </li>
                                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, ipsum?
                                        </li>
                                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, ipsum?
                                        </li>
                                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, ipsum?
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="pills-for" aria-labelledby="pills-for-tab">
                                    <ul class="this_course_cont">
                                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, ipsum?
                                        </li>
                                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, ipsum?
                                        </li>
                                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, ipsum?
                                        </li>
                                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, ipsum?
                                        </li>
                                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, ipsum?
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="pills-time" aria-labelledby="pills-time-tab">
                                    <ul class="time_course">
                                        <li><strong>Class Starts:</strong> October 15</li>
                                        <li><strong>Class Time:</strong></li>
                                        <li><strong>Monday:</strong> 9 PM - 10:30PM</li>
                                        <li><strong>Wednesday:</strong> 9 PM - 10.30 PM</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt_50">
                        <div class="path_box possition_fixed" id="course_right">
                            <h2>What is this career path?</h2>
                            <ul>
                                <li>50+ live classes</li>
                                <li>200+ prerecorded videos</li>
                                <li>Support sessions daily</li>
                                <li>Mock interview session</li>
                                <li>Adequate practice materials</li>
                                <li>Lifetime access</li>
                            </ul>
                            <h3>৳ 2000</h3>
                            <a href="#" class="button">Enroll Now</a>
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

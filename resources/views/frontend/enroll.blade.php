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
                    <h2>{{ $course->title }}</h2>
                    {!! $course->description !!}
                    <h3><strong>Course Price :</strong> ৳ {{ number_format($course->price, 0) }}</h3>
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
                        <form action="{{ route('frontend.enroll.submit') }}" method="POST" class="donate_from_cart">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            @if (isset($student->id))
                                <input type="text" name="name" value="{{ $student->name }}" readonly required>
                            @else
                                <input type="text" name="name" placeholder="Full Name">
                            @endif

                            @if (isset($student->id))
                                <input type="email" name="email" value="{{ $student->email }}" readonly required>
                            @else
                                <input type="email" name="email" placeholder="Email">
                            @endif

                            @if (isset($student->id))
                                <input type="number" name="phone_no" value="{{ $student->phone_no }}" readonly required>
                            @else
                                <input type="number" name="phone_no" placeholder="Phone Number">
                            @endif

                            <select name="payment_method" id="payment_method" required>
                                <option value="Islami-Bank">Islami Bank Bangladesh Ltd</option>
                                <option value="Bkash">Bkash</option>
                                <option value="Nagad">Nagad</option>
                                <option value="Rocket">Rocket</option>
                            </select>
                            <input type="text" name="transaction_id" placeholder="Transaction ID">
                            <input type="number" name="total_amount" placeholder="Amount">
                            <button type="submit" class="button">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection

@extends('frontend.layouts.app')


@section('title')
Certificate
@endsection


@section('content')
    <main class="overflow-hidden">
        <!-- inner home -->
        <div class="inner_home" style="background-image: url({{ asset('frontend/img/bannr-img.jpg') }});">
            <div class="container">
                <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                <h2>Certificate</h2>
            </div>
        </div>
        {{-- my_account_area --}}
        <div class="my_account_area mt_50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mt_30">
                        <ul class="profile_list">
                            <li><a href="{{ route('student.my-account') }}">Profile</a></li>
                            <li><a href="{{ route('student.courses') }}">Courses</a></li>
                            <li><a href="{{ route('student.certificate') }}" class="active">Certificate</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-8 mt_30">
                        <table>
                            <tr>
                              <th>Course Name</th>
                              <th>Issue Date</th>
                              <th style="text-align: center">Action</th>
                            </tr>
                            <tr>
                              <td>Complete Tafseer of Surah Al-Fatiha Short Course</td>
                              <td>August 12,2024</td>
                              <td style="text-align: center"><a href="#" class="button" title="Certificate Download">Download</a></td>
                            </tr>
                            <tr>
                              <td>Complete Tafseer of Surah Al-Fatiha Short Course</td>
                              <td>August 12,2024</td>
                              <td style="text-align: center"><a href="#" class="button" title="Certificate Download">Download</a></td>
                            </tr>
                            <tr>
                              <td>Complete Tafseer of Surah Al-Fatiha Short Course</td>
                              <td>August 12,2024</td>
                              <td style="text-align: center"><a href="#" class="button" title="Certificate Download">Download</a></td>
                            </tr>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

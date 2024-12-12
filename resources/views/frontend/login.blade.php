@extends('frontend.layouts.app')


@section('title')
    Login
@endsection


@section('content')
    <main class="overflow-hidden">
        <!-- inner home -->
        <div class="inner_home" style="background-image: url({{ asset('frontend/img/bannr-img.jpg') }});">
            <div class="container">
                <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                <h2>Sign up / Login</h2>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert text-center text-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('error'))
            <div class="alert text-center text-danger">
                {{ session('error') }}
            </div>
        @endif
        
        <!-- contact_area -->
        <div class="login_area">
            <div class="container">
                <div class="login_main">
                    
                    <input type="checkbox" id="chk" aria-hidden="true">

                    <div class="signup">
                        <form action="{{ route('student.register') }}" method="POST">
                            @csrf
                            <label for="chk" aria-hidden="true">Registration</label>
                            <input type="text" name="name" placeholder="User name" required>
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="number" name="phone_no" placeholder="Phone Number" required>
                            <input type="password" name="password" placeholder="Password" required>
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                            <button type="submit">Sign up</button>
                        </form>
                    </div>

                    <div class="login">
                        <form action="{{ route('student.processLogin') }}" method="POST">
                            @csrf
                            <label for="chk" aria-hidden="true">Login</label>
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="password" name="password" placeholder="Password" required>
                            <button type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

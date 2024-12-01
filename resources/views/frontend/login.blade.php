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
        <!-- contact_area -->
        <div class="login_area">
            <div class="container">
                <div class="login_main">
                    <input type="checkbox" id="chk" aria-hidden="true">

                    <div class="signup">
                        <form>
                            <label for="chk" aria-hidden="true">Registration</label>
                            <input type="text" name="txt" placeholder="User name" required="">
                            <input type="email" name="email" placeholder="Email" required="">
                            <input type="number" name="broj" placeholder="Phone Number" required="">
                            <input type="password" name="pswd" placeholder="Password" required="">
                            <button>Sign up</button>
                        </form>
                    </div>

                    <div class="login">
                        <form>
                            <label for="chk" aria-hidden="true">Login</label>
                            <input type="email" name="email" placeholder="Email" required="">
                            <input type="password" name="pswd" placeholder="Password" required="">
                            <button>Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

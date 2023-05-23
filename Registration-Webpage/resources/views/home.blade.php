@extends('layouts.app')

@section('content')
    <?php
    session_start();
    $lang = app()->getLocale();
    $insertRoute = $lang . '/insert';
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Form</title>
    </head>

    <body>
        @if (session('error'))
            <div id="popup-container">
                <div id="popup" class="popup">
                    <h2 id="popup-message"> {{ __('User already exists!') }}</h2>
                    <div id="okDiv">
                        <button type="button" id="okBtn" onclick="closePopup()">{{ __('OK') }}</button>
                    </div>
                </div>
            </div>
            @php
                session()->forget('error');
            @endphp
        @endif


        @if (session('success'))
            <div id="popup-container">
                <div id="popup" class="popup">
                    <h2 id="popup-message">{{ __('Registration successful!') }}</h2>
                    <div id="okDiv">
                        <button type="button" id="okBtn" onclick="closePopup()">{{ __('OK') }}</button>
                    </div>
                </div>
            </div>
            @php
                session()->forget('success');
            @endphp
        @endif

        <div class="container row">
            <div class="form col-6">
                <form id="form" class="group" method="post" action={{ $insertRoute }} enctype="multipart/form-data">
                    @csrf
                    <h1>{{ __(' Sign Up') }} </h1>
                    <div class="row" id="fields-error">
                        <div class="col"> * {{ __('indicates required fields') }}</div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">{{ __('First Name') }} <span> * </span> </label>
                        </div>
                        <div class="col-75">
                            <input name="fullname" type="text" id="fname" placeholder="Enter Your Name" required>
                        </div>
                    </div>
                    <div class="row" id="name-error">
                        <div class="col"></div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="uname">{{ __('Username') }} <span> * </span></label>
                        </div>
                        <div class="col-75">
                            <input name="username" type="text" id="uname" placeholder="Enter Your Username" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="date"> {{ __('Birthdate') }}<span> * </span></label>
                        </div>
                        <div class="col-75">
                            <input name="birthdate" type="date" id="date" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="phone"> {{ __('Phone') }}<span> * </span></label>
                        </div>
                        <div class="col-75">
                            <input name="phone" type="text" id="phone" placeholder="01010101010" required
                                maxlength="11" minlength="11">
                        </div>
                    </div>
                    <div class="row" id="phone-error">
                        <div class="col"></div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="address"> {{ __('Address') }}<span> * </span></label>
                        </div>
                        <div class="col-75">
                            <input name="address" type="text" id="address" placeholder="St-region-city" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="pass"> {{ __('Password') }}<span> * </span></label>
                        </div>
                        <div class="col-75">
                            <input name="password" type="password" id="pass" placeholder="Enter Strong Password"
                                required>
                        </div>
                        <div class="row" id="pass-error">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="cpass"> {{ __('Confirm Password') }} <span> * </span></label>
                        </div>
                        <div class="col-75">
                            <input type="password" id="cpass" placeholder="Enter Password" required>
                        </div>
                        <div class="row" id="cpass-error">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="img"> {{ __('Your Image') }}<span> * </span></label>
                        </div>
                        <div class="col-75">
                            <input name="imageName" type="file" id="img" class="no-bg" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="email"> {{ __('Email') }}<span> * </span></label>
                        </div>
                        <div class="col-75">
                            <input name="email" type="email" id="email" placeholder="name@gmail.com" required>
                        </div>
                        <div class="row" id="email-error">
                            <div class="col"></div>
                        </div>
                    </div>

                    <div id="Bdiv">
                        <input type="submit" disabled value={{ __('Register') }} id="submitB" action="upload.php">
                    </div>

                    <p> {{ __('Already have an account?') }}
                        <a class="text-white text-decoration-none" href="">{{ __('Signin') }}</a>
                    </p>

                </form>
            </div>
            <div class="get-actors col-6">
                <button id="actorsID" class="actors"> {{ __('Get actors') }}</button>
                <div class="actor"></div>
            </div>
        </div>

        <script src="{{ asset('js/clientSideValidation.js') }}"></script>
        <script src="{{ asset('js/api_ops.js') }}"></script>
    </body>

    </html>
@endsection

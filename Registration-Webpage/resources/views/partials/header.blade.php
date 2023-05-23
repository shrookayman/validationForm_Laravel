<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <title>Document</title>
    <link rel="stylesheet" href="{{ URL::asset('css/header.css') }}">
</head>

<body>
    <div class="header">
        <div class="header-right">
            <a class="acticve" href="#home"> <i class="fa fa-home"></i> {{__('Home')}}</a>
            <a href="#contact"> <i class="fa fa-phone"></i>{{__(' Contact Us')}}</a>
            <a href="#form"> <i class="fa fa-user-plus"></i>{{__(' Sign Up')}}</a>
            <a href="{{route(Route::currentRouteName(),'/en')}}">{{__('EN')}}</a>
            <a href="{{route(Route::currentRouteName(),'/fr')}}">{{__('FR')}} &nbsp &nbsp</a>
            {{-- <div class="dropdown">
                <button class="dropbtn">
                    <i class="fa fa-globe"></i>
                    <i class="fa fa-caret-down"></i>
                    &nbsp &nbsp
                </button>
                <div class="dropdown-content">
                    <a href="{{route(Route::currentRouteName(),'/en')}}">{{__('English')}}</a>
                    <a href="{{route(Route::currentRouteName(),'/fr')}}">{{__('French')}}</a>
                </div>
            </div> --}}
        </div>
        <div class="clr"></div>
    </div>
</body>
</html>

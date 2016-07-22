<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('CSS/styleCSS.css')}}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body id="impont">


<form action="{{ URL::route('language-chooser') }}" method="get">
    <select name="locale">
        <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
        <option value="ua" {{ app()->getLocale() == 'ua' ? 'selected' : '' }}>Ukrainian</option>
    </select>
    <input type="submit" value="select">
    {{ Form::token() }}
</form>

<div id="link">

    <ul>

        <li class="menu"><a href="{{route('Rtask')}}">{{ trans('getting.about') }}</a></li>

        <li class="menu"><a href="{{route('rcategory', ['id' => 1])}}">{{ trans('getting.dog') }}</a></li>

        <li class="menu"><a href="{{route('rcategory', ['id' => 2])}}">{{ trans('getting.cat') }}</a></li>

        <li class="menu"><a href="{{route('rcategory', ['id' => 3])}}">{{ trans('getting.parrot') }}</a></li>

    <li class="menu"><a href="{{route('Rhome')}}">{{ trans('getting.log') }}</a></li>

    <li class="menu"><a href="{{route('contact')}}">{{ trans('getting.note') }}</a></li>
        </ul>
</div>

@if(Session::has('message'))
    <div class="alert alert-info">
      {{Session::get('message')}}
    </div>
@endif
<div class="container">
<div class="row">
    <div class="col-md-12 col md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-body">
                    @yield('content')

                </div>
            </div>
            </div>

        </div>
    </div>
</div>

<script>$('.dropdown-toggle').dropdown()</script>
</body>
</html>

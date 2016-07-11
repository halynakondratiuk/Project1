<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('CSS/styleCSS.css')}}">
    <!-- Latest compiled and minified CSS -->
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">--}}
</head>
<body>
<div id="link">
    <a href="{{ route('Rget') }}">star page</a>
    <a href="{{route('Rtask')}}">task</a>
    <a href="{{route('Rtask1')}}">task1</a>
    <a href="{{route('Rsite')}}">site</a>
</div>
    @yield('content')


</body>
</html>

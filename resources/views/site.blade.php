@extends('template')

@section('content')
    <h1>i don't know</h1>
    <div id="form">
    <form action="..." method="post" >
        <label for="username">Name: </label><input type="text" name="userName" id="username"></br>
        <label for="login">Login: </label><input type="text" name="userLogin" id="login"></br>
        <label for="password">PassWord: </label><input type="password" name="userPassword" id="password"></br>
        <input type="submit" value="Add" name="addsubmit">
    </form>
    </div>
@endsection
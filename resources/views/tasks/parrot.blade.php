@extends('layouts.template')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12" class="nav navbar-nav nav-pills" >
                <ul class="list">
                    @foreach($animals as $animal)
                        <li>
                            <p><h1><i>{{ $animal->name }}</i></h1>
                            <img alt="" width="250" height="200" src={{ asset($animal->reference) }}  />
                             <a href="{{ url('animal/'.$animal->id) }}"> Found out more...</a>
                            </p>
                            @endforeach

                        </li>
                </ul>

            </div>
        </div>
    </div>
@endsection
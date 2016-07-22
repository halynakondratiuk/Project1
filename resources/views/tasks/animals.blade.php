@extends('layouts.template')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-offset-2 centered" >

                            <h1>{{ $animal->name }}</h1>
                            <img alt="" width="450" height="337" src={{ asset($animal->reference) }}  />
                            <p>{{ $animal->describe}}</p>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-md-6">
            {!! Form::open(array('url' => url('animal/' . $animal->id), 'class' => 'form')) !!}
            <div class="form-group">
                {!! Form::label('Your E-mail Address') !!}
                {!! Form::text('email', null,
                    array('required',
                          'class'=>'form-control',
                          'placeholder'=>'Your e-mail address')) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Help me!',
                  array('class'=>'btn btn-primary')) !!}
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-md-6">
            <ul>
               <label>Number of helpers :</label> {{count($animal->helper)}}
                @foreach($animal->helper as $helper)
                    <li>
                        {{$helper->email}}
                        @endforeach
                    </li>
            </ul>
        </div>
    </div>



@endsection
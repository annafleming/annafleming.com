@extends('app')

@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">Add Config</h1>
        @include('config.partials.form', ['method' => 'POST',
                                        'action'=>'ConfigController@store'])
    </div>
@endsection('content')

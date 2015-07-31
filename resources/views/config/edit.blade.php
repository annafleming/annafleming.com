@extends('app')

@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">Edit '{{ $config->name }}'</h1>
        @include('config.partials.form', ['method' => 'PUT',
                                        'action'=>['ConfigController@update', $config->id]])
    </div>
@endsection
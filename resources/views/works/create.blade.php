@extends('admin')

@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">Create new Work</h1>
        @include('works.partials.form', ['method' => 'POST',
                                        'action'=>'WorksController@store'])
    </div>
@endsection('content')

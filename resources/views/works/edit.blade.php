@extends('admin')

@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">Edit '{{ $work->name }}'</h1>
        @include('works.partials.form', ['method' => 'PUT',
                                        'action'=>['WorksController@update', $work->id]])
    </div>
@endsection
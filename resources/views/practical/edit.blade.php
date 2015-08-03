@extends('admin')

@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">Edit '{{ $skill->name }}'</h1>
        @include('practical.partials.form', ['method' => 'PUT',
                                        'action'=>['PracticalSkillsController@update', $skill->id]])
    </div>
@endsection
@extends('admin')

@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">Edit '{{ $skill->name }}'</h1>
        @include('skills.partials.form', ['method' => 'PUT',
                                        'action'=>['SkillsController@update', $skill->id]])
    </div>
@endsection('content')

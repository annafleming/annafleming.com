@extends('admin')

@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">Create new Skill</h1>
        @include('skills.partials.form', ['method' => 'POST',
                                        'action'=>'SkillsController@store'])
    </div>
@endsection('content')

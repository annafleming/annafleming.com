@extends('admin')

@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">Create new Practical Skill</h1>
        @include('practical.partials.form', ['method' => 'POST',
                                        'action'=>'PracticalSkillsController@store'])
    </div>
@endsection('content')

@extends('app')

@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">Create new Skill Category</h1>
        @include('skillcategory.partials.form', ['method' => 'POST',
                                        'action'=>'SkillCategoryController@store'])
    </div>
@endsection('content')

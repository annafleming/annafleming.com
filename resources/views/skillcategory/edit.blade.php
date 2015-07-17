@extends('app')

@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">Edit '{{ $category->name }}'</h1>
        @include('skillcategory.partials.form', ['method' => 'PUT',
                                        'action'=>['SkillCategoryController@update', $category->id]])
    </div>
@endsection('content')

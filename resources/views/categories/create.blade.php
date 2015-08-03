@extends('admin')

@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">Create new Skill Category</h1>
        @include('categories.partials.form', ['method' => 'POST',
                                        'action'=>'CategoriesController@store'])
    </div>
@endsection('content')

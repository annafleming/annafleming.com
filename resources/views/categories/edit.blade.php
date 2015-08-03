@extends('admin')

@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">Edit '{{ $category->name }}'</h1>
        @include('categories.partials.form', ['method' => 'PUT',
                                        'action'=>['CategoriesController@update', $category->id]])
    </div>
@endsection('content')

@extends('admin')

@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">Edit '{{ $language->name }}'</h1>
        @include('languages.partials.form', ['method' => 'PUT',
                                        'action'=>['LanguagesController@update', $language->id]])
    </div>
@endsection
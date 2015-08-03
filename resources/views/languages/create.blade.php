@extends('admin')

@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">Add New Language</h1>
        @include('languages.partials.form', ['method' => 'POST',
                                        'action'=>'LanguagesController@store'])
    </div>
@endsection('content')

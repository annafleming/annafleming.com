@extends('app')

@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">Add Record</h1>
        @include('history.partials.form', ['method' => 'POST',
                                        'action'=>'HistoryController@store'])
    </div>
@endsection('content')

@extends('admin')

@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">Edit '{{ $record->name }}'</h1>
        @include('history.partials.form', ['method' => 'PUT',
                                        'action'=>['HistoryController@update', $record->id]])
    </div>
@endsection
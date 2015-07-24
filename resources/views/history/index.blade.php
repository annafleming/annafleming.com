@extends('app')
@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">History managing</h1>

        <div>
            {!! link_to_route ('history.create', 'Add new record', [], ['class' => 'btn btn-primary
            btn-sm']) !!}
        </div>

        <div class="tableContainer">
            @include('history.partials.table')
        </div>
    </div>
@endsection
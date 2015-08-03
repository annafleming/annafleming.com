@extends('admin')

@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">Config managing</h1>

        <div>
            {!! link_to_route ('config.create', 'Add new config', [], ['class' => 'btn btn-primary
            btn-sm']) !!}
        </div>

        <div class="tableContainer">
            @include('config.partials.table')
        </div>
    </div>
@endsection
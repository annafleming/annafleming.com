@extends('app')
@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">Languages managing</h1>

        <div>
            {!! link_to_route ('languages.create', 'Add new language', [], ['class' => 'btn btn-primary
            btn-sm']) !!}
        </div>

        <div class="tableContainer">
            @include('languages.partials.table')
        </div>
    </div>
@endsection
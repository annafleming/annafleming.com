@extends('admin')

@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">Practical skills managing</h1>

        <div>
            {!! link_to_route ('practical.create', 'Create new practical skill', [], ['class' => 'btn btn-primary
            btn-sm']) !!}
        </div>

        <div class="tableContainer">
            @include('practical.partials.table')
        </div>
    </div>
@endsection
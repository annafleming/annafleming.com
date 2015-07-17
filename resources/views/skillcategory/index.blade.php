@extends('app')

@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">Skill categories managing</h1>

        <div>
            {!! link_to ('skillcategory/create', 'Create new practical skill', ['class' => 'btn btn-primary
            btn-sm']) !!}
        </div>

        <div class="tableContainer">
            @include('skillcategory.partials.table')
        </div>
    </div>
@endsection
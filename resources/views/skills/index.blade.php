@extends('app')

@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">Skills managing</h1>

        <div>
            {!! link_to ('skillcategory/create', 'Create new skill category', ['class' => 'btn btn-primary
            btn-sm']) !!}
        </div>
        <br/>
        <div>
            {!! link_to ('skills/create', 'Create new skill', ['class' => 'btn btn-primary
            btn-sm']) !!}
        </div>
        <div class="tableContainer">
            @include('skills.partials.table')
        </div>
    </div>
@endsection
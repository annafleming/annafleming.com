
{!! Form::model($record, ['method' => $method, 'action' => $action]) !!}

<!-- Image Form Input -->

<!-- Name Form Input -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Form Input -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Period Form Input -->
<div class="form-group">
    {!! Form::label('period', 'Period:') !!}
    {!! Form::text('period', null, ['class' => 'form-control']) !!}
</div>

<!-- Length Form Input -->
<div class="form-group">
    {!! Form::label('length', 'Length:') !!}
    {!! Form::text('length', null, ['class' => 'form-control']) !!}
</div>

<!-- Hidden Form Input -->
<div class="form-group">
    {!! Form::label('hidden', 'Hidden:') !!}
    {!! Form::hidden('hidden', 0); !!}
    {!! Form::checkbox('hidden', 1, false) !!}
</div>

<!-- Special Form Input -->
<div class="form-group">
    {!! Form::label('special', 'Special:') !!}
    {!! Form::hidden('special', 0); !!}
    {!! Form::checkbox('special', 1, false) !!}
</div>

<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
</div>

{!! Form::close() !!}

@include('partials.errors')

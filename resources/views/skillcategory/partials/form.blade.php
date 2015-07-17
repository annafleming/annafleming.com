
{!! Form::model($category, ['method' => $method, 'action' => $action, 'files' => true]) !!}

<!-- Image Form Input -->

<!-- Name Form Input -->
<div class="form-group">
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>


<!-- Hidden Form Input -->
<div class="form-group">
    {!! Form::label('hidden', 'Hidden:') !!}
    {!! Form::hidden('hidden', 0); !!}
    {!! Form::checkbox('hidden', 1, false) !!}
</div>

<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
</div>

{!! Form::close() !!}

@include('partials.errors')

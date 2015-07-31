
{!! Form::model($work, ['method' => $method, 'action' => $action, 'files' => true]) !!}

<!-- Image Form Input -->

<!-- link Form Input -->
<div class="form-group">
    {!! Form::label('link', 'Link:') !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
</div>

<!-- hidden Form Input -->
<div class="form-group">
    {!! Form::label('hidden', 'Hidden:') !!}
    {!! Form::hidden('hidden', 0); !!}
    {!! Form::checkbox('hidden', 1, false) !!}
</div>

<!-- name Form Input -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- description Form Input -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- my_role Form Input -->
<div class="form-group">
    {!! Form::label('my_role', 'My role:') !!}
    {!! Form::textarea('my_role', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
    @if ($work->isFileExists())
        {!! Html::image($work->getFilePath(), $work->name, ['class' => 'img-responsive'] ) !!}
    @endif
</div>

<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
</div>

{!! Form::close() !!}

@include('partials.errors')

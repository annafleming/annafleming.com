{!! Form::model($config, ['method' => $method, 'action' => $action, 'files' => true]) !!}

<!-- Name Form Input -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Form Input -->
<div class="form-group">
    {!! Form::label('field_type', 'Field type:') !!}
    {!! Form::select('field_type', $config->fieldTypes, $config->field_type, ['class' => 'managing-select']) !!}
</div>

<!-- Value Form Input -->
<div class="form-group">
    {!! Form::label('value', 'Value:') !!}
    <div class="toggle-block file" style="{{ ($config->field_type != 'file') ? 'display:none' : '' }}">
        {!! Form::file('value', ['class' => 'form-control  toggle-field', ($config->field_type != 'file') ? 'disabled' : '']) !!}
        @if ($config->isImageFile('value'))
            {!! Html::image($config->getFilePath('value'), $config->value, ['class' => 'img-responsive'] ) !!}
        @endif
    </div>
    <div class="toggle-block text" style="{{ ($config->field_type != 'text') ? 'display:none' : '' }}">
        {!! Form::textarea('value', null, ['class' => 'form-control toggle-field', ($config->field_type != 'text') ? 'disabled' : '']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
</div>

{!! Form::close() !!}

@include('partials.errors')

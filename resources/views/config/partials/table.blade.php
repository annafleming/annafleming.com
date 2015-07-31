<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Value</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($configs as $config)
        <tr>
            <td>{{ $config->name }}</td>
            <td>{{ $config->field_type }}</td>
            <td>
                @if ($config->field_type == 'file' && $config->isImageFile('value'))
                    {!! Html::image($config->getFilePath('value'), $config->value, ['class' => 'img-responsive'] ) !!}
                @else
                    {{ $config->value }}
                @endif
            </td>
            <td>
                {!! link_to_route ('config.destroy', 'Delete', ['id'=>$config->id], ['class' => 'btn
                btn-primary
                btn-sm item-ajax-delete', 'data-token' => csrf_token()]) !!}
                {!! link_to_route ('config.edit', 'Edit', ['id'=>$config->id], ['class' => 'btn btn-danger
                btn-sm']) !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


<div class="empty-table-message" style="{{ ($configs->count() == 0) ? '' : 'display:none;' }} ">
    You haven't added any configs
</div>
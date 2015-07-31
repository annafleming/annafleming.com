<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>Visibility</th>
        <th>Name</th>
        <th>Image</th>
        <th>Move</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($languages as $language)
        <tr>
            <td>{{ ($language->hidden) ? 'Hidden' : 'Visible'}}</td>
            <td>{{ $language->name }}</td>
            <td>
                @if ($language->isFileExists())
                    {!! Html::image($language->getFilePath(), $language->name, ['class' => 'img-responsive'] ) !!}
                @endif
            </td>
            <td>
                {!! link_to ("languages/move/$language->id/up", '⬆', ['class' => 'btn btn-success
                item-ajax-move btn-sm']) !!}
                {!! link_to ("languages/move/$language->id/down", '⬇', ['class' => 'btn btn-success
                item-ajax-move btn-sm']) !!}
            </td>
            <td>
                {!! link_to_route ('languages.destroy', 'Delete', ['id'=>$language->id], ['class' => 'btn
                btn-primary
                btn-sm item-ajax-delete', 'data-token' => csrf_token()]) !!}
                {!! link_to_route ('languages.edit', 'Edit', ['id'=>$language->id], ['class' => 'btn btn-danger
                btn-sm']) !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


<div class="empty-table-message" style="{{ ($languages->count() == 0) ? '' : 'display:none;' }} ">
    You haven't added any languages
</div>
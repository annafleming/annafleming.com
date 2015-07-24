<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>Visibility</th>
        <th>Name</th>
        <th>Description</th>
        <th>Period</th>
        <th>Length</th>
        <th>Special design</th>
        <th>Move</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($records as $record)
        <tr>
            <td>{{ ($record->hidden) ? 'Hidden' : 'Visible'}}</td>
            <td>{{ $record->name }}</td>
            <td>{{ $record->description }}</td>
            <td>{{ $record->period }}</td>
            <td>{{ $record->length }}</td>
            <td>{{ ($record->special) ? 'Yes' : 'No'}}</td>
            <td>
                {!! link_to ("history/move/$record->id/up", '⬆', ['class' => 'btn btn-success
                item-ajax-move btn-sm']) !!}
                {!! link_to ("history/move/$record->id/down", '⬇', ['class' => 'btn btn-success
                item-ajax-move btn-sm']) !!}
            </td>
            <td>
                {!! link_to_route ('history.destroy', 'Delete', ['id'=>$record->id], ['class' => 'btn
                btn-primary
                btn-sm item-ajax-delete', 'data-token' => csrf_token()]) !!}
                {!! link_to_route ('history.edit', 'Edit', ['id'=>$record->id], ['class' => 'btn btn-danger
                btn-sm']) !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


<div class="empty-table-message" style="{{ ($records->count() == 0) ? '' : 'display:none;' }} ">
    History is empty
</div>
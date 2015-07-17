<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>Visibility</th>
        <th>Name</th>
        <th>Rank</th>
        <th>Move</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($skills as $skill)
        <tr>
            <td>{{ ($skill->hidden) ? 'Hidden' : 'Visible'}}</td>
            <td>{{ $skill->name }}</td>
            <td>{{ $skill->rank }}</td>
            <td>
                {!! link_to ("practical/move/$skill->id/up", '⬆', ['class' => 'btn btn-success
                item-ajax-move btn-sm']) !!}
                {!! link_to ("practical/move/$skill->id/down", '⬇', ['class' => 'btn btn-success
                item-ajax-move btn-sm']) !!}
            </td>
            <td>
                {!! link_to_route ('practical.destroy', 'Delete', ['id'=>$skill->id], ['class' => 'btn
                btn-primary
                btn-sm item-ajax-delete', 'data-token' => csrf_token()]) !!}
                {!! link_to_route ('practical.edit', 'Edit', ['id'=>$skill->id], ['class' => 'btn btn-danger
                btn-sm']) !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


<div class="empty-table-message" style="{{ ($skills->count() == 0) ? '' : 'display:none;' }} ">
    You haven't created any works
</div>
<table class="table">
    <thead>
    <tr>
        <th>Visibility</th>
        <th>Name</th>
        <th>Move</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{ ($category->hidden) ? 'Hidden' : 'Visible'}}</td>
            <td>{{ $category->name }}</td>
            <td>
                {!! link_to ("categories/move/$category->id/up", '⬆', ['class' => 'btn btn-success
                item-ajax-move btn-sm']) !!}
                {!! link_to ("categories/move/$category->id/down", '⬇', ['class' => 'btn btn-success
                item-ajax-move btn-sm']) !!}
            </td>
            <td>
                {!! link_to_route ('categories.destroy', 'Delete', ['id'=>$category->id], ['class' => 'btn
                btn-primary
                btn-sm item-ajax-delete', 'data-token' => csrf_token()]) !!}
                {!! link_to_route ('categories.edit', 'Edit', ['id'=>$category->id], ['class' => 'btn btn-danger
                btn-sm']) !!}
            </td>
        </tr>


        @if ($skills = $category->skills)
            @foreach($skills as $skill)
                <tr class="category-skill">
                    <td>{{ ($skill->hidden) ? 'Hidden' : 'Visible'}}</td>
                    <td>{{ $skill->name }}</td>
                    <td>
                        {!! link_to ("skills/move/$skill->id/up", '⬆', ['class' => 'btn btn-success
                        item-ajax-move btn-xs']) !!}
                        {!! link_to ("skills/move/$skill->id/down", '⬇', ['class' => 'btn btn-success
                        item-ajax-move btn-xs']) !!}
                    </td>
                    <td>
                        {!! link_to_route ('skills.destroy', 'D', ['id'=>$skill->id], ['class' => 'btn
                        btn-primary
                        btn-sm item-ajax-delete', 'data-token' => csrf_token()]) !!}
                        {!! link_to_route ('skills.edit', 'E', ['id'=>$skill->id], ['class' => 'btn btn-danger
                        btn-sm']) !!}
                    </td>
                </tr>
            @endforeach
        @else
            <tr class="category-skill">
                <td colspan="6">0 Skills</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>


<div class="empty-table-message" style="{{ ($categories->count() == 0) ? '' : 'display:none;' }} ">
    You haven't created any categories
</div>
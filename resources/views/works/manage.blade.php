@extends('app')

@section('content')
    <div class="adminBlock">
        <h1 class="page-heading">Works managing</h1>

        <div>
            {!! link_to_route ('works.create', 'Create new work', [], ['class' => 'btn btn-primary btn-sm']) !!}
        </div>

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Visibility</th>
                <th>Name</th>
                <th>Link</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($works as $work)
                <tr>
                    <td>{{ ($work->hidden) ? 'Hidden' : 'Visible'}}</td>
                    <td>{{ $work->name }}</td>
                    <td>{{ $work->link }}</td>
                    <td>{{ $work->image }}</td>
                    <td>
                        {!! link_to_route ('works.destroy', 'Delete', ['id'=>$work->id], ['class' => 'btn btn-primary
                        btn-sm item-ajax-delete', 'data-token' => csrf_token()]) !!}
                        {!! link_to_route ('works.edit', 'Edit', ['id'=>$work->id], ['class' => 'btn btn-danger
                        btn-sm'])
                        !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


        <div class="empty-table-message" style="{{ ($works->count() == 0) ? '' : 'display:none;' }} ">
            You haven't created any works
        </div>
    </div>
@endsection
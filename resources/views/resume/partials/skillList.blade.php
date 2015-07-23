
@foreach( $categories as $category)
    <h3>{{ $category->name }}</h3>
    @if ($skills = $category->visibleSkills)
        <ul>
            @foreach( $skills as $skill)
                <li>{{ $skill->name }}</li>
            @endforeach
        </ul>
    @endif
@endforeach
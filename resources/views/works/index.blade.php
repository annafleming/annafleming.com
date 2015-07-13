@extends('app')

@section('content')

    <section class="works">
        <header>
            <h1><span>The</span>works</h1>
        </header>

        <div class="works-list">
            @foreach($works as $work)
                <article>
                    <div class="work-head">
                        {{ $work->name }}
                    </div>
                    @if ($work->image)
                        <img src="{{ $work->getImagePath() }}" />
                    @endif
                    <div class="work-info" style="{{($work->image) ? 'display:none': ''}}">
                        {{ $work->description }}
                        {{ $work->description }}
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection
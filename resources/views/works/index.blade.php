@extends('app')

@section('content')

    <section class="works">
        <header>
            <h1><span>The</span>works</h1>
        </header>

        <div class="works-list">
            @foreach($works as $work)
                <article>
                    <div class="work-wrapper">
                        <div class="work-content">
                            @if ($work->image)
                                <img src="{{ $work->getFilePath() }}" />
                            @endif
                            <div class="work-info" style="{{($work->image) ? 'display:none': ''}}">
                                {{ $work->description }}
                                <br/><br/>/role/<br/><br/>
                                {{ $work->my_role }}
                                <br/><br/>
                                Go to {!! link_to($work->link, $work->name) !!}
                            </div>
                        </div>
                    </div>
                    <div class="work-head">
                        {{ $work->name }}
                    </div>

                </article>
            @endforeach
        </div>
    </section>
@endsection
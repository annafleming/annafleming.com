@extends('app')
@section('content')
    <article class="higher-block home-block">
        <div class="slogan-block home-inner">
            <div class="slogan">
                <div class="slogan-head">
                    <div class="sl-ln1"><em>Front</em></div>
                    <div class="sl-ln2"><div class="p1">to </div><div class="p2"><em>back</em></div></div>
                </div>
                <div class="slogan-text">
                    from php to palm,<br>an old-school jack of<br>trades is an unrivaled asset.
                </div>
            </div>
            <img class="banner" src="/images/cards.svg" alt="Cards"/>
        </div>
    </article>

    <article class="lower-block home-block">
        <div class="about-me home-inner">
            <div class="about-me-head">
                <h2>
                    <span>I'm a</span>
                    <span>web developer</span>
                    <span>from Russia</span>
                </h2>
                <div class="about-me-map">
                    <img src="/images/map.svg" alt="Map"/>
                </div>
            </div>
            <div class="about-me-block">
                <div class="about-me-text">
                    <img src="{{ $configs['my-photo'] }}" alt="My photo"/>
                    <h3>{!! $configs['about-me-head'] !!}</h3>
                    <p>
                        {!! $configs['about-me-body'] !!}</p>
                </div>
            </div>
        </div>
    </article>
@endsection
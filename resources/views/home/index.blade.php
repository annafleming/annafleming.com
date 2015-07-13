@extends('app')
@section('content')
    <article class="slogan-block">
        <div class="slogan">
            <div class="slogan-head">
                <div class="sl-ln1"><em>Front</em></div>
                <div class="sl-ln2"><div class="p1">to </div><div class="p2"><em>back</em></div></div>
            </div>
            <div class="slogan-text">
                from php to palm,<br>an old-school jack of<br>trades is an unrivaled asset.
            </div>

        </div>
        <div class="banner">
            <img src="/images/cards.png" alt="Cards"/>
        </div>
    </article>
    <aside class="about-me">
        <div class="about-me-head">
            <h2>
                <span>I'm a</span>
                <span>web developer</span>
                <span>from Russia</span>
            </h2>
            <div class="about-me-map">
                <img src="/images/map.png" alt="Map"/>
            </div>
        </div>
        <div class="about-me-block">
            <div class="about-me-photo">
                <img src="/images/my-photo.png" alt="My photo"/>
            </div>
            <div class="about-me-text">
                <h3>Proin gravida nibh vel velit</h3>
                <p>
                    auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Duis sed odio sit amet nibh vulputate cursus.
                </p>
            </div>
        </div>
    </aside>
@endsection
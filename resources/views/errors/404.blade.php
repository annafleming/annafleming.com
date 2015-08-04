@extends('app')

@section('content')
    <div class="error404-block">
        <h1>That’s not going<br/>to work.</h1>
        <div class="error-body">
            <div class="message">
                <p>This webpage doesn’t exist.</p>
                <p><a href="/">Fly home</a></p>
            </div>
            <img src="/images/birds.svg" alt="Birds"/>
        </div>

    </div>
@endsection('content')
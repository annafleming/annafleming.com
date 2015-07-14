@extends('app')

@section('content')
    <section class="contact">
        <header>
            <h1><span>Let's</span>talk</h1>
        </header>
        {!! Form::open(['method' => 'POST', 'action' => 'ContactController@store']) !!}
        <div class="contact-body">
            <h2><span>Make</span> your calling card</h2>
            <div class="contact-form">

                <div class="form-block email-block">
                    <div class="form-block-inside">
                        <label for="email">E<span>mail</span></label>
                        {!! Form::email('email', null, ['placeholder' => 'theDude@email.com']) !!}
                        <label class="upsidedown" for="email">E<span>mail</span></label>
                    </div>
                </div>
                <div class="form-block subject-block">
                    <div class="form-block-inside">
                        <label for="subject">S<span>ubject</span></label>
                        {!! Form::text('subject', null, ['placeholder' => 'You’re magical']) !!}
                        <label class="upsidedown" for="subject">S<span>ubject</span></label>
                    </div>
                </div>
                <div class="form-block message-block">
                    <div class="form-block-inside">
                        <label for="message">M<span>essage</span></label>
                        {!! Form::textarea('message', null, ['placeholder' => 'What do you have to say?']) !!}
                        <label class="upsidedown" for="message">M<span>essage</span></label>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection
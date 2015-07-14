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
                    <label for="email">E<span>mail</span></label>
                    {!! Form::email('email', null, ['placeholder' => 'theDude@email.com']) !!}
                </div>
                <div class="form-block subject-block">
                    <label for="subject">S<span>ubject</span></label>
                    {!! Form::text('subject', null, ['placeholder' => 'You’re magical']) !!}
                </div>
                <div class="form-block message-block">
                    <label for="message">M<span>essage</span></label>
                    {!! Form::textarea('message', null, ['placeholder' => 'What do you have to say?']) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection
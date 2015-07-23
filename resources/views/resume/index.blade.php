@extends('app')

@section('content')
    <section class="resume">
        <header>
            <div class="image-block">
                <img src="/images/chips.png" alt="Chips"/>
            </div>
            <div class="header-block">
                <h1>
                    <span>The</span>
                    <span>full</span>
                    <span>stack</span>
                </h1>
            </div>
        </header>
        <div id="charData">{{ $practicalSkills }}</div>
        <div class="chart-container">
            <canvas></canvas>
        </div>
        <div class="resume-body">
            <div class="v-line"></div>
            <div class="skills-block left">
                @if (!empty($categories['left']))
                    @include('resume.partials.skillList', ['categories' => $categories['left']])
                @endif
            </div>
            <div class="skills-block right">
                @if (!empty($categories['right']))
                    @include('resume.partials.skillList', ['categories' => $categories['right']])
                @endif
            </div>
        </div>
    </section>
@endsection
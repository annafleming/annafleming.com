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
            <h2>SKILLS</h2>
        </div>
        <div class="resume-body">
            <div class="v-line"></div>
            <div class="skills-block left">
                @if ($block = array_shift($categories))
                    @include('resume.partials.skillList', ['categories' => $block])
                @endif
            </div>
            <div class="skills-block right">
                @if ($block = array_shift($categories))
                    @include('resume.partials.skillList', ['categories' => $block])
                @endif
            </div>
        </div>
        <div class="currently-learning-head">
            <span>currently learning</span>
        </div>
        <div class="currently-learning-block">
            <div class="v-line"></div>
            <div class="image-block">
                <img src="/images/book.png" alt="Book"/>

                <div class="book-cover">{!! $configs['currently-learning'] !!}</div>
            </div>

        </div>
        <div class="lower-block">
            @if (!empty($records))
                <div class="work-history">
                    <div class="v-line"></div>
                    @foreach($records as $key => $record)
                        <div class="{{ ($key%2) ?  'left' : 'right'}} timeline-block {{ ($record->special) ? 'special' : '' }}">
                            <div class="inner" style="height: {{ $record->getFullLength() }}em;">
                                <div class="arrow"></div>
                                <div class="inner-content">
                                    <h4>{{ $record->name }}</h4>

                                    <p class="timeline-desc">
                                        {{ $record->description }}
                                    </p>

                                    <p class="timeline-date">{{ $record->period }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="languages">
                <h3>languages</h3>

                <div class="language-list">
                    @if (!empty($languages))
                        @foreach($languages as $language)
                            <div class="language-block">
                                <img src="{{ $language->getFilePath() }}" alt="{{$language->name}}"/>
                                <h4>{{$language->name}}</h4>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            @if ($configs['resume'])
                <div class="download-block">
                    <h3>Download</h3>

                    <p>FOR SCANNING PRoGRAMS</p>

                    <p>AND THOSE WITH SIMPLER TASTES:</p>
                    <a href="/cv/download"><img src="/images/docIcon.svg" alt="Document icon"/></a>
                </div>
            @endif
        </div>
    </section>
@endsection
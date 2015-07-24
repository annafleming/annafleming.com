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
        <div class="currently-learning-head">
            <span>currently learning</span>
        </div>
        <div class="currently-learning-block">
            <div class="v-line"></div>
            <div class="image-block">
                <img src="/images/book.png" alt="Book"/>

                <div class="book-cover">DATA <br/>Analytics <br/>+ <br/>PYTHON</div>
            </div>

        </div>
        <div class="lower-block">
            <div class="work-history">
                <div class="v-line"></div>
                <div class="right timeline-block">
                    <div class="inner" style="height: 15em;">
                        <div class="arrow"></div>
                        <div class="inner-content">
                            <h4>Penza State University</h4>

                            <p class="timeline-desc">
                                Bachelors of Computer Science in
                                Economics, with Honors
                            </p>

                            <p class="timeline-date">2008-2012</p>
                        </div>
                    </div>
                </div>
                <div class="left timeline-block">
                    <div class="inner" style="height: 6em;">
                        <div class="arrow"></div>
                        <div class="inner-content">
                            <h4>Plus One</h4>

                            <p class="timeline-desc">
                                Full Stack Developer
                            </p>

                            <p class="timeline-date">late 2014 - early 2015</p>
                        </div>
                    </div>
                </div>
                <div class="right timeline-block special">
                    <div class="inner" style="height: 3em;">
                        <div class="arrow"></div>
                        <div class="inner-content">
                            <h4>Moved to US</h4>

                            <p class="timeline-desc">
                                Mild culture shock
                            </p>

                            <p class="timeline-date">late 2014 - early 2015</p>
                        </div>
                    </div>
                </div>
                <div class="left timeline-block">
                    <div class="inner" style="height: 3em;">
                        <div class="arrow"></div>
                        <div class="inner-content">
                            <h4>Rix Consulting</h4>

                            <p class="timeline-desc">
                                Web Auditing
                            </p>

                            <p class="timeline-date">mid 2015 - Currently</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="languages">
                <h3>languages</h3>
                <div class="language-list">
                    <div class="language-block">
                        <img src="images/english.png" alt="English"/>
                        <h4>English</h4>
                    </div>
                    <div class="language-block">
                        <img src="images/russian.png" alt="Russian"/>
                        <h4>Russian</h4>
                    </div>
                    <div class="language-block">
                        <img src="images/spanish.png" alt="Spanish"/>
                        <h4>Spanish</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
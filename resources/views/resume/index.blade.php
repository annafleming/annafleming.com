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
        <div class="chart-container">
            <canvas height="680" width="680"></canvas>
        </div>
        <div class="resume-body">
            <div class="v-line"></div>
        </div>
    </section>
@endsection
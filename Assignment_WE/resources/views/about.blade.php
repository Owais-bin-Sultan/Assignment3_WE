@extends('app')

@section('title', 'About Bryant Rothmoore Photography')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}?v={{ time() }}">
@endsection
@section('content')
<div class="container">
    <h1>About Bryant Rothmoore</h1>
    <div class="about">
        <img src="{{ asset('images/photographer.jpg') }}" alt="Bryant's Pic">
        <div class="text">
            <p>Bryant Rothmoore is a seasoned portrait photographer who believes that every photograph tells a story.
                With an eye for detail and a heart for capturing life’s most meaningful moments, Bryant has spent
                years perfecting his craft in family and child portraits.
            </p>
            <p>Now, he's expanding his passion beyond family portraits to offer professional photography services
                to a broader audience.
            </p>
        </div>
    </div>

    <div class="quote autoShow">
        "I’ve always believed that the best pictures aren’t just seen – they’re felt."
    </div>

    <div class="about-info">
        <div class="info">
            <h1 class="autoShow">Client-Focused Approach</h1>
            <p class="autoShow">"For me, it’s about building trust with my clients so that their true selves shine
                through in every shot."</p>
        </div>
        <div class="info"></div>
        <div class="info"></div>
        <div class="info">
            <h1 class="autoShow">Award-Winning Expertise</h1>
            <p class="autoShow">Bryant’s work has earned him recognition at the Heartfelt Photography Awards, where
                he was named Best Family Photographer for his natural, heartfelt images.</p>
        </div>
        <div class="info">
            <h1 class="autoShow">Professional Portfolio</h1>
            <p class="autoShow">From intimate family portraits to large-scale corporate shoots, Bryant’s versatile
                portfolio showcases his talent for capturing both personal and professional moments with equal
                finesse.
            </p>
        </div>
        <div class="info"></div>
        <div class="info"></div>
        <div class="info">
            <h1 class="autoShow">Workshops and Mentoring</h1>
            <p class="autoShow">Bryant is also a dedicated mentor, sharing his photography techniques in sold-out
                workshops across major cities. His "Capture the Moment" series continues to inspire new talent.
            </p>
        </div>
    </div>
</div>
@endsection
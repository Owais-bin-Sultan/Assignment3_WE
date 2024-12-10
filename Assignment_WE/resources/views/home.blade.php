@extends('app')

@section('title', 'Bryant Rothmoore Studios - Home')

@section('content')
<div class="caption">
    <iframe class="home-animation" src="{{ asset('animations/home_animation.html') }}" frameborder="0"></iframe>
</div>

<div class="testimonials">
    <iframe src="{{ asset('animations/background_animation.html') }}" frameborder="0"></iframe>
    <h2>Testimonials</h2>

    <div class="buttons-container">
        <button id="changeTextStyle" class="button">Change Text Style</button>
        <button id="resetTextStyle" class="button">Reset Text Style</button>
    </div>

    <div class="testimonials-container">
        @foreach ($testimonials as $testimonial)
        <div class="card">
            <div class="image"
                style="background-image: url('{{ asset('images/' . $testimonial['image']) }}');">

            </div>
            <div class="text-container">
                <div class="text">
                    "{{ $testimonial['text'] }}"
                </div>
                <div class="name">— {{ $testimonial['name'] }}</div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/home.js') }}" defer></script>
@endsection
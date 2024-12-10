@extends('app')

@section('title', 'Contact Us')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
<section class="contact-section">
    <h1>Contact Us</h1>
    <p>For any queries or suggestions, feel free to reach out to us!</p>

    <form class="contact-form" id="contact-form" action="#" method="post" onsubmit="return validateForm(event)">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required placeholder="Name">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required placeholder="Email Address">
        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5" required placeholder="Type Your Message"></textarea>
        <button type="submit">Submit</button>
    </form>
    <div id="form-message"></div>
    <div class="social-media-link">
        <p>Feel free to contact us via our Instagram page!</p>
        <a target="_blank" href="https://www.instagram.com/igf_jacob_z/profilecard/?igsh=Z3Jubm52d3oxNTJr">
            @BryantRothmooreStudios
        </a>
    </div>
</section>
@endsection
@section('scripts')
<script src="{{ asset('js/contact.js') }}" defer></script>
@endsection
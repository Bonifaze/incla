@extends('layouts.student')

<style>
html, body {
    margin: 0;
    padding: 0;
    height: 100%;
}
iframe {
    display: block;
    height: 100vh;
    width: 100%;
    border: none;
}
</style>

@section('content')
    <div class="content-wrapper bg-white mr-3">
    <h2>Live Chat Support</h2>
    <p>Use the chat interface below to talk with support.</p>

    <div style="height: 600px; width: 100%; max-width: 100%; margin-top: 20px;">
        <iframe 
            src="https://tawk.to/chat/686944bc04b12e1910c3e53a/1ivdj90hj" 
            style="width: 100%; height: 100%; border: none;" 
            allow="microphone; camera">
        </iframe>
    </div>
</div>
@endsection
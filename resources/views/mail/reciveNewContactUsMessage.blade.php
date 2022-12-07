@extends('mail.app')

@section('content')
    <div id="main-div">
        <div class="custom-div-text-center">
            <h3>HI, You have new message from {{ $name }} with email {{ $email }}.</h3>
            <h4>The text of the message is as follows:</h4>
            <p>{{ $body }}</p>
        </div>
    </div>
@endsection

@extends('blog.index')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="form-header blue accent-1">
            <h3 class="mt-2"><i class="fas fa-envelope"></i> Write to us:</h3>
        </div>
        <p class="dark-grey-text">We'll write rarely, but only the best content.</p>
        <div class="md-form">
            <i class="fas fa-user prefix grey-text"></i>
            <input type="text" id="form-name" class="form-control">
            <label for="form-name">Your name</label>
        </div>
        <div class="md-form">
            <i class="fas fa-envelope prefix grey-text"></i>
            <input type="text" id="form-email" class="form-control">
            <label for="form-email">Your email</label>
        </div>
        <div class="md-form">
            <i class="fas fa-tag prefix grey-text"></i>
            <input type="text" id="form-Subject" class="form-control">
            <label for="form-Subject">Subject</label>
        </div>
        <div class="md-form">
            <i class="fas fa-pencil-alt prefix grey-text"></i>
            <textarea id="form-text" class="form-control md-textarea" rows="3"></textarea>
            <label for="form-text">Send message</label>
        </div>
        <div class="text-center">
            <button class="btn btn-light-blue">Submit</button>
        </div>
    </div>
</div>
@endsection

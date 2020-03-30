@extends('blog.index')
@section('content')
    @foreach($post as $posts)
        <div class="card mb-5">
            <div class="view overlay">
                <img class="card-img-top" src="{{ asset($posts->pic) }}" alt="Card image cap">
                <a>
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>
            <a class="btn-floating btn-action ml-auto mr-4 mdb-color lighten-3"><i
                    class="fas fa-chevron-right pl-1"></i></a>
            <div class="card-body">
                <h4 class="card-title"> {{ $posts->title }}</h4>
                <hr>
                <p class="card-text">
                    {{ $posts->short_description }}
                </p>
            </div>
            <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                <ul class="list-unstyled list-inline font-small">
                    <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="far fa-comments pr-1"></i> {{ count($posts->comment) }}</a></li>
                    <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="far fa-user pr-1"></i> {{ $posts->user->name }}</a></li>
                    <li class="list-inline-item pr-2 white-text"><i class="far fa-clock pr-1"></i> {{ $posts->created_at }} </li>

                </ul>
            </div>
        </div>
    @endforeach
@endsection

@extends('devblog.index')
@section('content')
    <div class="row">


        <div class="sub-title">
            <h2>My Blog</h2>
            <a href="contact.html"><i class="icon-envelope"></i></a>
        </div>


        <div class="col-md-12 content-page">

            @foreach($post as $posts)
                <div class="col-md-12 blog-post">
                    <div class="post-title">
                        <a href="single.html"><h1> {{ $posts->title }}</h1></a>
                    </div>
                    <div class="post-info">
                        <span>{{ $posts->created_at }} / by <a href="#" target="_blank">Alex Parker</a></span>
                    </div>
                    <div class="post-content">
                        <p> {!! $posts->short_description !!}</p>
                    </div>
                      <a href="{{ route('post', ['id' => $posts->id]) }}" class="button button-style button-anim fa fa-long-arrow-right"><span>Read More</span></a>
                </div>
            @endforeach

            <div class="col-md-12 text-center">
                <a href="javascript:void(0)" id="load-more-post" class="load-more-button">Load</a>
                <div id="post-end-message"></div>
            </div>

        </div>

    </div>
@endsection

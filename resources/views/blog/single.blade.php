@extends('blog.index');
@section('content')

<img class="img-fluid rounded" src=" {{ asset($post->pic) }}"/>
<div class="mt-3">
    <div class="mt-4 mb-5 d-flex justify-content-start">
        <i style="color: cadetblue" class="fa fa-user"> {{ $post->user->name }}</i>
        <i style="color: mediumaquamarine" class="pr-3 fa fa-clock"> {{ $post->created_at }}</i>
        <i style="color: mediumaquamarine" class="pr-3 fa fa-comment"> {{ count($post->comment) }}</i>
        <a href="#"> <i style="color: tomato" class="pr-3 fa fa-thumbs-up"> 0 </i> </a>
    </div>

</div>
<div style="text-align: right">
    {!! $post->long_description !!}
</div>
<section>
    <div class="comments-list text-center text-md-right">
        <div class="text-center my-5">
            <h3 class="font-weight-bold">Comments
                <span class="badge indigo">{{ count($post->comment) }}</span>
            </h3>
        </div>
        @foreach($comment as $comments)
        <div class="row mb-5 border pt-3">
            <div class="col-sm-2 col-12 mb-3">
                <img src="{{ asset($comments->user->pic) }}"
                     class="avatar rounded-circle z-depth-1-half" alt="sample image">
            </div>
            <div class="col-sm-10 col-12">
                <a>
                    <h5 class="user-name font-weight-bold">{{ $comments->user->name }}</h5>
                </a>
                <div class="card-data">
                    <ul class="list-unstyled">
                        <li class="comment-date font-small">
                            <i class="far fa-clock-o"></i> {{ $comments->created_at }} </li>
                    </ul>
                </div>
                <p class="dark-grey-text article">
                    {{ $comments->comment }}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</section>
<section class="mb-4 wow fadeIn" data-wow-delay="0.2s">
    <h3 class="font-weight-bold text-center my-5">Leave a reply</h3>
    <div class="row">
        <div class="col-lg-6 col-md-12 mb-6">
            <div class="input-group md-form form-sm form-3 pl-0">
                <div class="input-group-prepend">
                    <span class="input-group-text white black-text" id="basic-addon8">1</span>
                </div>
                <input type="text" class="form-control mt-0 black-border rgba-white-strong"
                       placeholder="Name" aria-describedby="basic-addon9">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 mb-6">
            <div class="input-group md-form form-sm form-3 pl-0">
                <div class="input-group-prepend">
                    <span class="input-group-text white black-text" id="basic-addon9">2</span>
                </div>
                <input type="text" class="form-control mt-0 black-border rgba-white-strong"
                       placeholder="Email" aria-describedby="basic-addon9">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-1">
            <div class="form-group basic-textarea rounded-corners">
                <textarea class="form-control" id="exampleFormControlTextarea6" rows="5"
                      placeholder="Write something here..."></textarea>
            </div>
            <div class="text-right">
                <button class="btn btn-grey btn-sm">Submit</button>
            </div>
        </div>
    </div>

</section>
@endsection

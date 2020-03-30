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
                <span class="d-flex justify-content-sm-end">
                    <a href="#" onclick="commentReply()"> <i class="fa fa-reply"></i> </a>
                </span>
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
    <form id="comment-form" class="">
        <div class="col-12 mt-1">
            <div class="form-group basic-textarea rounded-corners">
                <input type="hidden"  name="post_id" value="{{ $post->id }}"/>
                <textarea class="form-control" id="exampleFormControlTextarea6" name="comment" rows="5"
                      placeholder="Write something here..."></textarea>
            </div>
            <div class="text-right">
                <button type="button" id="submit-comment" class="btn btn-grey btn-sm">Submit</button>
            </div>
        </div>
    </form>
</section>
@endsection

@section('script')
    <script src="{{ asset('src/plugin/toast/dist/toasted.js') }}"></script>
    <script>
        // const toasted = new Toasted({
        //     color: '#fafafa',
        //     position: "bottom-left",
        //     duration: 6000,
        // });
        // function commentReply(data) {
        //     console.log('u have been hacked sumibt');
        //     $('#comment-reply-form_'+data).css('display', 'block');
            {{--$('#comment_reply_id_'+data).val(data);--}}
            {{--$('#submit-comment_'+data).click(function(){--}}
            {{--    const toasted = new Toasted({--}}
            {{--        color: '#fafafa',--}}
            {{--        position: "bottom-left",--}}
            {{--        duration: 6000,--}}
            {{--    });--}}
            {{--    var comment = $('#comment-reply-form_'+data)[0];--}}
            {{--    var formData = new FormData(comment);--}}
            {{--    $.ajax({--}}
            {{--        url: " {{ route('postCommentReply') }}",--}}
            {{--        type: "POST",--}}
            {{--        data: formData,--}}
            {{--        processData: false,--}}
            {{--        contentType: false,--}}
            {{--        success: function(data){--}}
            {{--            toasted.success(data.message);--}}
            {{--        },--}}
            {{--        error: function(data){--}}
            {{--            toasted.error(data.responseJSON.message);--}}
            {{--        }--}}
            {{--    })--}}
            {{--})--}}
            {{--$('#cancel-comment_'+data).click(function(){--}}
            {{--    $('#comment-reply-form_'+data).css('display', 'none');--}}
            {{--})--}}
        // }

        $(function(){
            const toasted = new Toasted;
            $('#submit-comment').on('click', function(){
                var comment = $('#comment-form')[0];
                var formData = new FormData(comment);
                $.ajax({
                    url: " {{ route('postComment') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        toasted.success(data.message);
                    },
                    error: function(data){
                        toasted.error(data.responseJSON.message);
                    }
                })
            });
        });
    </script>
@endsection


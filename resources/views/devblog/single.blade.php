@extends('devblog.index')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('devblog/css/syntax/shCore.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('devblog/css/syntax/shThemeDefault.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('devblog/css/comment.css') }}">
    <link href="{{ asset('src/plugin/toast/dist/toasted.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('src/plugin/toast/src/sass/toast.scss') }}" rel="stylesheet"/>
    <link href="{{ asset('src/css/model.css') }}" rel="stylesheet"/>
    <style>
        .post-tag a{
            float:right;
            border:1px solid #dddddd;
            border-radius: 5px;
            background: #608B4E;
            color: white;
            margin-left: 3px;
            margin-right: 3px;
            padding: 5px 5px;
            cursor: pointer;
        }
        .post-tag a:hover{
            background: #0b2e13;
        }

    </style>
@endsection

@section('content')
{{--    <div class="row">--}}

        <div class="sub-title">
            <a href="{{ route('blog') }}" title="Go to Home Page"><h2>Back Home</h2></a>
            <a href="#comment" class="smoth-scroll"><i class="icon-bubbles"></i></a>
        </div>

        <div class="col-md-12 content-page">

            <div class="col-md-12 blog-post">
                <div class="post-tag">
                    @foreach(explode(',', $post->tags) as $tag)
                        <a href="#"> {{ $tag }} </a>
                    @endforeach
                </div>
                <div class="post-title">
                    <h1>{{ $post->title }}</h1>
                </div>

                <div class="post-info">
                    <span>{{ $post->created_at }} / by <a href="#" target="_blank">{{ $post->user_id }}</a></span>
                </div>

{{--                <div class="post-image margin-top-40 margin-bottom-40">--}}
{{--                    <img src="{{ asset($post->pic) }}" alt="">--}}
{{--                    <p>Image source from <a href="#" target="_blank">Link</a></p>--}}
{{--                </div>--}}
                <div class="post-content">
                     <p> {!! $post->long_description !!}</p>
                </div>
            </div>

        </div>

        <!-- Contenedor Principal -->
        <div class="comments-container">
            <ul id="comments-list" class="comments-list">
                <li>
                    @foreach($comment as $comments)
                    <div class="comment-main-level">
                        <!-- Avatar -->
                        <div class="comment-avatar"><img src="{{ $comments->user->pic }}" alt=""></div>
                        <!-- Contenedor del Comentario -->
                        <div class="comment-box">
                            <div class="comment-head">
                                <h6 class="comment-name by-author"><a href="#">{{ $comments->user->name }}</a></h6>
                                <span>{{ $comments->user->created_at }}</span>
                                <i id="comment-reply-button" onclick='hacker("{{ $comments->id }}")' class="fa fa-reply"></i>
                                <i class="fa fa-heart"></i>
                            </div>
                            <div class="comment-content">
                               {{ $comments->comment }}
                            </div>

                            <form class="comment-box-form" id="comment-reply-form_{{$comments->id}}">
                                <input type="hidden" name="comment_id" id="comment_reply_id_{{$comments->id}}" value=""/> `
                                <textarea name="comment_reply" id="comment" style="height: 25%; width: 100%;"></textarea>
                                <p></p>
                                <button id="submit-comment_{{$comments->id}}" type="button">Submit</button>
                                <button id="cancel-comment_{{$comments->id}}" type="button">Cancel</button>
                            </form>

                        </div>
                    </div>


                        @if($comments->commentReply->first())
                            @foreach($comments->commentReply as $reply)
                            <ul class="comments-list reply-list">
                                <li>
                                    <!-- Avatar -->
                                    <div class="comment-avatar"><img src="{{ $reply->user->pic }}" alt=""></div>
                                    <!-- Contenedor del Comentario -->
                                    <div class="comment-box">
                                        <div class="comment-head">
                                            <h6 class="comment-name"><a href="#">{{ $reply->user->name }}</a></h6>
                                            <span>{{ $reply->created_at }}</span>
                                            <i class="fa fa-reply"></i>
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="comment-content">
                                            {{ $reply->comment_reply }}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                    @endif
                    @endforeach
                    <!-- Respuestas de los comentarios -->
                </li>
            </ul>
            <p> submit your new comment : </p>
            <form id="comment-form">
                <textarea name="comment" id="comment" style="height: 25%; width: 100%;"></textarea>
                <p></p>
                <button id="submit-comment" type="button">Submit</button>
            </form>
        </div>
{{--    </div>--}}

@endsection

@section('custom')
    <!-- Endpage Box (Popup When Scroll Down) Start -->
    <div id="scroll-down-popup" class="endpage-box">
        <h4>Read Also</h4>
        <a href="#">How to make your company website based on bootstrap framework...</a>
    </div>
    <!-- Endpage Box (Popup When Scroll Down) End -->
@endsection
@section('script')
    <script src="{{ asset('src/plugin/toast/dist/toasted.js') }}"></script>
    <link href="{{ asset('src/css/model.css') }}" rel="stylesheet"/>
    <script>
        const toasted = new Toasted({
            color: '#fafafa',
            position: "bottom-left",
            duration: 6000,
        });
        function hacker(data) {
            $('#comment-reply-form_'+data).css('display', 'block');
            $('#comment_reply_id_'+data).val(data);
            $('#submit-comment_'+data).click(function(){
                const toasted = new Toasted({
                color: '#fafafa',
                position: "bottom-left",
                duration: 6000,
                });
                var comment = $('#comment-reply-form_'+data)[0];
                var formData = new FormData(comment);
                $.ajax({
                    url: " {{ route('postCommentReply') }}",
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
            })
            $('#cancel-comment_'+data).click(function(){
                $('#comment-reply-form_'+data).css('display', 'none');
            })
        }

        $(function(){
            $('#submit-comment').click(function(){
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
        {{--    // add reply textarea--}}

        {{--})--}}
    </script>
{{--<script type="text/javascript" src="{{ asset('devblog/js/syntax/shCore.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('devblog/js/syntax/shBrushCss.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('devblog/js/syntax/shBrushJScript.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('devblog/js/syntax/shBrushPerl.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('devblog/js/syntax/shBrushPhp.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('devblog/js/syntax/shBrushPlain.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('devblog/js/syntax/shBrushPython.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('devblog/js/syntax/shBrushRuby.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('devblog/js/syntax/shBrushSql.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('devblog/js/syntax/shBrushVb.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('devblog/js/syntax/shBrushXml.js') }}"></script>--}}

<!-- Syntax Highlighter Call Function -->
<script type="text/javascript">
    SyntaxHighlighter.config.clipboardSwf ="{{ asset('js/syntax/clipboard.swf') }}";
    SyntaxHighlighter.all();
</script>
@endsection
</body>
</html>

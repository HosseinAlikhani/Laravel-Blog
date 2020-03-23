@extends('devblog.index')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('devblog/css/syntax/shCore.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('devblog/css/syntax/shThemeDefault.css') }}">
@endsection
@section('content')
    <div class="row">

        <div class="sub-title">
            <a href="{{ route('blog') }}" title="Go to Home Page"><h2>Back Home</h2></a>
            <a href="#comment" class="smoth-scroll"><i class="icon-bubbles"></i></a>
        </div>

        <div class="col-md-12 content-page">
            <div class="col-md-12 blog-post">

                <div class="post-title">
                    <h1>{{ $post->title }}</h1>
                </div>
                <div class="post-info">
                    <span>{{ $post->created_at }} / by <a href="#" target="_blank">{{ $post->user_id }}</a></span>
                </div>

                <div class="post-image margin-top-40 margin-bottom-40">
                    <img src="{{ asset($post->pic) }}" alt="">
{{--                    <p>Image source from <a href="#" target="_blank">Link</a></p>--}}
                </div>

                <div class="post-content">
                     <p> {!! $post->long_description !!}</p>
                </div>

            </div>
        </div>

        <!-- Contenedor Principal -->
        <div class="comments-container">
            <ul id="comments-list" class="comments-list">
                <li>
                    <div class="comment-main-level">
                        <!-- Avatar -->
                        <div class="comment-avatar"><img src="{{ asset('/storage/user/avatar.png') }}" alt=""></div>
                        <!-- Contenedor del Comentario -->
                        <div class="comment-box">
                            <div class="comment-head">
                                <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">Agustin Ortiz</a></h6>
                                <span>hace 20 minutos</span>
                                <i class="fa fa-reply"></i>
                                <i class="fa fa-heart"></i>
                            </div>
                            <div class="comment-content">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                            </div>
                        </div>
                    </div>
                    <!-- Respuestas de los comentarios -->
                    <ul class="comments-list reply-list">
                        <li>
                            <!-- Avatar -->
                            <div class="comment-avatar"><img src="{{ asset('/storage/user/avatar.png') }}" alt=""></div>
                            <!-- Contenedor del Comentario -->
                            <div class="comment-box">
                                <div class="comment-head">
                                    <h6 class="comment-name"><a href="http://creaticode.com/blog">Lorena Rojero</a></h6>
                                    <span>hace 10 minutos</span>
                                    <i class="fa fa-reply"></i>
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="comment-content">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                </div>
                            </div>
                        </li>

                        <li>
                            <!-- Avatar -->
                            <div class="comment-avatar"><img src="{{ asset('/storage/user/avatar.png') }}" alt=""></div>
                            <!-- Contenedor del Comentario -->
                            <div class="comment-box">
                                <div class="comment-head">
                                    <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">Agustin Ortiz</a></h6>
                                    <span>hace 10 minutos</span>
                                    <i class="fa fa-reply"></i>
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="comment-content">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

                <li>
                    <div class="comment-main-level">
                        <!-- Avatar -->
                        <div class="comment-avatar"><img src="{{ asset('/storage/user/avatar.png') }}" alt=""></div>
                        <!-- Contenedor del Comentario -->
                        <div class="comment-box">
                            <div class="comment-head">
                                <h6 class="comment-name"><a href="http://creaticode.com/blog">Lorena Rojero</a></h6>
                                <span>hace 10 minutos</span>
                                <i class="fa fa-reply"></i>
                                <i class="fa fa-heart"></i>
                            </div>
                            <div class="comment-content">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

{{--        <div class="col-md-12 content-page">--}}
{{--            <div class="col-md-12 blog-post">--}}
{{--                <!-- Post Headline Start -->--}}
{{--                <div class="post-title">--}}
{{--                    <h1>How to make your company website based on bootstrap framework on localhost?</h1>--}}
{{--                </div>--}}
{{--                <!-- Post Detail Start -->--}}
{{--                <div class="post-info">--}}
{{--                    <span>November 23, 2016 / by <a href="#" target="_blank">Alex Parker</a></span>--}}
{{--                </div>--}}
{{--                <!-- Post Image Start -->--}}
{{--                <div class="post-image margin-top-40 margin-bottom-40">--}}
{{--                    <img src="{{ asset('devblog/images/blog/1.jpg') }}" alt="">--}}
{{--                    <p>Image source from <a href="#" target="_blank">Link</a></p>--}}
{{--                </div>--}}
{{--                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at quam at orci commodo hendrerit vitae nec eros. Vestibulum neque est, imperdiet nec tortor nec, tempor semper metus. Cras vel tempus velit, et accumsan nisi. Duis laoreet pretium ultricies. Curabitur rhoncus auctor nunc congue sodale Sed posuere nisi ipsum.</p>--}}
{{--                <!-- Post Video Tutorial Start -->--}}
{{--                <div class="video-box margin-top-40 margin-bottom-40">--}}
{{--                    <div class="video-tutorial">--}}
{{--                        <a class="video-popup" href="https://www.youtube.com/watch?v=O2Bsw3lrhvs" title="Video Tutorial">--}}
{{--                            <img src="{{ asset('devblog/images/blog/4.jpg') }}" alt="">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <p>Integrate video on magnific popup for fast page load.</p>--}}
{{--                </div>--}}
{{--                <!-- Post Video Tutorial End -->--}}



{{--                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at quam at orci commodo hendrerit vitae nec eros. Vestibulum neque est, imperdiet nec tortor nec, tempor semper metus. Cras vel tempus velit, et accumsan nisi. Duis laoreet pretium ultricies. Curabitur rhoncus auctor nunc congue sodale Sed posuere nisi ipsum.</p>--}}



{{--                <!-- Post Blockquote Start -->--}}
{{--                <div class="post-quote margin-top-40 margin-bottom-40">--}}
{{--                    <blockquote>Design is not just what is look like, Design is how it's work.</blockquote>--}}
{{--                </div>--}}
{{--                <!-- Post Blockquote End -->--}}



{{--                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at quam at orci commodo hendrerit vitae nec eros. Vestibulum neque est, imperdiet nec tortor nec, tempor semper metus. Cras vel tempus velit, et accumsan nisi. Duis laoreet pretium ultricies. Curabitur rhoncus auctor nunc congue sodale Sed posuere nisi ipsum.</p>--}}



{{--                <!-- Post Coding (SyntaxHighlighter) Start -->--}}
{{--                <div class="margin-top-40 margin-bottom-40">--}}
{{--                                   <pre class="brush: js">--}}
{{--                                   /* Smooth Scroll */--}}

{{--                                    $('a.smoth-scroll').on("click", function (e) {--}}
{{--                                      var anchor = $(this);--}}
{{--                                      $('html, body').stop().animate({--}}
{{--                                      scrollTop: $(anchor.attr('href')).offset().top - 50--}}
{{--                                      }, 1000);--}}
{{--                                      e.preventDefault();--}}
{{--                                     });--}}

{{--                                   /* Scroll To Top */--}}

{{--                                   $(window).scroll(function(){--}}
{{--                                     if ($(this).scrollTop() >= 500) {--}}
{{--                                     $('.scroll-to-top').fadeIn();--}}
{{--                                     } else {--}}
{{--                                     $('.scroll-to-top').fadeOut();--}}
{{--                                     }--}}
{{--                                     });--}}

{{--	                               $('.scroll-to-top').click(function(){--}}
{{--                                   $('html, body').animate({scrollTop : 0},800);--}}
{{--                                   return false;--}}
{{--                                    });--}}
{{--                                  </pre>--}}
{{--                </div>--}}
{{--                <!-- Post Coding (SyntaxHighlighter) End -->--}}



{{--                <div class="post-title">--}}
{{--                    <h2>How to implement?</h2>--}}
{{--                </div>--}}


{{--                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at quam at orci commodo hendrerit vitae nec eros. Vestibulum neque est, imperdiet nec tortor nec, tempor semper metus. Cras vel tempus velit, et accumsan nisi. Duis laoreet pretium ultricies. Curabitur rhoncus auctor nunc congue sodale Sed posuere nisi ipsum.</p>--}}




{{--                <!-- Post Image Gallery Start -->--}}
{{--                <div class="row margin-top-40 margin-bottom-40">--}}

{{--                    <div class="col-md-4 col-sm-6 col-xs-12">--}}
{{--                        <a href="{{ asset('devblog/images/blog/7.jpg') }}" class="image-popup" title="image Title">--}}
{{--                            <img src="{{ asset('devblog/images/blog/7.jpg') }}" class="img-responsive" alt="">--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <div class="col-md-4 col-sm-6 col-xs-12">--}}
{{--                        <a href="{{ asset('devblog/images/blog/5.jpg') }}" class="image-popup" title="image Title">--}}
{{--                            <img src="{{ asset('devblog/images/blog/5.jpg') }}" class="img-responsive" alt="">--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <div class="col-md-4 col-sm-6 col-xs-12">--}}
{{--                        <a href="{{ asset('devblog/images/blog/6.jpg') }}" class="image-popup" title="image Title">--}}
{{--                            <img src="{{ asset('devblog/images/blog/6.jpg') }}" class="img-responsive" alt="">--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <!-- Post Image Gallery End -->--}}



{{--                <div class="post-title">--}}
{{--                    <h2>Make it more awesome</h2>--}}
{{--                </div>--}}


{{--                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at quam at orci commodo hendrerit vitae nec eros. Vestibulum neque est.</p>--}}



{{--                <!-- Post Blockquote (Italic Style) Start -->--}}
{{--                <blockquote class="margin-top-40 margin-bottom-40">--}}
{{--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at quam at orci commodo hendrerit vitae nec eros. Vestibulum neque est, imperdiet nec tortor nec, tempor semper metus. Cras vel tempus velit, <b>et accumsan nisi</b>. Duis laoreet pretium ultricies. Curabitur rhoncus auctor nunc congue sodale Sed posuere nisi ipsum.</p>--}}
{{--                </blockquote>--}}
{{--                <!-- Post Blockquote (Italic Style) End -->--}}




{{--                <div class="post-title">--}}
{{--                    <h2>Learn to check all the features</h2>--}}
{{--                </div>--}}


{{--                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at quam at orci commodo hendrerit vitae nec eros. Vestibulum neque est.</p>--}}



{{--                <!-- Post List Style Start -->--}}
{{--                <div class="list">--}}
{{--                    <ul>--}}
{{--                        <li>Ready to use Blog Template</li>--}}
{{--                        <li>It have all the necessary features which you need to run blog</li>--}}
{{--                        <li>Neat and Clean Typography</li>--}}
{{--                        <li>Speed Optimization</li>--}}
{{--                    </ul>--}}
{{--                </div>--}}


{{--                <div class="list list-style margin-top-40">--}}
{{--                    <ul>--}}
{{--                        <li>Ready to use Blog Template</li>--}}
{{--                        <li>It have all the necessary features which you need to run blog</li>--}}
{{--                        <li>Neat and Clean Typography</li>--}}
{{--                        <li>Speed Optimization</li>--}}
{{--                    </ul>--}}
{{--                </div>--}}


{{--                <div class="list list-style-2 margin-top-40">--}}
{{--                    <ul>--}}
{{--                        <li>Ready to use Blog Template</li>--}}
{{--                        <li>It have all the necessary features which you need to run blog</li>--}}
{{--                        <li>Neat and Clean Typography</li>--}}
{{--                        <li>Speed Optimization</li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <!-- Post List Style End -->--}}




{{--                <!-- Post Author Bio Box Start -->--}}
{{--                <div class="about-author margin-top-70 margin-bottom-50">--}}

{{--                    <div class="picture">--}}
{{--                        <img src="{{ asset('devblog/images/blog/author.png') }}" class="img-responsive" alt="">--}}
{{--                    </div>--}}

{{--                    <div class="c-padding">--}}
{{--                        <h3>Article By <a href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Visit Alex Website">Alex Parker</a></h3>--}}
{{--                        <p>You can use about author box when someone guest post on your blog, Lorem ipsum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ad minim veniam.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Post Author Bio Box End -->--}}




{{--                <!-- You May Also Like Start -->--}}
{{--                <div class="you-may-also-like margin-top-50 margin-bottom-50">--}}
{{--                    <h3>You may also like</h3>--}}
{{--                    <div class="row">--}}

{{--                        <div class="col-md-4 col-sm-6 col-xs-12">--}}
{{--                            <a href="single.html"><p>Make mailchimp singup form working with ajax using jquery plugin</p></a>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-4 col-sm-6 col-xs-12">--}}
{{--                            <a href="single.html"><p>How to design elegant e-mail newsletter in html for wish christmas to your subscribers?</p></a>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-4 col-sm-6 col-xs-12">--}}
{{--                            <a href="single.html"><p>How to customize a wordpress theme entirely from scratch using a child theme?</p></a>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- You May Also Like End -->--}}




{{--                <!-- Post Comment (Disqus) Start -->--}}
{{--                <div id="comment" class="comment">--}}
{{--                    <h3>Discuss about post</h3>--}}


{{--                    <!-- Disqus Code Start  (Please Note: Disqus will not be load on local, You have to upload it on server.)-->--}}
{{--                    <div id="disqus_thread"></div>--}}
{{--                    <script>--}}

{{--                        /***  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS. LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables.--}}

{{--                         var disqus_config = function () {--}}
{{--							this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable--}}
{{--							this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable--}}
{{--							};--}}
{{--                         */--}}

{{--                        (function() { // DON'T EDIT BELOW THIS LINE--}}
{{--                            var d = document, s = d.createElement('script');--}}
{{--                            s.src = '//uipasta.disqus.com/embed.js';   // Please change the url from your own disqus id--}}
{{--                            s.setAttribute('data-timestamp', +new Date());--}}
{{--                            (d.head || d.body).appendChild(s);--}}
{{--                        })();--}}
{{--                    </script>--}}
{{--                    <noscript>Please enable JavaScript to view the <a href="{{ route('blog') }}">comments powered by Disqus.</a></noscript>--}}
{{--                    <!-- Disqus Code End -->--}}

{{--                </div>--}}
{{--                <!-- Post Comment (Disqus) End -->--}}



{{--            </div>--}}
{{--        </div>--}}

    </div>
@endsection

<!-- Syntax Highlighter Javascript File  -->
@section('custom')
    <!-- Endpage Box (Popup When Scroll Down) Start -->
    <div id="scroll-down-popup" class="endpage-box">
        <h4>Read Also</h4>
        <a href="#">How to make your company website based on bootstrap framework...</a>
    </div>
    <!-- Endpage Box (Popup When Scroll Down) End -->
@endsection
<script type="text/javascript" src="{{ asset('devblog/js/syntax/shCore.js') }}"></script>
<script type="text/javascript" src="{{ asset('devblog/js/syntax/shBrushCss.js') }}"></script>
<script type="text/javascript" src="{{ asset('devblog/js/syntax/shBrushJScript.js') }}"></script>
<script type="text/javascript" src="{{ asset('devblog/js/syntax/shBrushPerl.js') }}"></script>
<script type="text/javascript" src="{{ asset('devblog/js/syntax/shBrushPhp.js') }}"></script>
<script type="text/javascript" src="{{ asset('devblog/js/syntax/shBrushPlain.js') }}"></script>
<script type="text/javascript" src="{{ asset('devblog/js/syntax/shBrushPython.js') }}"></script>
<script type="text/javascript" src="{{ asset('devblog/js/syntax/shBrushRuby.js') }}"></script>
<script type="text/javascript" src="{{ asset('devblog/js/syntax/shBrushSql.js') }}"></script>
<script type="text/javascript" src="{{ asset('devblog/js/syntax/shBrushVb.js') }}"></script>
<script type="text/javascript" src="{{ asset('devblog/js/syntax/shBrushXml.js') }}"></script>

<!-- Syntax Highlighter Call Function -->
<script type="text/javascript">
    SyntaxHighlighter.config.clipboardSwf ="{{ asset('js/syntax/clipboard.swf') }}";
    SyntaxHighlighter.all();
</script>


</body>
</html>

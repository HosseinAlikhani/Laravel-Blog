<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tag -->
    <meta charset="UTF-8">
    <!-- SEO -->
    <meta name="description" content="personal website">
    <meta name="author" content="d3cr33">
    <meta name="url" content="http://www.d3cr33.com">
    <meta name="copyright" content="Copyright This site is owned by d3cr33">
    <meta name="robots" content="index,follow">
    <title> D3CR33 - Personal Blog Template</title>

    <!-- Main CSS Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('src/css/style.css') }}">

    <!-- Main Bootstrap -->
    <link href="{{ asset('src/mdb-blog/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('src/mdb-blog/css/mdb.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('src/fontawesome/css/all.css') }}" rel="stylesheet">

    <link href="{{ asset('panel2/plugin/toast/dist/toasted.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('panel2/plugin/toast/src/sass/toast.scss') }}" rel="stylesheet"/>
    @yield('css')
</head>


<body>

<div class="container pt-5">
    <div class="row">
        <div class="col-lg-9">
            <div class="blog-section">
                @yield('content')
            </div>
        </div>
        <div class="col-lg-3">
            <div class="alert alert-danger">
                hello fucking bitch
            </div>
        </div>
    </div>
</div>
<!-- JQuery -->
<script type="text/javascript" src="{{ asset('src/mdb-blog/js/jquery-3.4.1.min.js') }}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{ asset('src/mdb-blog/js/popper.min.js') }}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{ asset('src/mdb-blog/js/bootstrap.min.js') }}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{ asset('src/mdb-blog/js/mdb.min.js') }}"></script>
@yield('script')
</body>
</html>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>

<h4>
    hello bitch
</h4>
<div id="hacker">
    hacker are ready!!!
</div>
<script>
    $(function(){
        axios({
            url: 'http://sufia-panel.local/users/',
            method: 'get',
            success: function(data){
                console.log(data)
            },
            error: function(data){
                console.log(data)
            },
        });
        // $.ajax({
        //     url: 'http://sufia-panel.local/users',
        //     type: 'GET',
        //     success: function(data){
        //         console.log(data)
        //     },
        //     error: function(data){
        //         console.log(data)
        //     }
        // });
    });
</script>
</body>
</html>

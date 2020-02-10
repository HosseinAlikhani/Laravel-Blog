@extends('index')
@section('title', $title)
@section('content')

    <div class="container">
        <h2>Stacked form</h2>
{{--        <form id="ticket" enctype="multipart/form-data">--}}
{{--        <form id="ticket" enctype="multipart/form-data" method="post" action="{{ route('submit-request') }}">--}}
{{--            @csrf--}}
{{--            <div class="form-group">--}}
{{--                <label for="title">Title:</label>--}}
{{--                <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-6">--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="priority">department:</label>--}}
{{--                            <select class="form-control" name="department" id="department">--}}
{{--                                <option selected>Select</option>--}}
{{--                                <option value="technical">Technical</option>--}}
{{--                                <option value="financial">Financial</option>--}}
{{--                                <option value="support">Support</option>--}}
{{--                            </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-6">--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="priority">priority:</label>--}}
{{--                        <select class="form-control" name="priority" id="priority">--}}
{{--                            <option selected>Select</option>--}}
{{--                            <option value="high">high</option>--}}
{{--                            <option value="medium">medium</option>--}}
{{--                            <option value="low">low</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="description">description:</label>--}}
{{--                <textarea type="text" class="form-control" id="description" name="description">Enter Your Request </textarea>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="attachment">Attachment:</label>--}}
{{--                <input type="file" class="form-control-file border" id="attachment" name="attachment">--}}
{{--            </div>--}}
{{--            <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--        </form>--}}
        <form method="POST" enctype="multipart/form-data" id="myform">
            @csrf
            <input type="text" name="title"/><br/><br/>
            <input id="fileUploadForm" type="file" name="files"/><br/><br/>
            <input type="submit" value="Submit" id="btnSubmit"/>
        </form>
    </div>

@endsection

@section('script')
    <script>
        {{--$('form').submit(function(event){--}}
        {{--    event.preventDefault();--}}
        {{--    data = {--}}
        {{--        '_token': " {{ csrf_token() }}",--}}
        {{--        title: $(this).find('#title').val(),--}}
        {{--        priority: $(this).find('#priority').val(),--}}
        {{--        department: $(this).find('#department').val(),--}}
        {{--        description: $(this).find('#description').val(),--}}
        {{--        attachment: $(this).find('#attachment').val(),--}}
        {{--    };--}}
        {{--    // var data = $('input[name=attachment]')[0];--}}
        {{--    // var upload = new FormData(data);--}}
        {{--    // var data = new FormData($(this));--}}
        {{--    var data = new FormData(this[0]);--}}
        {{--    console.log(data);--}}
        {{--    $.ajax({--}}
        {{--        url: " {{ route('submit-request') }}",--}}
        {{--        type: "POST",--}}
        {{--        data: data--}}
        {{--    })--}}
        {{--    .done(function(){--}}
        {{--        console.log('submit oked');--}}
        {{--    });--}}
        {{--});--}}


        $(document).ready(function () {
            $("#btnSubmit").click(function (event) {
                //stop submit the form, we will post it manually.
                event.preventDefault();
                // Get form
                var form = {
                    img: $('#fileUploadForm')[0],
                    _token: " {{ csrf_token() }}",
                };
                console.log(form);
                $.ajax({
                    url: " {{ route('submit-request') }}",
                    type: "POST",
                    data: form
                })
                // Create an FormData object
                // var data = new FormData(form);
                // // If you want to add an extra field for the FormData
                // data.append("CustomField", "This is some extra data, testing");
                // // disabled the submit button
                // $("#btnSubmit").prop("disabled", true);
                // $.ajax({
                //     type: "POST",
                //     enctype: 'multipart/form-data',
                //     url: "/upload.php",
                //     data: data,
                //     processData: false,
                //     contentType: false,
                //     cache: false,
                //     timeout: 800000,
                //     success: function (data) {
                //         $("#output").text(data);
                //         console.log("SUCCESS : ", data);
                //         $("#btnSubmit").prop("disabled", false);
                //     },
                //     error: function (e) {
                //         $("#output").text(e.responseText);
                //         console.log("ERROR : ", e);
                //         $("#btnSubmit").prop("disabled", false);
                //     }
                // });
            });
        });
    </script>

@endsection

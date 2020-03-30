@extends('panel2.index')
@section('css')
    <link href="{{ asset('src/plugin/taginput/tagsinput.css') }}" rel="stylesheet"/>
    <script src="{{ asset('src/plugin/ckeditor/ckeditor.js') }}"></script>
@endsection
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="container">
                <div class="d-flex justify-content-start">
                    <button onclick="window.location.href = '{{ route('addPost') }}';" class="m-3 btn btn-success"> <i class="fa fa-edit"></i> Add Post </button>
                    <button onclick="window.location.href = '{{ route('getPosts') }}';" class="m-3 btn btn-primary"> <i class="fa fa-list"></i> List Post </button>
                </div>
            </div>
        </div>
        <div class="card-body card-block">
            <form id="add-post">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Post Image</label>
                            <input type="file" name="pic" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Title"> Title </label>
                            <input type="text" class="form-control" id="post-title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="Title"> Tags </label>
                            <input type="text" name="tags" data-role="tagsinput">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="long_description"> Description </label>
                    <textarea id="editor1" rows="10" cols="80">
                    </textarea>
                </div>
                <button class="btn btn-outline-success btn-sm" id="submit-post" type="button">
                    <i class="fa fa-magic"></i>
                    Submit
                </button>
            </form>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{ asset('src/plugin/taginput/tagsinput.js') }}"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
        $(function(){
            $('#submit-post').click( function(event){
                var editor = $('#editor1').val();
                const toasted = new Toasted({
                    color:  '#fafafa',
                    position: "bottom-center",
                    duration: 6000,
                });
                event.preventDefault();
                var file = $('#add-post')[0];
                var formData = new FormData(file);
                var hos = CKEDITOR.instances['editor1'].getData();
                formData.append('long_description',hos);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: " {{ route('postPost') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        toasted.success(data.message)
                    },
                    error: function(data){
                        toasted.success(data.responseText)
                    },
                });
            })
        })
    </script>
@endsection

@extends('panel2.index')
@section('css')
    <link href="{{ asset('panel2/plugin/taginput/tagsinput.css') }}" rel="stylesheet"/>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-start">
                <button onclick="window.location.href = '{{ route('deletePost') }}';" class="m-3 btn btn-danger" id="delete-post"> <i class="fa fa-trash-o"></i> Delete </button>
                <button onclick="window.location.href = '{{ route('addPost') }}';" class="m-3 btn btn-success"> <i class="fa fa-edit"></i> Add Post </button>
                <button onclick="window.location.href = '{{ route('getPosts') }}';" class="m-3 btn btn-primary"> <i class="fa fa-list"></i> List Post </button>
            </div>
        </div>
        <div class="card-body card-block">
            <form id="add-post">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Post Image</label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                            <input type="text" name="tag" data-role="tagsinput">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Title"> Title </label>
                            <input type="text" class="form-control" value="{{ $post->title }}" name="title">
                        </div>
                        <div class="form-group">
                            <label for="description"> Description </label>
                            <textarea class="form-control" name="description" rows="3">{{ $post->description }}</textarea>
                        </div>
                    </div>
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
    <script src="{{ asset('panel2/plugin/taginput/tagsinput.js') }}"></script>
    <script>
        $(function(){
            $('#submit-post').click( function(event){
                const toasted = new Toasted({
                    color:  '#fafafa',
                    position: "bottom-center",
                    duration: 6000,
                });
                event.preventDefault();
                var file = $('#add-post')[0];
                var formData = new FormData(file);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: " {{ route('patchPost') }}",
                    type: "PATCH",
                    data: {
                        'fuck': 'nothing',
                    },
                    processData: false,
                    // contentType: false,
                    success: function(data){
                        toasted.success(data)
                    },
                    error: function(data){
                        toasted.success(data.responseText)
                    },
                });
            })
        })
    </script>
@endsection

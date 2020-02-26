@extends('panel2.index')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="container">
                <div class="row">
                <div class="col-md-3">
                    <button onclick="window.location.href = '{{ route('getList') }}';" class="btn btn-info"> Add Post </button>
                </div>
                <div class="col-md-6">
                </div>
                <div class="col-md-3">
                    <button onclick="window.location.href = '{{ route('getList') }}';" class="btn btn-info"> Add Post </button>
                </div>
             </div>
            </div>
        </div>
        <div class="card-body card-block">
            <form id="add-post">
                <div class="form-group">
                    <label for="Title">
                        <p class="text-left"> Title </p>
                    </label>
                    <input type="text" class="form-control" id="post-title" name="title">
                </div>
                <div class="form-group">
                    <label for="description"> Description</label>
                    <textarea class="form-control" name="description" rows="3"></textarea>
                </div>
                <button class="btn btn-outline-success btn-sm" id="submit" type="button">
                    <i class="fa fa-magic"></i>
                    Submit
                </button>
            </form>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(function(){
            $('#add-post').click( function(event){
                const toasted = new Toasted({
                    color:  '#fafafa',
                    position: "bottom-center",
                    duration: 6000,
                })
                event.preventDefault();
                var file = $(this)[0];
                var formData = new FormData(file);
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
                        console.log(data);
                        toasted.success(data)
                    },
                    error: function(data){
                        console.log(data);
                        toasted.success(data.responseText)
                    },
                });
            })
        })
    </script>
@endsection

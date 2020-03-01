@extends('panel2.index')
@section('css')
    <link href="{{ asset('panel2/plugin/taginput/tagsinput.css') }}" rel="stylesheet"/>
@endsection
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="container">
                <div class="d-flex justify-content-start">
                    <button onclick="window.location.href = '{{ route('getPermissions') }}';" class="m-3 btn btn-primary"> <i class="fa fa-list"></i> List Permission </button>
                </div>
            </div>
        </div>
        <div class="card-body card-block">
            <form id="add-post">
                <div class="d-flex justify-content-end">
                    <div class="form-group w-50">
                    <label for="Title"> Permission Name </label>
                    <input type="text" class="form-control" id="permission-name" name="permission_name">
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
                })
                event.preventDefault();
                var file = $('#add-post')[0];
                var formData = new FormData(file);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: " {{ route('postPermission') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
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

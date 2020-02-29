@extends('panel2.index')
@section('css')
    <link href="{{ asset('panel2/plugin/taginput/tagsinput.css') }}" rel="stylesheet"/>
@endsection
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-start">
                <button onclick="window.location.href = '{{ route('deletePost') }}';" class="m-3 btn btn-danger" id="delete-post"> Delete </button>
                <button onclick="window.location.href = '{{ route('addPost') }}';" class="m-3 btn btn-info"> Add Post </button>
            </div>
                <table dir="rtl" class="table table-hover ">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Created at</th>
                        <th scope="col"> Operation </th>
                    </tr>
                    </thead>
                    <tbody>
{{--                    @foreach($post as $posts)--}}
{{--                        <tr id="row_post_{{ $posts->id }}">--}}
{{--                            <th scope="row">{{ $posts->id }}</th>--}}
{{--                            <td><a href="{{ route('getPosts', [$posts->id]) }}"> {{ $posts->title }} </a></td>--}}
{{--                            <td> {{ $posts->created_at }}</td>--}}
{{--                            <td>--}}
{{--                                <button class="btn" id="deletepost_{{$posts->id}}" value="{{$posts->id }}" title="Delete Post" > <i class="fa fa-trash-o"></i> </button>--}}
{{--                                <button onclick="window.location.href = '{{ route('getPost', [$posts->id]) }}';" class="btn" data-toggle="tooltip" data-placement="left" title="Edit Post"> <i class="fa fa-edit"></i> </button>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
                    </tbody>
                </table>
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
                    url: " {{ route('postPost') }}",
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

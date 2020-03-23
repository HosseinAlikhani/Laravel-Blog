@extends('panel2.index')
@section('css')
    <link href="{{ asset('panel2/plugin/taginput/tagsinput.css') }}" rel="stylesheet"/>
    <style>
        .table tbody tr:hover td, .table tbody tr:hover th {
            background-color: #d2d2d2;
        }
    </style>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-start">
                <button onclick="window.location.href = '{{ route('deletePost') }}';" class="m-3 btn btn-danger" id="delete-post"> Delete </button>
                <button onclick="window.location.href = '{{ route('addPost') }}';" class="m-3 btn btn-info"> Add Post </button>
            </div>
            @if(!empty($post[0]))
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
                    @foreach($post as $posts)
                        <tr id="row_post_{{ $posts->id }}">
                            <th scope="row">{{ $posts->id }}</th>
                            <td><a href="{{ route('getPosts', [$posts->id]) }}"> {{ $posts->title }} </a></td>
                            <td> {{ $posts->created_at }}</td>
                            <td>
                                <button class="btn" id="deletepost_{{$posts->id}}" value="{{$posts->id }}" title="Delete Post" > <i class="fa fa-trash-o"></i> </button>
                                <button onclick="window.location.href = '{{ route('editPost', [$posts->id]) }}';" class="btn" data-toggle="tooltip" data-placement="left" title="Edit Post"> <i class="fa fa-edit"></i> </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                @else
                <a> nothing to show </a>
                @endif
            </table>
        </div>
    </div>

@endsection
@section('script')
<script>
$(document).ready(function(){
    var toasted = new Toasted();
    $('button').click(function(){
        var postId = {
            'post_id': $(this).attr('value'),
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            'url': " {{ route('deletePost') }}",
            data: postId,
            type: "DELETE",
            success: function(data){
                console.log('ok');
                console.log(postId);
                $('#row_post_'+postId.post_id).remove();
                toasted.success(data)
            },
            error: function(data){
                console.log('bad');
                toasted.success(data.responseText)
            },
        })
    });
});
</script>
@endsection

@extends('panel2.index')
@section('css')
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
            <table dir="rtl" class="table table-hover ">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Created at</th>
                    <th scope="col"> Delete </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($post as $posts)
                        <tr>
                            <th scope="row">{{ $posts->id }}</th>
                            <td><a href="{{ route('getPosts', [$posts->id]) }}"> {{ $posts->title }} </a></td>
                            <td> {{ $posts->created_at }}</td>
                            <td> <i class="fa fa-trash-o"></i></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
@section('script')
<script>
$(function(){
    $('#delete-post').click(function(){
        var id = $('#delete-select');
        console.log(id);
    });
});
</script>
@endsection

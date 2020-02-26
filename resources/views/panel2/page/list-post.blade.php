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
            <div class="row">
                <div class="col-1">
                    <button onclick="window.location.href = '{{ route('deletePost') }}';" class="btn btn-danger"> Delete </button>
                </div>
                <div class="col-10"></div>
                <div class="col-1">
                    <button onclick="window.location.href = '{{ route('getAdd') }}';" class="btn btn-info"> Add Post </button>
                </div>
            </div>
            <table class="table table-hover">
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
                            <td><a href="{{ route('getLists', [$posts->id]) }}"> {{ $posts->title }} </a></td>
                            <td> {{ $posts->created_at }}</td>
                            <td> <input type="checkbox" value=""> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@extends('panel2.index')
@section('css')
    <link href="{{ asset('panel2/plugin/taginput/tagsinput.css') }}" rel="stylesheet"/>
@endsection
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-start">
                <button onclick="window.location.href = '{{ route('getPostRole') }}';" class="m-3 btn btn-info"> <i class="fa fa-edit"></i> Add Role </button>
                <button onclick="window.location.href = '{{ route('deleteRole') }}';" class="m-3 btn btn-danger" id="delete-post"> <i class="fa fa-trash"></i> Delete </button>
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
                    @foreach($role as $roles)
                        <tr id="row_post_{{ $roles->id }}">
                            <th scope="row">{{ $roles->id }}</th>
                            <td><a href="{{ route('getPosts', [$roles->id]) }}"> {{ $roles->name }} </a></td>
                            <td> {{ $roles->created_at }}</td>
                            <td>
                                <button class="btn" id="deleterole_{{$roles->id}}" value="{{$roles->id }}" title="Delete Role" > <i class="fa fa-trash-o"></i> </button>
                                <button onclick="window.location.href = '{{ route('getRole', [$roles->id]) }}';" class="btn" data-toggle="tooltip" data-placement="left" title="Edit Role"> <i class="fa fa-edit"></i> </button>
                            </td>
                        </tr>
                    @endforeach
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
                var file = $('#add-role')[0];
                var formData = new FormData(file);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: " {{ route('deleteRole') }}",
                    type: "delete",
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

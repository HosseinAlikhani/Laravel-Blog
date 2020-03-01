@extends('panel2.index')
@section('css')
    <link href="{{ asset('panel2/plugin/taginput/tagsinput.css') }}" rel="stylesheet"/>
@endsection
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="container">
                <div class="d-flex justify-content-start">
                <button onclick="window.location.href = '{{ route('getPostPermission') }}';" class="m-3 btn btn-success"> <i class="fa fa-edit"></i> Add Permission </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if(!empty($permission[0]))
                <table dir="rtl" class="table table-hover ">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">Created at</th>
                        <th scope="col"> Operation </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permission as $permissions)
                        <tr id="row_permission_{{ $permissions->id }}">
                            <th scope="row">{{ $permissions->id }}</th>
                            <td><a href="{{ route('getPermission', [$permissions->id]) }}"> {{ $permissions->name }} </a></td>
                            <td> {{ $permissions->created_at }}</td>
                            <td>
                                <button class="btn" id="deletepost_{{$permissions->id}}" value="{{$permissions->id }}" title="Delete Post" > <i class="fa fa-trash-o"></i> </button>
                                <button onclick="window.location.href = '{{ route('getPermission', [$permissions->id]) }}';" class="btn" data-toggle="tooltip" data-placement="left" title="Edit Post"> <i class="fa fa-edit"></i> </button>
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
    </div>

@endsection
@section('script')
<script src="{{ asset('panel2/plugin/taginput/tagsinput.js') }}"></script>
<script>
        $(document).ready(function(){
            var toasted = new Toasted();
            $('button').click(function(){
                var permissionId = {
                    'permission_id': $(this).attr('value'),
                };
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    'url': " {{ route('deletePermission') }}",
                    data: permissionId,
                    type: "DELETE",
                    success: function(data){
                        console.log('ok');
                        console.log(permissionId);
                        $('#row_permission_'+permissionId.permission_id).remove();
                        toasted.success(data)
                    },
                    error: function(data){
                        toasted.success(data.responseText)
                    },
                })
            });
        });
</script>
@endsection

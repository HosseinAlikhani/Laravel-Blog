@extends('panel2.index')
@section('css')
    <link href="{{ asset('src/plugin/taginput/tagsinput.css') }}" rel="stylesheet"/>
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
            @if(!empty($category[0]))
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
                    @foreach($category as $categories)
                        <tr id="row_post_{{ $categories->id }}">
                            <th scope="row">{{ $categories->id }}</th>
                            <td><a href="{{ route('getPosts', [$categories->id]) }}"> {{ $categories->name }} </a></td>
                            <td> {{ $categories->created_at }}</td>
                            <td>
                                <button class="btn" data-toggle="modal" data-target="#delete-modal" data-whatever="{{ $categories }}" > <i class="fa fa-trash-o"></i> </button>
                                <button onclick="window.location.href = '{{ route('editPost', [$categories->id]) }}';" class="btn" data-toggle="tooltip" data-placement="left" title="Edit Post"> <i class="fa fa-edit"></i> </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    @else
                        <a> nothing to show </a>
                    @endif
                </table>
        </div>

{{--        delete modal --}}
    </div>
    <div style="text-align: left" class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="Delete Category" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-delete-title"></h5>
                </div>
                <div class="modal-body" id="modal-delete-message">
                    Are u Sure To Delete this Category ?

                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-start">
                        <button type="button" data-dismiss="modal" class="btn btn-danger ml-2 mr-2" id="modal-button-delete" >Delete</button>
                        <button type="button" data-dismiss="modal" class="btn btn-success ml-2 mr-2">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    end delete modal --}}
@endsection
@section('script')

    <script>
        $(document).ready(function(){
            {{--$('#delete-modal').on('shown.bs.modal', function (e) {--}}
            {{--    var button = $(e.relatedTarget);--}}
            {{--    button = button.data('whatever');--}}
            {{--    $(this).find('#modal-delete-title').text('Delete ' + button.name);--}}
            {{--    $(this).find('#modal-delete-message').text('Are u Sure To Delete ' + button.name + ' ? ');--}}
            {{--    $('#modal-button-delete').click(function(){--}}
            {{--        var url = "{{ route('get.delete.category', ":id") }}";--}}
            {{--        url = url.replace(':id', button.id);--}}
            {{--    });--}}
            {{--});--}}
            $.ajax({
                'url': " {{ route('post.create.category') }}",
                type: "POST",
                data: {
                    'name': 'hossein',
                },
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

        })

        {{--$(document).ready(function(){--}}
        {{--    var toasted = new Toasted();--}}
        {{--    $('button').click(function(){--}}
        {{--        var postId = {--}}
        {{--            'post_id': $(this).attr('value'),--}}
        {{--        };--}}
        {{--        $.ajaxSetup({--}}
        {{--            headers: {--}}
        {{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
        {{--            }--}}
        {{--        });--}}
        {{--        $.ajax({--}}
        {{--            'url': " {{ route('get.delete.category', 2) }}",--}}
        {{--            data: postId,--}}
        {{--            type: "get",--}}
        {{--            success: function(data){--}}
        {{--                console.log('ok');--}}
        {{--                console.log(postId);--}}
        {{--                $('#row_post_'+postId.post_id).remove();--}}
        {{--                toasted.success(data)--}}
        {{--            },--}}
        {{--            error: function(data){--}}
        {{--                console.log('bad');--}}
        {{--                toasted.success(data.responseText)--}}
        {{--            },--}}
        {{--        })--}}
        {{--    });--}}
        {{--});--}}
    </script>
@endsection

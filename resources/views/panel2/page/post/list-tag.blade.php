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
                <button onclick="window.location.href = '{{ route('get.create.tag') }}';" class="m-3 btn btn-info"> Add Tag </button>
            </div>
            @if(!empty($tags[0]))
                <table dir="rtl" class="table table-hover ">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">Parent ID</th>
                        <th scope="col">Created at</th>
                        <th scope="col"> Operation </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr id="row-tag-{{ $tag->id }}">
                            <th scope="row">{{ $tag->id }}</th>
                            <td><a href="{{ route('get.update.tag', [$tag->id]) }}"> {{ $tag->name }} </a></td>
                            <td> {{ $tag->tags_id }}</td>
                            <td> {{ $tag->created_at }}</td>
                            <td>
                                <button class="btn" data-toggle="modal" data-target="#delete-modal" data-whatever="{{ $tag }}" > <i class="fa fa-trash-o"></i> </button>
                                <button onclick="window.location.href = '{{ route('get.update.tag', [$tag->id]) }}';" class="btn" data-toggle="tooltip" data-placement="left" title="Edit tag"> <i class="fa fa-edit"></i> </button>
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
    <div style="text-align: left" class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="Delete Tag" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-delete-title"></h5>
                </div>
                <div class="modal-body" id="modal-delete-message">
                    Are u Sure To Delete this Tag ?

                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-start">
                        <div id="modal-delete-button-section">
                        </div>
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
            var toasted = new Toasted();
            $('#delete-modal').on('show.bs.modal', function (e) {
                var button = $(e.relatedTarget);
                button = button.data('whatever');
                $(this).find('#modal-delete-title').text('Delete ' + button.name);
                $(this).find('#modal-delete-message').text('Are u Sure To Delete ' + button.name + ' ? ');
                var deletebutton = '<button type="button" data-dismiss="modal" class="btn btn-danger ml-2 mr-2 modal-button-delete" id="modal-button-delete-'+ button.id +'" >Delete</button>';
                $('#modal-delete-button-section').append(deletebutton);
                $('#modal-button-delete-'+ button.id).click(function(){
                    $.ajax({
                        'url': " {{ route('delete.tag') }}",
                        type: "DELETE",
                        data: {
                            'tag_id': button.id,
                        },
                        success: function(data){
                            console.log('ok');
                            $('#row-tag-'+button.id).hide();
                            toasted.success(data)
                        },
                        error: function(data){
                            toasted.success(data.responseText)
                        },
                    });
                    $('row-tag-' + button.id).remove();
                });
            });
            $('#delete-modal').on('hide.bs.modal', function(e){
                $('.modal-button-delete').remove();
            })
        })


    </script>
@endsection

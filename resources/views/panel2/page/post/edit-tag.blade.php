@extends('panel2.index')
@section('css')
    <link href="{{ asset('src/plugin/taginput/tagsinput.css') }}" rel="stylesheet"/>
    <script src="{{ asset('src/plugin/ckeditor/ckeditor.js') }}"></script>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="container">
                <div class="d-flex justify-content-start">
                    <button onclick="window.location.href = '{{ route('get.list.tag') }}';" class="m-3 btn btn-primary"> <i class="fa fa-list"></i> List Tag </button>
                </div>
            </div>
        </div>
        <div class="card-body card-block">
            <form id="update-tag">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Title"> Parent </label>
                            <select type="text" class="form-control" name="tags_id">
                                @if(!empty($tag['tags_name']))
                                    <option value=" {{ $tag['tags_id'] }}"> {{ $tag['tags_name'] }}</option>
                                    @if(!empty($taglist{0}))
                                        @foreach($taglist as $taglists)
                                            @if($taglists->name == $tag['tags_name'])

                                            @else
                                                <option value="{{ $taglists->id }}"> {{ $taglists->name }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="0"> موردی یافت نشد </option>
                                    @endif
                                @else
                                    @if(!empty($taglist{0}))
                                        <option value="0"> انتخاب کنید </option>
                                        @foreach($taglist as $taglists)
                                            <option value="{{ $taglists->id }}"> {{ $taglists->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="0"> موردی یافت نشد </option>
                                    @endif
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <input type="hidden" name="id" value="{{ $tag['id'] }}">
                        <div class="form-group">
                            <label for="Title"> Name </label>

                            <input class="form-control" type="text" name="name" value="{{ $tag['name'] }}">
                        </div>
                    </div>
                </div>
                <button class="btn btn-outline-success btn-sm" id="update-tag-button" type="button">
                    <i class="fa fa-magic"></i>
                    Submit
                </button>
            </form>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{ asset('src/plugin/taginput/tagsinput.js') }}"></script>
    <script>
        $(function(){
            $('#update-tag-button').click( function(event){
                const toasted = new Toasted({
                    color:  '#fafafa',
                    position: "bottom-center",
                    duration: 6000,
                });
                event.preventDefault();
                var file = $('#update-tag')[0];
                var formData = new FormData(file);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    url: " {{ route('patch.tag') }}",
                    type: "post",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        toasted.success(data);
                    },
                    error: function(data){
                        var message = JSON.parse(data.responseText);
                        toasted.success(message.message);
                    },
                });
            })
        })
    </script>
@endsection

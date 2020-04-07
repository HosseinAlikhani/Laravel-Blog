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
                    <button onclick="window.location.href = '{{ route('get.list.category') }}';" class="m-3 btn btn-primary"> <i class="fa fa-list"></i> List Category </button>
                </div>
            </div>
        </div>
        <div class="card-body card-block">
            <form id="update-category">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Title"> Parent </label>
                            <select type="text" class="form-control" name="categories_id">
                                @if(!empty($category['categories_name']))
                                    <option value=" {{ $category['categories_id'] }}"> {{ $category['categories_name'] }}</option>
                                    @if(!empty($categorylist{0}))
                                        @foreach($categorylist as $categorylists)
                                            @if($categorylists->name == $category['categories_name'])

                                            @else
                                            <option value="{{ $categorylists->id }}"> {{ $categorylists->name }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="0"> موردی یافت نشد </option>
                                    @endif
                                @else
                                    @if(!empty($categorylist{0}))
                                        <option value="0"> انتخاب کنید </option>
                                        @foreach($categorylist as $categorylists)
                                            <option value="{{ $categorylists->id }}"> {{ $categorylists->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="0"> موردی یافت نشد </option>
                                    @endif
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <input type="hidden" name="id" value="{{ $category['id'] }}">
                        <div class="form-group">
                            <label for="Title"> Name </label>

                            <input class="form-control" type="text" name="name" value="{{ $category['name'] }}">
                        </div>
                    </div>
                </div>
                <button class="btn btn-outline-success btn-sm" id="update-category-button" type="button">
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
            $('#update-category-button').click( function(event){
                const toasted = new Toasted({
                    color:  '#fafafa',
                    position: "bottom-center",
                    duration: 6000,
                });
                event.preventDefault();
                var file = $('#update-category')[0];
                var formData = new FormData(file);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    url: " {{ route('patch.category') }}",
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

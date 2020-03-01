@extends('panel2.index')
@section('css')
    <link href="{{ asset('panel2/plugin/taginput/tagsinput.css') }}" rel="stylesheet"/>
@endsection
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="container">
                <div class="d-flex justify-content-start">
                    <button onclick="window.location.href = '{{ route('getRoles') }}';" class="m-3 btn btn-primary"> <i class="fa fa-list"></i> List Role </button>
                </div>
            </div>
        </div>
        <div class="card-body card-block">
            <form id="add-role">
                <div class="row">
                  <div class="col-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1"> Permissions : </label>
                            @if(!empty($permission[0]))
                            <select class="custom-select role_permission" name="role_permission" multiple>
                            @foreach($permission as $permissions)
                                    <option value="{{ $permissions->name }}"> {{ $permissions->name }}</option>
                            @endforeach
                            </select>
                            @else
                                <div class="alert alert-warning">
                                    permission not found . please add Permission before add Role From <a href="{{ route('getPostPermission') }}"> here </a>
                                </div>
                            @endif
                        </div>
                  </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Title"> Role </label>
                            <input type="text" class="form-control" id="role-name" name="role_name">
                        </div>
                    </div>
              </div>
                <button class="btn btn-outline-success btn-sm" id="submit-role" type="button">
                    <i class="fa fa-magic"></i>
                    Submit
                </button>
            </form>
        </div>
    </div>

@endsection
@section('script')
<script src="{{ asset('panel2/plugin/taginput/tagsinput.js') }}"></script>
<script>
    $(function(){
        $('#submit-role').click( function(event){
            const toasted = new Toasted({
                color:  '#fafafa',
                position: "bottom-center",
                duration: 6000,
            })
            event.preventDefault();
            var file = $('#add-role')[0];
            var formData = new FormData(file);
            console.log(formData);
            var permissions = $('.role_permission').val();
            formData.append('role_permission', permissions);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('postRole') }}",
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

@extends('panel2.index')

@section('content')

    <div class="card">
        <div class="card-body card-block">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <div class="col-auto">
                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">@</div>
                    </div>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
    <p class="text-left"> Title </p>
    <div class="card">
        <div class="card-body card-block">
            <form>
                <div class="form-group">
                    <label for="Title">
                        <p class="text-left"> Title </p>
                    </label>
                    <input type="text" class="form-control" id="post-title" name="post-title">
                </div>
                <div class="form-group">
                    <label for="description"> Description</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
            </form>
        </div>
    </div>

@endsection

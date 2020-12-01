@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card w-90">
                <div class="card-body">
                    <form method="POST" action="./api/post">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="user" value="{{Auth::user()->firstname}} {{Auth::user()->lastname}}">
                        <div class="card-title">
                            What's on your mind?
                        </div>
                        <div class="form-group">
                            <textarea name="content" class="form-control" placeholder="Post something..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>
            </div>
        </div>
        <posts></posts>
    </div>
</div>
@endsection

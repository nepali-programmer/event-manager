@extends('base_plane')

@section('content')
<div class="relative">
    <form method="post" style="position: absolute; left:50%; top:50%; transform: translate(-50%, -50%)">
        @csrf
        <div class="form-outline mb-4">
            <label class="form-label" for="email">Email address</label>
            <input type="email" name="email" id="email" class="form-control" required />
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required />
        </div>
        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
    </form>
</div>
@stop
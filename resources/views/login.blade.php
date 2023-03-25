@extends('base_plane')

@section('content')
<div class="relative">
    <form method="post" style="position: absolute; left:50%; top:50%; transform: translate(-50%, -50%)">
        @csrf
        <div class="form-outline mb-4">
            <label class="form-label" for="email">Email address</label>
            <input type="email" name="email" id="email" class="form-control {{ $login_error ? 'is-invalid' : '' }}" value="{{$email}}" required />
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control {{ $login_error ? 'is-invalid' : '' }}" value="{{$password}}" required /> 
        </div>
        @if ($login_error)
        <div id="wrongCredential" class="form-outline mb-4 bg-danger text-light p-2">
            Wrong credentials
        </div>
        @endif        
        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
    </form>
</div>
@stop

@section('end_script')
<script>
    $(function() {
        $('#email, #password').on('change paste keyup', function() {
            $('#email').removeClass('is-invalid');
            $('#password').removeClass('is-invalid');
            $('#wrongCredential').hide();
        });        
    });
</script>
@stop
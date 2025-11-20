@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">

        <div class="col-md-6">
            <h2>Login</h2>

            @if($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ url('login') }}">
                @csrf

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button class="btn btn-primary">Login</button>
                <a href="{{ url('register') }}" class="btn btn-link">Register</a>
            </form>
        </div>

        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <img src="https://imgs.search.brave.com/kJwBZ2rFny0BUhXjyyjHF7OGVNmRrdT-BqEYGldGUts/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMucHJpc21pYy5p/by9haXItY29ycG9y/YXRlL1pncHltY3Qy/VVVjdkJUcDNfVW50/aXRsZWRkZXNpZ24t/NTMtLmpwZz9hdXRv/PWZvcm1hdCxjb21w/cmVzcyZmaXQ9bWF4/Jnc9Njg2Jmg9NDAw" class="img-fluid rounded shadow">
        </div>

    </div>
</div>
@endsection

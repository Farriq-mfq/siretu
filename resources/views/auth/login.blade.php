@extends('templates.new')
@section('title')
    Login
@endsection
@section('content')
    <h4 class="mb-2">Welcome to Siretu! 👋</h4>
    <p class="mb-4">
        Silahkan login menggunakan username dan password anda
    </p>
    @if (Session::has('unauthorized'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('unauthorized') }}
        </div>
    @endif
    <form class="mt-8 space-y-6" method="POST" action="{{ route('login.action') }}" class="mb-3" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label"> Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                name="username" placeholder="Masukan username anda" autofocus />
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3 form-password-toggle">
            <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" name="remember" type="checkbox" id="remember-me" />
                <label class="form-check-label" for="remember-me"> Remember Me </label>
            </div>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
        </div>
    </form>
@endsection

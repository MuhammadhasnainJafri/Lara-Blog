@extends('layouts.app')

@section('content')
<style>
    .form {
        display: flex;
        align-items: center;
        flex-direction: column;
        padding: 0 3rem;
    }

    .form input[type='email'],
    input[type='password'] {
        width: 100%;
    }

    .inline_label {
        display: inline;
        margin-left: 1rem;
    }
</style>
<div class="form">

    <h3>{{ __('Reset Password') }}</h3>

    
        @if (session('status'))
        <div class="alert" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <h4 class="error">
                <strong>{{ $message }}</strong>
            </h4>
            @enderror
   

        <button type="submit" >
            {{ __('Send Password Reset Link') }}
        </button>
   
</form>
</div>

@endsection
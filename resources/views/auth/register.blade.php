@extends('layouts.app')

@section('content')



<div class="form-center">
    <h3>{{ __('Register') }} </h3>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <label>{{ __('Name') }}</label>
        <input  type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
        <span role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="email">Email</label>
        <input type="email" type="email" id="email" name="email" value="{{ old('email') }}" required
            autocomplete="email" placeholder="Please Enter your Email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <label for="password">{{__('Password')}}</label>
        <input type="password" type="password" name="password" placeholder="Please Enter your password" required
            autocomplete="current-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <label for="password">{{__('Password')}}</label>
        <input type="password" type="password" name="password_confirmation" placeholder="Please Enter your password" required
            autocomplete="current-password">


        <button type="submit">
            {{ __('Register') }}
        </button>
        @if (Route::has('password.request'))
       
        @endif
    </form>
</div>
    @endsection
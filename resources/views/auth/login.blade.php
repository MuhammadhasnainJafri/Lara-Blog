@extends('layouts.app')

@section('content')


<div class="form-center">
    <h3>{{ __('Login') }}</h3>
     @error('email')
     <h5 class="error"> {{ $message }}</h5>
    @enderror
    @error('password')
        <h5 class="error">{{ $message }}</h5>
@enderror
</h5>
    <form method="POST" action="{{ route('login') }}">
        @csrf 
        <label for="email">Email</label>
        <input type="email" type="email"  name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Please Enter your Email" autofocus>
       
       
        <label for="password">Password</label>
        <input type="password" type="password"  name="password" placeholder="Please Enter your password" required autocomplete="current-password">
        

      
        <div>
        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class='inline_label'> {{ __('Remember Me') }}</label>
        </div>
        <button type="submit" >
            {{ __('Login') }}
        </button>
        @if (Route::has('password.request'))
             <a class="btn btn-link" href="{{ route('password.request') }}">
               {{ __('Forgot Your Password?') }}
             </a>
        @endif
    </form>
</div>































                        

                               
@endsection

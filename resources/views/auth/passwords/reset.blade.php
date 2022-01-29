@extends('layouts.app')

@section('content')



                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div>
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required
                            autocomplete="email" autofocus>

                        @error('email')
                        <h4 class="alert">
                            <strong>{{ $message }}</strong>
                        </h4>
                        @enderror


                        <label for="password">{{ __('Password') }}</label>


                        <input id="password" type="password" name="password" required
                            autocomplete="new-password">

                        @error('password')
                        <h4 class="alert">
                            <strong>{{ $message }}</strong>
                        </h4>
                        @enderror
                   
            
                <label for="password-confirm">{{ __('Confirm Password') }}</label>

               
                    <input id="password-confirm" type="password"  name="password_confirmation"
                        required autocomplete="new-password">
               
            

            
                    <button type="submit" class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button>
                
            </form>
        
@endsection
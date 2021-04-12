@extends('layouts.app')

@section('content')
<div class="limiter">
		<div class="container-login1">
			<div class="login100-more" style="background-image: url('img/bg-02.jpg');"></div>

			<div class="wrap-login1 p-l-50 p-r-50 p-t-72 p-b-50">
			 <form method="POST" action="{{ route('register') }}">
                        @csrf
					<span class="login100-form-title p-b-59">
						{{ __('Register') }}
					</span>

					<div class="wrap-input100 validate-input">
						<span class="label-input100">{{ __('Name') }}</span>
                         <input id="name" type="text" class="input100 @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback focus-input100" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
					</div>


                    <div class="wrap-input100 validate-input">
						<span class="label-input100">{{ __('Surname') }}</span>
                        <input id="surname" type="text"
                                    class="input100 @error('surname') is-invalid @enderror" name="surname"
                                    value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                <span class="invalid-feedback focus-input100" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
					</div>
					
                  
                     <div class="wrap-input100 validate-input">
						<span class="label-input100">{{ __('Nick') }}</span>
                        <input id="nick" type="text" class="input100 @error('nick') is-invalid @enderror"
                                    name="nick" value="{{ old('nick') }}" required autocomplete="nick" autofocus>

                                @error('nick')
                                <span class="invalid-feedback focus-input100" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
					</div>

                       <div class="wrap-input100 validate-input">
						<span class="label-input100">{{ __('E-Mail Address') }}</span>
                       <input id="email" type="email" class="input100 @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback focus-input100" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
					</div>

                     <div class="wrap-input100 validate-input">
						<span class="label-input100">{{ __('Password') }}</span>
                      
                         <input id="password" type="password"
                                    class="input100 @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback focus-input100" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
					</div>


                      <div class="wrap-input100 validate-input">
						<span class="label-input100">{{ __('Confirm Password') }}</span>
                      
                        <input id="password-confirm" type="password" class="input100"
                                    name="password_confirmation" required autocomplete="new-password">
					</div>
					<div class="flex-m w-full p-b-33">
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								 {{ __('Register') }}
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
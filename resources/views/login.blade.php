@extends('layouts.auth')
@section('title', 'Login')
@section('content')

<div class="w-100 d-flex justify-content-center align-items-center h-100">

  <div class="card p-4 shadow" style="width: 350px; border-radius: 12px;">
    <h2 class="text-center mb-3" style="color:#1f8a5b;">Welcome</h2>

    <form  method="POST" action="{{ url('/login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-3">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" value="{{ old('email') }}">
            @error('email')
              <div class="invalid-feedback">
                Enter valid email
               </div>
            @enderror
        </div>

        <!-- PASSWORD -->
        <div class="mb-3 position-relative">
          <input type="password" name="password" class="form-control" placeholder="Enter password">
            <span onclick="togglePassword()" class="position-absolute top-50 end-0 translate-middle-y me-3"
              style="cursor: pointer;">
                👁
            </span>
        </div>
         <script>
          function togglePassword() {
            let input = document.querySelector('input[name="password"]');
            input.type = input.type === 'password' ? 'text' : 'password';
          }
         </script>

        <!-- FORGOT PASSWORD
        <div class="text-end mb-2">
          <a routerLink="/forgot-password" style="cursor:pointer; font-size: 14px;">
           Forgot Password?
          </a>
        </div> -->

        <!-- LOGIN BUTTON -->
        <button class="btn w-100 mt-2" type="submit" [disabled]="loginForm.invalid"
         style="background-color:#1f8a5b; color:white;">
           Login
        </button>

        <div class="text-danger text-center mt-2" *ngIf="errorMessage">
        </div>

        <!-- REGISTER LINK -->
        <div class="text-center mt-3">
          <small>
            Don't have an account?
              <a href="{{ url('/register') }}" style="color:#1f8a5b; cursor:pointer;">
                Register
              </a>
          </small>
        </div>

    </form>
 </div>
</div>

@endsection

@extends('layouts.layout')
@section('title', 'Register')
@section('content')

<div class="w-100 d-flex justify-content-center align-items-center vh-100"
    style="background: linear-gradient(to right, #1f8a5b, #2ecc71);">

    @if(session('success'))
       <div class="text-success text-center">{{ session('success') }}</div>
    @endif

    <div class="card p-4 shadow" style="width: 380px; border-radius: 12px;">
      <div class="text-center mb-3">
        <h2 class="fw-bold mt-2" style="color:#1f8a5b;">Register</h2>
      </div>

    <form action="{{route('register.post')}}" method="POST">

       @csrf

        @if($errors->has('email'))
         <div class="alert alert-danger text-center">
          {{ $errors->first('email') }}
         </div>
        @endif

       @if(session('error'))
        <div class="text-danger text-center">{{ session('error') }}</div>
       @endif

        <!-- NAME -->
        <div class="mb-3">
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
           placeholder="Enter your name" value="{{ old('name') }}">
           @error('name')
            <div class="invalid-feedback">
              Only letters allowed, no space at start/end
            </div>
           @enderror
        </div>

        <!-- EMAIL -->
        <div class="mb-3">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
           placeholder="Enter your Gmail" value="{{ old('email') }}">
           @error('email')
             <div class="invalid-feedback">
                Enter valid Gmail (no spaces)
             </div>
           @enderror
        </div>

        <!-- PASSWORD -->
        <div class="mb-3 position-relative">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
           placeholder="Enter password">

            <span onclick="togglePassword()" class="position-absolute end-0 translate-middle-y me-3"
            style="top: 50%; transform: translateY(-50%); cursor: pointer;">
             👁
          </span>

           @error('password')
             <div class="invalid-feedback">
               Minimum 6 characters, no spaces
             </div>
           @enderror
        </div>

        <script>
         function togglePassword() {
            let input = document.querySelector('input[name="password"]');
            input.type = input.type === 'password' ? 'text' : 'password';
         }
        </script>

        <!-- Role : dropdown -->
        <div class="mb-3">
          <select name="role" class="form-control @error('role') is-invalid @enderror">
            <option>Choose your role</option>
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }} >Admin</option>
            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }} >User</option>
          </select>
          @error('role')
          <div class="invalid-feedback">
            Please select a role
          </div>
          @enderror
        </div>

        <button type="submit" class="btn w-100 mt-2" style="background-color:#1f8a5b; color:white;">
           Register
        </button>

    </form>

    <div class="text-center mt-3">
      <small>Already have an account?
        <a style="color:#1f8a5b;" href="{{ route('login') }}">Login</a>
      </small>
    </div>
  </div>

</div>

@endsection
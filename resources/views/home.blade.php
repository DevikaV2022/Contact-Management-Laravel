@extends('layouts.layout')
@section('title', 'Home')

@section('styles')
<style>
.logout-btn {
  background-color: white;
  color: #1f8a5b;
  border: none;
  padding: 5px 10px;
  font-size: 0.9rem;
}
.logout-btn:hover {
  background-color: #e6f5ee;
}
</style>
@endsection

@section('content')

<div class="main-container">

  <!-- HEADER -->
  <header class="d-flex justify-content-between align-items-center p-4"
    style="background: linear-gradient(to right, #1f8a5b, #2ecc71); color: white;">

    <h4 style="font-weight: bold;">MyApp</h4>

    <div>
      <span class="me-3">Hello , {{ Auth::user()->name }}</span>

      <!--  FIXED LOGOUT -->
      <form method="POST" action="{{ route('logout') }}" style="display:inline;"
        onsubmit="return confirmLogout()">
        @csrf
        <button class="btn logout-btn">Logout</button>
      </form>
    </div>
  </header>

  <h1 class="text-center p-5">Welcome to Home Page</h1>

  <!-- BODY -->
  <div class="container mt-5">
    <div class="card shadow-lg p-4">
      <div class="row align-items-center">

        <!-- IMAGE -->
        <div class="col-md-5 text-center">
          <img src="https://i.pinimg.com/736x/0f/10/9e/0f109e9af8b540e940680e5adec9555d.jpg"
            class="img-fluid rounded" />
        </div>

        <!-- FORM -->
        <div class="col-md-7">
          <h3 class="mb-3">Contact Form</h3>

            @if(session('success'))
             <div class="alert alert-success text-center">
               {{ session('success') }}
             </div>
            @endif

          <!--  FORM FIXED -->
          <form method="POST" action="{{ route('contact.store') }}" id="contactForm">
            @csrf

            <!-- Name -->
            <div class="mb-3">
              <label>Name</label>
              <input type="text" id="name" name="name" class="form-control" required>
              <small id="nameError" class="text-danger d-none">Name is required</small>
            </div>

            <!-- Email -->
            <div class="mb-3">
              <label>Email</label>
              <input type="text" id="email" name="email" class="form-control" required>
              <small id="emailError" class="text-danger d-none">
                Enter valid Gmail (@gmail.com)
              </small>
            </div>

            <!-- Phone -->
            <div class="mb-3">
              <label>Phone</label>
              <input type="text" id="phone" name="phone" class="form-control" required>
              <small id="phoneError" class="text-danger d-none">
                Enter 10 digit phone number
              </small>
            </div>

            <!-- Message -->
            <div class="mb-3">
              <label>Message</label>
              <textarea id="message" name="message" class="form-control" required></textarea>
            </div>

            <!-- Submit -->
            <button type="submit" id="submitBtn" class="btn w-100"
              style="background:#1f8a5b; color:white;" disabled>
              Submit
            </button>

          </form>
        </div>

      </div>
    </div>
  </div>

</div>

@endsection


{{--  JS MUST BE IN SECTION --}}

@section('scripts')
 <script>

  const form = document.getElementById("contactForm");
  const btn = document.getElementById("submitBtn");

  const name = document.getElementById("name");
  const email = document.getElementById("email");
  const phone = document.getElementById("phone");
  const message = document.getElementById("message");

  const nameError = document.getElementById("nameError");
  const emailError = document.getElementById("emailError");
  const phoneError = document.getElementById("phoneError");

  // Enable / Disable button + validation
  form.addEventListener("input", () => {

    let valid = true;

    // Name
    if (!name.value.trim()) {
        nameError.classList.remove("d-none");
        valid = false;
    } else {
        nameError.classList.add("d-none");
    }

    // Email
    if (!/^[^\s@]+@gmail\.com$/.test(email.value)) {
        emailError.classList.remove("d-none");
        valid = false;
    } else {
        emailError.classList.add("d-none");
    }

    // Phone
    if (!/^[0-9]{10}$/.test(phone.value)) {
        phoneError.classList.remove("d-none");
        valid = false;
    } else {
        phoneError.classList.add("d-none");
    }

    // Message
    if (!message.value.trim()) {
        valid = false;
    }

    btn.disabled = !valid;
  });

  // Logout confirm
  function confirmLogout() {
    return confirm("Are you sure you want to logout?");
  } 

 </script>
@endsection
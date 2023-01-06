@extends('account.layout.main')

@section('container')
  <form action="/register", method="POST">
    @csrf
    <h1 class="h3 mb-3 fw-normal">Registration Form</h1>
    <div class="form-floating mb-1">
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" value="{{ old('name') }}" required autofocus>
        <label for="name">Name</label>
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
    </div>
    <div class="form-floating mb-1">
        <input type="username" class="form-control @error('user_name') is-invalid @enderror" name="user_name" id="username" placeholder="username" value="{{ old('username') }}" required>
        <label for="username">Username</label>
        @error('user_name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
    </div>
    <div class="form-floating">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
        <label for="password">Password</label>
        @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
    </div>
  <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Register</button>
</form>
<small class="d-block text-center mt-3">Have Been Registered? <a href="/login">Login Now!</a></small>
@endsection

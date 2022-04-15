@extends('account.layout.main')

@section('container')
  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  <form action="/login" method="POST">
    @csrf
  <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

  <div class="form-floating">
      <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="username" required autofocus>
      <label for="username">Username</label>
      @error('username')
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
  <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Login</button>
</form>
<small class="d-block text-center mt-3">Not Registered? <a href="/register">Register Now!</a></small>
@endsection
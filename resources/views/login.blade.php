@extends('layout')

@section('content')
 
<div class="container">
    <div class="row my-5">
    <div class="col-md-4"></div>
    <div class="col-md-4">@if(Session::get('success'))
      <div class="alert alert-success">
        {{ Session::get('success') }}
      </div>
    @endif
    
    @if(Session::get('fail'))
      <div class="alert alert-danger">
        {{ Session::get('fail') }}
      </div>
    @endif<div class="card">
      <div class="card-header">Admin Login</div><div class="card-body">
        <form action="/action" method="POST" >
          @csrf
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email_address" placeholder="Email Address" value="{{ old('email_address') }}">
        <span class="text-danger">@error('email_address')
          {{ $message }}
        @enderror</span>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
        <span class="text-danger">@error('password')
          {{ $message }}
        @enderror</span>
      </div>
     
      <button type="submit" class="btn btn-primary">Submit</button>
    </form></div></div>
        </div>
    <div class="col-md-4"></div>
</div>
</div>

@endsection


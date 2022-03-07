@extends('layout')

@section('content')
<div class="row">
    <div class="col-12"><h1>Edit Users</h1>  </div>
</div>

 
    <div class="row">
    <div class="col-md-12">
        <form action="/update_user/{{ $siteuser->id }}" method="POST" >
        @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email_address" placeholder="Email Address" value="{{ $siteuser->email_address }}" readonly>
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
   



      <div class="mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
        <input id="password" type="password" class="form-control" name="password_confirmation"  placeholder="Confirm Password">
        <span class="text-danger">@error('password_confirmation')
            {{ $message }}
          @enderror</span>
         
    </div>


   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form></div>
     
     
</div>

 

@endsection


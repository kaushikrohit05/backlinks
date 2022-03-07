@extends('layout')

@section('content')
<div class="row">
    <div class="col-12"><h1>Add Contact</h1>  </div>
</div>

 
    <div class="row">
    <div class="col-md-12">
        <form action="/save_contact" method="POST" >
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name*</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="Name" value="{{ old('name') }}">
            <span class="text-danger">@error('name')
              {{ $message }}
            @enderror</span>
          </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address*</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email_address" placeholder="Email Address" value="{{ old('email_address') }}">
      <span class="text-danger">@error('email_address')
        {{ $message }}
      @enderror</span>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Payment Email address*</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="payment_email_address" placeholder="Payment Email address" value="{{ old('payment_email_address') }}">
        <span class="text-danger">@error('payment_email_address')
          {{ $message }}
        @enderror</span>
      </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">IM</label>
      <input type="text" class="form-control" id="exampleInputPassword1" name="im" placeholder="IM"  value="{{ old('im') }}">
      <span class="text-danger">@error('im')
        {{ $message }}
      @enderror</span>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">WhatsApp</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="whatsapp" placeholder="WhatsApp"  value="{{ old('whatsapp') }}">
        <span class="text-danger">@error('whatsapp')
          {{ $message }}
        @enderror</span>
      </div>

      <div class="mb-3">
        <label  class="form-label">Notes</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="notes" rows="5">{{ old('notes') }}</textarea>
         
      </div> 

       


   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form></div>
     
     
</div>

 

@endsection


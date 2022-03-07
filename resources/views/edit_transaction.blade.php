@extends('layout')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

<div class="row">
    <div class="col-12"><h1>Add Transaction</h1>  </div>
</div>

 
    <div class="row">
    <div class="col-md-12">
        <form action="/update_transaction/{{ $transaction->id }}" method="POST" >
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Contact*</label>
            <select class="form-select" aria-label="Default select" name="contact">
                 
                @foreach ($contacts as $contact)
                <option value="{{ $contact->id }}"  @if ($contact->id==$transaction->cust_id) selected @endif >{{ $contact->customer_name }} - {{ $contact->customer_email }}</option>
                @endforeach
              </select>
            <span class="text-danger">@error('contact')
              {{ $message }}
            @enderror</span>
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Project*</label>
            <select class="form-select" aria-label="Default select" name="project">
                 
                @foreach ($projects as $project)
                <option value="{{ $project->id }}"  @if ($project->id==$transaction->proj_id) selected @endif >{{ $project->project_name }}</option>
                @endforeach
              </select>
            <span class="text-danger">@error('project')
              {{ $message }}
            @enderror</span>
          </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Transaction Date*</label>
            <input  type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   name="transaction_date" placeholder="Transaction Date" value="{{ $transaction->transaction_date }}">
            <span class="text-danger">@error('transaction_date')
              {{ $message }}
            @enderror</span>
          </div>
          
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Expiry Date*</label>
      <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="expiry_date" placeholder="Expiry Date" value="{{ $transaction->transaction_expire_date }}">
      <span class="text-danger">@error('expiry_date')
        {{ $message }}
      @enderror</span>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Price*</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="price" placeholder="Price" value="{{ $transaction->price }}">
        <span class="text-danger">@error('price')
          {{ $message }}
        @enderror</span>
      </div> 
     
     

      <div class="mb-3">
        <label  class="form-label">Notes</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="notes" rows="5">{{ $transaction->note }}</textarea>
         
      </div> 

       


   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form></div>
     
     
</div>



@endsection


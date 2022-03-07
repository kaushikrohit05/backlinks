@extends('layout')

@section('content')
<div class="row">
    <div class="col-12"><h1>Edit Project</h1>  </div>
</div>

 
    <div class="row">
    <div class="col-md-12">
        <form action="/update_project/{{ $project->id }}" method="POST" >
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Contact*</label>
            <select class="form-select" aria-label="Default select" name="contact">                 
                @foreach ($contacts as $contact)
                <option value="{{ $contact->id }}" @if ($contact->id==$project->cust_id) selected @endif>{{ $contact->customer_name }} - {{ $contact->customer_email }}</option>
                @endforeach
              </select>
            <span class="text-danger">@error('contact')
              {{ $message }}
            @enderror</span>
          </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Project Name*</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="project_name" placeholder="Project Name" value="{{ $project->project_name }}">
            <span class="text-danger">@error('project_name')
              {{ $message }}
            @enderror</span>
          </div>
          
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Project URL*</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="project_url" placeholder="Project URL" value="{{ $project->project_url }}">
      <span class="text-danger">@error('project_url')
        {{ $message }}
      @enderror</span>
    </div>
     
     
     

      <div class="mb-3">
        <label  class="form-label">Notes</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="notes" rows="5">{{ $project->note }}</textarea>
         
      </div> 

       


   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form></div>
     
     
</div>

 

@endsection


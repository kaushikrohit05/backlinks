@extends('layout')

@section('content')
<div class="row">
    <div class="col-6"><h1>Contacts</h1></div>
    <div class="col-6 text-end"><a href="/add_contact" class="btn btn btn-primary">Add</a></div>
</div>

 
    <div class="row">
    <div class="col-md-12"></div>
     
     
</div>
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Date</th>
        <th scope="col">Projects</th>
        <th scope="col">Transaction</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)           
      <tr>
        <td>{{ $contact->id }}</td>
        <td>{{ $contact->customer_name }}</td>
        <td>{{ $contact->customer_email }}</td>
        <td>{{ $contact->created_at }}</td>
        <td><a href="/contacts/projects/{{ $contact->id }}">view</a></td>
        <td><a href="/contacts/transactions/{{ $contact->id }}">view</a></td>
        <td><a href="/edit_contact/{{ $contact->id }}">Edit</a> | <a href="/delcontact/{{ $contact->id }}">Del</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
 

@endsection


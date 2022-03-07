@extends('layout')

@section('content')
<div class="row">
    <div class="col-6"><h1>Users</h1></div>
    <div class="col-6 text-end"><a href="/add_user" class="btn btn btn-primary">Add</a></div>
</div>

 
    <div class="row">
    <div class="col-md-12"></div>
     
     
</div>
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Email</th>
        <th scope="col">Date</th>
        
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($siteusers as $user)           
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->email_address }}</td>
        <td>{{ $user->created_at }}</td>
        
        <td><a href="/edit_user/{{ $user->id }}">Edit</a> | <a href="/deluser/{{ $user->id }}">Del</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
 

@endsection


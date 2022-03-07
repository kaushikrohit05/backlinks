@extends('layout')

@section('content')
<div class="row">
    <div class="col-6"><h1>Projects</h1></div>
    <div class="col-6 text-end"><a href="/add_project" class="btn btn btn-primary">Add</a></div>
</div>

 
    <div class="row">
    <div class="col-md-12"></div>
     
     
</div>
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Contact</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Date</th>
        <th scope="col">Transactions</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)           
      <tr>
        <td>{{ $project->id }}</td>
        <td>{{ $project->customer_name }}</td>
        <td>{{ $project->project_name }}</td>
        <td>{{ $project->project_url }}</td>
        <td>{{ $project->created_at }}</td>
        <td><a href="/projects/transactions/{{ $project->id }}">View</a></td>
        <td><a href="/edit_project/{{ $project->id }}">Edit</a> | <a href="/delproject/{{ $project->id }}">Del</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
 

@endsection


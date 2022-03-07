@extends('layout')

@section('content')

<div class="row">
    <div class="col-6"><h1>{{ $projects->project_name }} Transactions</h1></div>
    <div class="col-6 text-end"><a href="/add_transaction" class="btn btn btn-primary">Add</a></div>
</div>

 
    <div class="row">
    <div class="col-md-12"></div>
     
     
</div>
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Contact</th>
        <th scope="col">Project</th>
        <th scope="col">Date</th>
        <th scope="col">Expiry Date</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $transaction)           
      <tr>
        <td>{{ $transaction->id }}</td>
        <td>{{ $transaction->cust_id }}</td>
        <td>{{ $transaction->proj_id }}</td>
        <td>{{ $transaction->transaction_date }}</td>
        <td>{{ $transaction->transaction_expire_date }}</td>
        <td>{{ $transaction->created_at }}</td>
        <td><a href="/edit_transaction/{{ $transaction->id }}">Edit</a> | <a href="/deltransaction/{{ $transaction->id }}">Del</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
 

@endsection


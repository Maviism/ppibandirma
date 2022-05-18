@extends('admin.admin-template')

@section('title', 'Finance')



@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Alert!</h5>
              {{ session()->get('success') }}
            </div>
        @elseif (count($errors) > 0)
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        @endif
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Finance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Finance</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Finance</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="{{route('finance.create')}}" class="btn btn-primary">Create Transaction</a>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>Nasabah</th>
                    <th>type</th>
                    <th>Amount</th>
                    <th>Description</th>
                    @if(Auth::user()->role == "super-admin")
                    <th>Action</th>
                    @endif
                  </tr>
                  </thead>
                  <tbody>
                  @foreach( $transactions as $transaction)
                  <tr>
                    <td>{{gmdate("Y/m/d", $transaction->transaction_date) }}</td>
                    <td>{{$transaction->user->name ?? '-'}}</td>
                    <td>{{$transaction->type}}</td>
                    <td>{{$transaction->amount}}</td>
                    <td>{{$transaction->description}}</td>
                    @if(Auth::user()->role == "super-admin")
                    <td>
                      <form action="{{route('finance.destroy', $transaction)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                          <i class="fas fa-trash"></i>
                          Delete
                        </button>
                      </form>
                    </td>
                    @endif
                    
                  </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
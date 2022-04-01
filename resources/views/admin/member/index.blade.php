@extends('admin.admin-template')

@section('title', 'Member')

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
            <h1>Member</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Member</li>
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
                <h3 class="card-title">List Member</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="{{route('member.create')}}" class="btn btn-primary mb-2">Add Member</a>
                <button href="{{route('member.create')}}" class="btn btn-primary mb-2" data-toggle="modal" data-target="#importExcel">Import</button>

                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <form method="post" action="/siswa/import_excel" enctype="multipart/form-data">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                        </div>
                        <div class="modal-body">
            
                          {{ csrf_field() }}
            
                          <label>Pilih file excel</label>
                          <p>Nama, email, jurusan, goldar, hp</p>
                          <div class="form-group">
                            <input type="file" name="file" required="required">
                          </div>
            
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Modal End -->
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Fakultas-Prodi</th>
                    <th>Kedatangan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach( $users as $user)
                    <tr>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->created_at}}</td>
                      <td>{{$user->created_at}}</td>
                      <td>{{$user->created_at}}</td>
                      <td>
                        <form action="" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="" class="btn btn-warning">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                          <a href="" class="btn btn-info">
                            <i class="fas fa-eye"></i>
                          </a>
                          <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                      </td>  
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
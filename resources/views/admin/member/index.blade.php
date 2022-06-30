@extends('admin.admin-template')

@section('title', 'Member')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  
      <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Alert!</h5>
              {{ session('status') }}
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
                @if(Auth::user()->role == "super-admin")
                <button href="{{route('member.create')}}" class="btn btn-primary mb-2" disabled>Add Member</button>
                <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#importExcel">Import</button>
                <a class="btn btn-info mb-2" href="/admin/member/export">Download data</a>
                @endif

                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <form method="post" action="/admin/member/import-excel" enctype="multipart/form-data">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                        </div>
                        <div class="modal-body">
            
                          {{ csrf_field() }}

                          <p><a href="">Panduan</a> | <a href="{{ config('app.url') }}/tmplt/template_ppibandirma.xlsx" download>download template file</a></p>
                          <label>Pilih file excel</label>
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
                    <th>Email</th>
                    <th>No Hp</th>
                    <th>Balance</th>
                    <th>Prodi</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach( $users as $user)
                    <tr>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->identity->phone_number ?? '-'}}</td>
                      <td>{{$user->balance}} tl</td>
                      <td>{{$user->identity->departman ?? '-'}}</td>
                      <td>
                        @if(Auth::user()->role == "super-admin")
                          <form action="{{ route('role.update', $user)}}" method="post">
                            @csrf
                            @method('PUT')
                            <select name="role" class="form-control select2" style="width: 100%;" onchange='if(this.value != 0) { this.form.submit(); }'>
                              <option selected="selected">{{$user->role}}</option>
                              <option value="super-admin">Super-admin</option>
                              <option value="admin">Admin</option>
                              <option value="user">User</option>
                            </select>
                          </form
                        @else
                        <p> {{$user->role}} </p>
                        @endif
                      </td>
                      <td>
                        @if($user->password)
                        <button type="button" class="btn btn-sm btn-success">Aktif</button>
                        @else
                        <form action="{{ route('member.activate', $user) }}" method="POST">
                        @csrf
                          <input type="text" name="email" value="" hidden>
                          <button type="submit" class="btn btn-sm btn-danger">Nonaktif</button>
                        </form>
                        @endif
                      </td>
                      <td>
                          @if(Auth::user()->role == "super-admin")
                          <a href="/admin/member/{{$user->id}}/edit" class="btn btn-warning">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                          @endif

                          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg{{$user->id}}">
                            <i class="fas fa-eye"></i>
                          </button>
                          <div class="modal fade" id="modal-lg{{$user->id}}">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Profile {{$user->name}}</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                <form class="form-horizontal">
                                  <div class="card-body">
                                    <div class="form-group row">
                                      <label for="nama" class="col-sm-2 col-form-label">No pelajar</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" placeholder="" value="{{$user->identity->student_no}}" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" placeholder="" value="{{$user->name}}" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                      <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email" value="{{$user->email}}" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="nama" class="col-sm-2 col-form-label">No Handphone</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" placeholder="" value="{{$user->identity->phone_number ?? '-'}}" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="nama" class="col-sm-2 col-form-label">Universitas</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" placeholder="" value="{{$user->identity->university ?? '-'}}" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="nama" class="col-sm-2 col-form-label">Fakultas</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" placeholder="" value="{{$user->identity->faculty ?? '-'}}" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="nama" class="col-sm-2 col-form-label">Jurusan</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" placeholder="" value="{{$user->identity->departman ?? '-'}}" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="nama" class="col-sm-2 col-form-label">Agama</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" placeholder="" value="{{$user->identity->religion ?? '-'}}" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="nama" class="col-sm-2 col-form-label">Menikah</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" placeholder="" value="{{$user->identity->married ?? '-'}}" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="nama" class="col-sm-2 col-form-label">Alamat</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" placeholder="" value="{{$user->identity->address_tr ?? '-'}}" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="nama" class="col-sm-2 col-form-label">Goldar</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" placeholder="" value="{{$user->identity->blood_type ?? '-'}}" disabled>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="nama" class="col-sm-2 col-form-label">Tanggal lahir</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" placeholder="" value="{{$user->identity->date_of_birth ?? '-'}}" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- /.card-footer -->
                                </form>
                                </div>
                                <div class="modal-footer justify-content-end">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  @if(Auth::user()->role == "super-admin")
                                  <a type="button" href="/admin/member/{{$user->id}}/edit" class="btn btn-primary">Edit data</a>
                                  @endif
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                          <!-- /.modal -->
                          <!-- <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                          </button> -->
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
@extends('admin.admin-template')

@section('title', 'Add member')

@section('content')

<section class="content-header">
  @if($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i> Alert!</h5>
          {{ $message }}
      </div>
  @endif
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add member</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item"><a href="/admin/member">Member</a></li>
              <li class="breadcrumb-item active">Add Member</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>

    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add member</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form  action="{{route('member.store')}}" method="POST">
              @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label for="fullname">Nama lengkap<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Masukan nama lengkap">
                    </div>
                    <div class="form-group">
                      <label for="phoneNumber">No. telepon<span class="text-danger">*</span></label>
                      <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="+9055566622">
                    </div>
                    <div class="form-group">
                      <label for="email">Email<span class="text-danger">*</span></label>
                      <input type="email" required class="form-control" id="email" name="email" placeholder="example@bandirma.com">
                    </div>
                    <div class="form-group">
                      <label for="jurusan">Jurusan - Angkatan</label>
                      <input type="text" required class="form-control" id="jurusan" name="jurusan" placeholder="Teknik tiup gelembung - 2022">
                    </div>
                    
                    
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
        </div><!-- /.card -->
    </div><!-- End col -->


@endsection
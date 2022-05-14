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
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
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
                    <label for="name" class="col-sm-6 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name', 'post') is-invalid @enderror" id="name" placeholder="nama lengkap" required>
                      @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="example@gmail.com" required>
                      @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="phoneNumber" class="col-sm-2 col-form-label">No Hp</label>
                    <div class="col-sm-10">
                      <input type="text" name="phoneNumber" value="{{ old('phoneNumber') }}" class="form-control @error('phoneNumber') is-invalid @enderror" id="phoneNumber" placeholder="90123456789" required>
                      @error('phoneNumber')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  
                 
                  <div class="form-group">
                      <label>Tanggal lahir:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" required name="birthDay" value="{{ old('birthDay') }}" placeholder="dd/mm/yyyy" class="form-control datetimepicker-input @error('birthDay') is-invalid @enderror" data-target="#reservationdate"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                          </div>
                          @error('birthDay')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                    </div>
                  <div class="form-group row">
                    
                    <div class="custom-control custom-radio mx-2">
                      <input class="custom-control-input custom-control-input-dark custom-control-input-outline " type="radio" value="belum" id="marriedRadio5" name="married" checked>
                      <label for="marriedRadio5" class="custom-control-label">Belum Menikah</label>
                    </div>
                    <div class="custom-control custom-radio ">
                      <input class="custom-control-input custom-control-input-info" type="radio" id="marriedRadio4" value="sudah" name="married" >
                      <label for="marriedRadio4" class="custom-control-label">Sudah Menikah</label>
                    </div>
                    
                  </div>
                 
                  <div class="form-group row">
                    <div class="custom-control custom-radio mx-2">
                      <input class="custom-control-input custom-control-input-primary" type="radio" id="genderRadio1" value="laki" name="gender" checked>
                      <label for="genderRadio1" class="custom-control-label">Laki-laki</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input custom-control-input-danger custom-control-input-outline" type="radio" value="perempuan" id="genderRadio2" name="gender">
                      <label for="genderRadio2" class="custom-control-label">Perempuan</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="religion" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                      <input type="text" required value="{{ old('religion') }}" name="religion" class="form-control" id="religion" placeholder=""  >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <input type="text" required name="address" value="{{ old('address') }}" class="form-control" id="address" placeholder="Ataturk cadesi apart no 0" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="bloodType" class="col-sm-2 col-form-label">Goldar</label>
                    <div class="col-sm-10">
                      <input type="text" required name="bloodType" class="form-control" value="{{ old('bloodType') }}" id="bloodType" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="student_no" class="col-sm-4 col-form-label">No pelajar</label>
                    <div class="col-sm-10">
                      <input type="number" name="student_no" class="form-control @error('student_no', 'post') is-invalid @enderror" id="student_no" placeholder="000000000" value="{{ old('student_no') }}" required>
                      @error('student_no')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group mb-2 ml-1 align-items-center">
                    <!-- select -->
                    <label for="university">Tahun kedatangan</label>
                    <select class="form-control " name="arrivalYear" id="arrival">
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2019">2020</option>
                      <option value="2019">2021</option>
                      <option value="2019">2022</option>
                    </select>
                  </div>
                  <div class="form-group mb-2 ml-1 align-items-center">
                    <!-- select -->
                    <label for="university">Universitas</label>
                    <select class="form-control" name="university" id="university">
                      <option value="Bandirma onyedi eylul University">Bandirma onyedi eylul University</option>
                      <option value="Çanakale Univesity">Çanakale Univesity</option>
                    </select>
                    
                  </div>
                  
                  <div class="form-group">
                    <label for="faculty" class="col-sm-2 col-form-label">Fakultas</label>
                    <div class="col-sm-10">
                      <input type="text" required name="faculty" class="form-control @error('name', 'post') is-invalid @enderror" id="faculty" value="{{ old('faculty') }}" placeholder="Ömer seyfetin">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="departman" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10">
                      <input type="text" required name="departman" class="form-control @error('name', 'post') is-invalid @enderror" value="{{ old('departman') }}" id="departman" placeholder="türkçe?"  >
                    </div>
                  </div>
                  
                </div>
                  <!-- /.card-body -->
  
                <div class="card-footer ">
                  <a href="/admin/member" class="btn btn-secondary">cancel</a>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div><!-- /.card -->
    </div><!-- End col -->


@endsection
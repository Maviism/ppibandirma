@extends('admin.admin-template')

@section('title', 'Create Transaction')

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
            <h1>Create Event</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item"><a href="/admin/event">Finance</a></li>
              <li class="breadcrumb-item active">Create Transaction</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>

    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Transaction</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form  action="{{route('finance.store')}}" method="POST">
              @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="amount">Amount <span class="text-danger">*</span></label>
                      <input type="number" class="form-control" id="amount" name="amount" placeholder="Masukan jumlah uang" required>
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <input type="text" class="form-control" id="description" name="description" placeholder="Masukan deskripsi">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status1" class="form-control">
                          <option value="debit" >Debit</option>
                          <option value="kredit" >Kredit</option>
                        </select>
                      </div>
                    <div class="form-group">
                        <label>Date <span class="text-danger">*</span></label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input required type="text" name="date1" class="form-control datetimepicker-input" placeholder="mm/dd/yy" data-target="#reservationdate"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
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
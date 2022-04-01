@extends('admin.admin-template')

@section('title', 'Create Event')

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
              <li class="breadcrumb-item"><a href="/admin/event">Event</a></li>
              <li class="breadcrumb-item active">Create Event</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>

    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Event</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form  action="{{route('event.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label for="eventName">Nama acara</label>
                        <input type="text" class="form-control" value="{{$event->event_name}}" id="eventName" name="eventName" placeholder="Masukan nama acara">
                    </div>
                    <div class="form-group">
                      <label for="eventPlace">Tempat acara</label>
                      <input type="text" class="form-control" id="eventPlace" name="eventPlace" placeholder="Masukan tempat acara" value="{{$event->event_place}}">
                    </div>
                    <!-- Date and time range -->
                    <div class="form-group">
                      <label>Tanggal dan waktu acara:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-clock"></i></span>
                        </div>
                        <input type="text" name="eventDate" class="form-control float-right" id="reservationtime" value="{{$event->date}}">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <div class="form-group">
                      <label for="image">Poster acara</label>
                      <input type="file" class="form-control" id="image" name="image" placeholder="masukan gambar" >
                      <br>
                      <img src="" id="preview">
                    </div>
                    <div class="form-group">
                        <label for="eventDescription">Deskripsi acara</label>
                        <div class="card-body">
                          <textarea name="description" id="summernote">
                            {{$event->description}}
                          </textarea>
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
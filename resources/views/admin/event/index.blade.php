@extends('admin.admin-template')

@section('title', 'Event')



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
            <h1>Event</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Event</li>
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
                <h3 class="card-title">List event</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="{{route('event.create')}}" class="btn btn-primary">Create Event</a>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Event Name</th>
                    <th>Place</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach( $events as $event)
                  <tr>
                    <td>{{$event->event_name}}</td>
                    <td>{{$event->place}}</td>
                    <td>{{$event->dateFormat()}}</td>
                    <td>
                      <form action="{{route('event.destroy', $event)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="/admin/event/{{$event->id}}/edit" class="btn btn-warning">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info-{{$event->id}}">
                            <i class="fas fa-eye"></i>
                        </button>
                        <div class="modal fade" id="modal-info-{{$event->id}}">
                          <div class="modal-dialog">
                            <div class="modal-content bg-info">
                              <div class="modal-header">
                                <h4 class="modal-title">{{ $event->event_name}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              <div class="card-body">
                                <div class="form-group">
                                    <label for="eventName">Nama acara</label>
                                    <input disabled type="text" class="form-control" value="{{$event->event_name}}" id="eventName" name="eventName" placeholder="Masukan nama acara">
                                </div>
                                <div class="form-group">
                                  <label for="eventPlace">Tempat acara</label>
                                  <input disabled type="text" class="form-control" id="eventPlace" name="eventPlace" placeholder="Masukan tempat acara" value="{{$event->place}}">
                                </div>
                                <div class="form-group">
                                  <label>Date and time:</label>
                                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                        <input disabled type="text" name="eventDate" value="{{$event->date}}" placeholder="dd-mm-yyyy 00:00" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <img src="/storage/event/{{$event->thumbnail}}" id="preview" width="200">
                                </div>
                                <div class="form-group">
                                    <label for="eventDescription">Deskripsi acara</label>
                                    <div class="card-body">
                                      <p>{!! $event->description !!}</p>
                                    </div>
                                  </div>
                              </div>
                              <!-- /.card-body -->
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        @if(Auth::user()->role == "super-admin")
                        <button type="submit" class="btn btn-danger">
                          <i class="fas fa-trash"></i>
                        </button>
                        @endif
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
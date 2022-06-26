<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> @yield('title') | PPI Bandirma</title>

  <!-- Icon -->
  <link rel="shortcut icon" href="/logo.png" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/lte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/lte/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/lte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/lte/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/lte/plugins/summernote/summernote-bs4.min.css">  
  <!-- DataTables -->
  <link rel="stylesheet" href="/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">

    <!-- Navbar -->
    @include('admin.partials.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('admin.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
      @yield('content')
    </div>
    <!-- /.content-wrapper -->
    @include('admin.partials.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

<!-- jQuery -->
<script src="/lte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/lte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/lte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/lte/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/lte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/lte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/lte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/lte/plugins/moment/moment.min.js"></script>
<script src="/lte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/lte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/lte/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/lte/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/lte/dist/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="/lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/lte/plugins/jszip/jszip.min.js"></script>
<script src="/lte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/lte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    
    //Date and time picker
    $('#reservationdatetime').datetimepicker({ 
      icons: { time: 'far fa-clock' },
      format: 'DD/MM/YYYY HH:mm', 
    });
    
  });
  // Summernote
  $('#summernote').summernote({
    height: 300,
    toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
      ],
  })

  function readURL(input){
    if(input.files && input.files[0]){
      const reader = new FileReader();

      reader.onload = function(e){
        $('#preview').attr('src', e.target.result);
        $('#preview').attr('width', '20%');
        $('#preview').attr('height', '20%');
      }
      reader.readAsDataURL(input.files[0])
    }
  }

  $('#image').change(function(){
    readURL(this)
  });

  $('#reservationdate').datetimepicker({
        format: 'L'
    });
</script>


</body>
</html>

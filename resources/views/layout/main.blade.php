<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo2.png" rel="icon">
  <title>Iqralabs - CMS</title>
  <link href="{{ URL::asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ URL::asset('css/ruang-admin.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>
      
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->

      <script src="{{ URL::asset('vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{ URL::asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
      <script src="{{ URL::asset('js/ruang-admin.min.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
      <!--ck editor-->
      <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
      <script src="{{ URL::asset('js/description.js')}}"></script>
      <!--end-->

      <!-- Page level plugins -->
      <script src="{{ URL::asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
      <script src="{{ URL::asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

      <!-- Page level custom scripts -->
      <script>
        $(document).ready(function () {
          $('#dataTable').DataTable(); // ID From dataTable 
          $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
      </script>
       <script type="text/javascript">
        $(function() {
           $('#CalendarDateTime').datetimepicker();
        });
    </script>    
</html>
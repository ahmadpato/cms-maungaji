@extends('layout.main')

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    @include('layout.sidebar')
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        @include('layout.navbar')
        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Partner</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</a></li>
              <li class="breadcrumb-item">Partner</li>
              <li class="breadcrumb-item active" aria-current="page">Iqralabs Partner</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header">
                  @if(Session::has('flash_message'))
                  <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
                  @endif
                  <a href="/partner/create" class="btn btn-success"><i class="fas fa fa-plus-circle nav-icon"></i> Add Partner </a>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Image</th>
                      <th>Partner Link</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($partner as $index => $list)
                    <?php

                      //remove html tag first
                      $description = strip_tags($list->description);
                      
                    ?>    
                    <tr>
                      <td>{{ $index +1 }}</td>
                      <?php if($list->photo == '') : ?>
                        <td><img src="../../images/image_not_found.png" width="100%" height="auto"></td>
                      <?php else : ?>
                        <td><img src="/images/{{ $list->photo }}" width="100%" height="auto"></td>
                      <?php endif; ?>
                      <td>{{ $list->url }}</td>
                      <?php if($list->description == '') : ?>
                        <td>-</td>
                      <?php else : ?>
                        <td>{{ $description }}</td>
                      <?php endif; ?>
                      <td width="100">
                        <a href="/partner/edit/{{ $list->id }}"
                            class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Edit</a>
                            <br>
                            <br>
                        <a href="/partner/destroy/{{ $list->id }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

          <!-- Documentation Link -->
          <div class="row">
            <div class="col-lg-12">
              
            </div>
          </div>

           <!-- Modal Logout -->
           @include('layout.modal_logout')
           <!--end-->

        </div>
        <!---Container Fluid-->
      </div>
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

</body>


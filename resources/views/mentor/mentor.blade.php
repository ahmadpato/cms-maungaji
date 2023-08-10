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
            <h1 class="h3 mb-0 text-gray-800">Mentor</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</a></li>
              <li class="breadcrumb-item">Mentor</li>
              <li class="breadcrumb-item active" aria-current="page">Mentor List</li>
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
                  {{-- <a href="/mentor/export_excel" class="btn btn-success"><i class="fa fa-download"></i> Download </a> --}}
                  <a href="/mentor/add" class="btn btn-success"><i class="fas fa fa-plus-circle nav-icon"></i> Add Mentor </a>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Certified Number</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Experience</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    @foreach($user as $index => $list)  
                    <?php
                    $experience = strip_tags($list->experience);
                    ?>
                    <tr>
                      <td>{{ $index +1 }}</td>
                      <td>{{ $list->no_certified }}</td>
                      <td>{{ $list->fullname }} </a></td>
                      <?php if($list->photo == '') : ?>
                        <td><img src="../../images/image_not_found.png" width="100%" height="auto"></td>
                      <?php else : ?>
                        <td><img src="/images/{{ $list->photo }}" width="100%" height="auto"></td>
                      <?php endif; ?>
                      <td>{{ $experience }}</td>
                      <td width="500">
                          <a href="/mentor/edit/{{ $list->id }}"
                          class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Edit</a>
                          <br>
                          <br>
                          <a href="/mentor/destroy/{{ $list->id }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

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

</body>

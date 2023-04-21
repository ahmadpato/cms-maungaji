@extends('layout.main')

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    @include('layout.sidebar')
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        
        @include('layout.navbar')

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Price</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</a></li>
              <li class="breadcrumb-item">Price</li>
              <li class="breadcrumb-item active" aria-current="page">Price List</li>
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
                  <a href="/price/create" class="btn btn-success"><i class="fas fa fa-plus-circle nav-icon"></i> Add Price </a>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Package Name</th>
                      <th>Price (Rp)</th>
                      <th>Class Type</th>
                      <th>Session Type</th>
                      <th>Service Type</th>
                      <th>Icon Service Online</th>
                      <th>Icon Service Home Visit</th>
                      <th>Icon Service Learning Center</th>
                      <th>Max Student</th>
                      <th>Learning Duration</th>
                      <th>Desctiption</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($price as $index => $list)
                    <?php

                      //remove html tag first
                      $description = strip_tags($list->description);
                      
                    ?>    
                    <tr>
                      <td>{{ $index +1 }}</td>
                      <td>{{ $list->package_name }}</td>
                      <?php
                      $num = $list->price ; 
                      if($list->service_type == 'home_visit'){
                        $service_type = 'home visit';
                      } elseif ($list->service_type == 'learning_center') {
                        $service_type = 'learning center';
                      } else {
                        $service_type = 'online';
                      }
                      ?>
                      <td>Rp <?php echo number_format($num, 0, ",", ".") ; ?></td>
                      <td>{{ $list->class_type }}</td>
                      <td>{{ $list->session_type }}</td>
                      <td>{{ $service_type }}</td>
                      <?php if($list->photo == '') : ?>
                        <td><img src="../../images/image_not_found.png" width="100%" height="auto"></td>
                      <?php else : ?>
                        <td><img src="/images/{{ $list->photo }}" width="100%" height="auto"></td>
                      <?php endif; ?>
                      <?php if($list->photo_home_visit == '') : ?>
                        <td><img src="../../images/image_not_found.png" width="100%" height="auto"></td>
                      <?php else : ?>
                        <td><img src="/images/{{ $list->photo_home_visit }}" width="100%" height="auto"></td>
                      <?php endif; ?>
                      <?php if($list->photo_learning_center == '') : ?>
                        <td><img src="../../images/image_not_found.png" width="100%" height="auto"></td>
                      <?php else : ?>
                        <td><img src="/images/{{ $list->photo_learning_center }}" width="100%" height="auto"></td>
                      <?php endif; ?>
                      <td>{{ $list->max_student }}</td>
                      <td>{{ $list->learning_duration }}</td>
                      <?php if($list->description == '') : ?>
                        <td>-</td>
                      <?php else : ?>
                        <td>{{ $description }}</td>
                      <?php endif; ?>
                      <td width="100">
                        <a href="/price/edit/{{ $list->id }}"
                            class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Edit</a>
                            <br>
                            <br>
                        <a href="/price/destroy/{{ $list->id }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
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

</body>


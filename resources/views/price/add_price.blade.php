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
            <h1 class="h3 mb-0 text-gray-800">Add Price</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</a></li>
              <li class="breadcrumb-item">Price</li>
              <li class="breadcrumb-item active" aria-current="page">Add Price</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                </div>
                @if ($message = Session::get('failed'))
                  <div class="alert alert-danger" role="alert">
                  {{ $message }}
                  </div>
                @endif
                <div class="card-body">
                <form action="/price/store" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <label for="package_name">Package Name</label>
                    <select class="form-control" id="package_name" name="package_name" required="required">
                        <option value="personal">Personal</option>
                        <option value="family">Family</option>
                        <option value="group">Group</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="">Price (Rp)</label>
                    <input type="number" class="form-control" step="any" name="price" required="required">
                    </div>
                    <div class="form-group">
                        <label for="class_type">Class Type</label>
                        <select class="form-control" id="class_type" name="class_type" required="required">
                            <option value="offline">Offline</option>
                            <option value="online">Online</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="session_type">Session Type</label>
                      <select class="form-control" id="class_type" name="session_type" required="required">
                          <option value="meeting">Metting</option>
                          <option value="monthly">Monthly</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="service_type">Service Type</label>
                      <select class="form-control" id="class_type" name="service_type" required="required">
                          <option value="online">Online</option>
                          <option value="home_visit">Home Visit</option>
                          <option value="learning_center">Learning Center</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="image">Icon Service Online</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="form-control" id="image" name="image">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="image_home_visit">Icon Service Home Visits</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="form-control" id="image_home_visit" name="image_home_visit">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="image_learning_center">Icon Service Learning Center</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="form-control" id="image_learning_center" name="image_learning_center">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="">Max Student</label>
                        <input type="number" class="form-control" name="max_student" required="required">
                    </div>
                    <div class="form-group">
                        <label for="">Learning Duration (minutes)</label>
                        <input type="number" class="form-control" name="learning_duration" required="required">
                    </div>
                    <div class="form-group">
                      <label for="">Description</label>
                      <textarea id="description" class="form-control" name="description" rows="10" cols="50" required></textarea>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ URL::previous() }}" class="btn btn-success">Back</a>
                    </div>
                </form>
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

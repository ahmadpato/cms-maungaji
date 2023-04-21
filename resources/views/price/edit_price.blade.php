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
            <h1 class="h3 mb-0 text-gray-800">Edit Price</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</a></li>
              <li class="breadcrumb-item">Price</li>
              <li class="breadcrumb-item active" aria-current="page">Edit Price</li>
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
                @foreach($price as $list)
                  <form action="/price/update" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <input type="hidden" name="id" value="{{ $list->id }}"> <br/>
                  <div class="form-group">
                    <label for="package_name">Package Name</label>
                    <select class="form-control" id="package_name" name="package_name" required="required">
                        <option value="personal" {{ $list->package_name == "personal" ? 'selected' : ''}}>Personal</option>
                        <option value="family"  {{  $list->package_name == "family" ? 'selected' : ''}}>Family</option>
                        <option value="group" {{  $list->package_name == "group" ? 'selected' : ''}}>Group</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="">Price (Rp)</label>
                    <input type="number" class="form-control" name="price" value="{{ $list->price }}" required="required">
                    </div>
                    <div class="form-group">
                        <label for="class_type">Class Type</label>
                        <select class="form-control" id="class_type" name="class_type" required="required">
                            <option value="offline" {{ $list->class_type == "offline" ? 'selected' : ''}}>Offline</option>
                            <option value="online" {{ $list->class_type == "online" ? 'selected' : ''}}>Online</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="session_type">Class Type</label>
                      <select class="form-control" id="session_type" name="session_type" required="required">
                          <option value="meeting" {{ $list->session_type == "meeting" ? 'selected' : ''}}>Meeting</option>
                          <option value="monthly" {{ $list->session_type == "monthly" ? 'selected' : ''}}>Monthly</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="service_type">Service Type</label>
                      <select class="form-control" id="session_type" name="service_type" required="required">
                          <option value="online" {{ $list->service_type == "online" ? 'selected' : ''}}>Online</option>
                          <option value="home_visit" {{ $list->service_type == "home_visit" ? 'selected' : ''}}>Home Visit</option>
                          <option value="learning_center" {{ $list->service_type == "learning_center" ? 'selected' : ''}}>Learning Center</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="image">Icon Service Online</label>
                      <div class="input-group">
                        <div class="col-md-12">
                          <img src="/images/{{ $list->photo }}" id="image" name="image" height="100" width="100">
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image"/> 
                          <input type="hidden" name="image" value="{{ $list->photo }}" /> 
                          <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="image_home_visit">Icon Service Home Visit</label>
                      <div class="input-group">
                        <div class="col-md-12">
                          <img src="/images/{{ $list->photo_home_visit }}" id="image_home_visit" name="image_home_visit" height="100" width="100">
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image_home_visit"/> 
                          <input type="hidden" name="image_home_visit" value="{{ $list->photo_home_visit }}" /> 
                          <label class="custom-file-label" for="image_home_visit">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="image_learning_center">Icon Service Learning Center</label>
                      <div class="input-group">
                        <div class="col-md-12">
                          <img src="/images/{{ $list->photo_learning_center }}" id="image_learning_center" name="image_learning_center" height="100" width="100">
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image_learning_center"/> 
                          <input type="hidden" name="image_learning_center" value="{{ $list->photo_learning_center }}" /> 
                          <label class="custom-file-label" for="image_learning_center">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="">Max Student</label>
                        <input type="number" class="form-control" name="max_student" value="{{ $list->max_student }}" required="required">
                    </div>
                    <div class="form-group">
                        <label for="">Learning Duration (minutes)</label>
                        <input type="number" class="form-control" name="learning_duration" value="{{ $list->learning_duration }}" required="required">
                    </div>
                    <div class="form-group">
                      <label for="">Description</label>
                      <textarea id="description" class="form-control" value="description" id="description" rows="3" name="description" required="required">{{$list->description}}</textarea>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ URL::previous() }}" class="btn btn-success">Back</a>
                    </div>
                  </form>
                  @endforeach
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
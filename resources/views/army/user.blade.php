@extends('layout.main')

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <img src="img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">Maungaji</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">

      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-comment"></i>
          <span>Testimoni</span>
        </a>
        <div id="collapseTable" class="collapse show" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item active" href="/testimoni">User Testimoni</a>
          </div>
        </div>
      </li>

      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-user"></i>
          <span>Army</span>
        </a>
        <div id="collapseTable" class="collapse show" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item active" href="/user">Army List</a>
          </div>
        </div>
      </li>
    
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-money-bill-alt"></i>
          <span>Price & Package</span>
        </a>
        <div id="collapseTable" class="collapse show" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item active" href="/price">Price & Package List</a>
          </div>
        </div>
      </li>

      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-question-circle"></i>
          <span>Faq</span>
        </a>
        <div id="collapseTable" class="collapse show" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item active" href="/faq">Faq List</a>
          </div>
        </div>
      </li>
      
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        @include('layout.navbar')
        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Army</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</a></li>
              <li class="breadcrumb-item">Army</li>
              <li class="breadcrumb-item active" aria-current="page">Army List</li>
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
                  <a href="/user/export_excel" class="btn btn-success"><i class="fa fa-download"></i> Download </a>
                  <a href="/user/add" class="btn btn-success"><i class="fas fa fa-plus-circle nav-icon"></i> Add Army </a>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Identity Number</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Photo</th>
                        <th>Agent Code</th>
                        <th>Referal Code</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    @foreach($user as $index => $list)  
                    <tr>
                      <td>{{ $index +1 }}</td>
                      <td>{{ $list->no_identity }}</td>
                      <td><a href="#" data-toggle="modal" id="detail-army" data-target="#detailModal{{ $list->id }}"> {{ $list->fullname }} </a></td>
                      <td>{{ $list->email }}</td>
                      <td>{{ $list->phone_number }}</td>
                      <?php if($list->photo == '') : ?>
                        <td><img src="../../images/image_not_found.png" width="100%" height="auto"></td>
                      <?php else : ?>
                        <td><img src="/images/{{ $list->photo }}" width="100%" height="auto"></td>
                      <?php endif; ?>
                      <?php if($list->agent_code == '') : ?>
                        <td>-</td>
                      <?php else : ?>
                        <td>{{ $list->agent_code }}</td>
                      <?php endif; ?>
                      <?php if($list->referal_code == '') : ?>
                        <td>-</td>
                      <?php else : ?>
                        <td>{{ $list->referal_code }}</td>
                      <?php endif; ?>
                      <td>{{ $list->address }}</td>
                      <td>{{ $list->status }}</td>
                      <td width="500">
                          <a href="/user/edit/{{ $list->id }}"
                          class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Edit</a>
                          <br>
                          <br>
                          <a href="/user/delete/{{ $list->id }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                   
                    <!-- Modal Detail -->
                    <div class="modal fade" id="detailModal{{ $list->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelDetail"
                      aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header" style="background: #3597D4;">
                            <h5 class="modal-title" id="exampleModalLabelLogout">
                            <?php if($list->photo): ?>
                              <div class="text-left">
                              <img src="/images/{{ $list->photo }}" style="width: 200px; height: 200px; background-size: cover !important; background-position: center !important;border-radius: 250px;">
                              </div>
                            <?php endif; ?>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="col-md-12">
                            <div class="modal-body">
                              <div class="col-md-6" style="margin-top: 20px">
                                  <p style="text-align:justify;font-family: Poppins;font-style: normal;font-size: 15px;line-height: 26px;color: #263238;">
                                      Identity Number : <b>{{ $list->no_identity }}</b>
                                  </p>
                                  <p style="text-align:justify;font-family: Poppins;font-style: normal;font-size: 15px;line-height: 26px;color: #263238;">
                                      Name : <b>{{ $list->fullname }}</b>
                                  </p>
                                  <p style="text-align:justify;font-family: Poppins;font-style: normal;font-size: 15px;line-height: 26px;color: #263238;">
                                      Email : <b>{{ $list->email }}</b>
                                  </p>
                                  <p style="text-align:justify;font-family: Poppins;font-style: normal;font-size: 15px;line-height: 26px;color: #263238;">
                                      Phone Number : <b>{{ $list->phone_number }}</b>
                                  </p>
                              </div>
                              <div class="col-md-6" style="margin-top: 20px">
                                  <p style="text-align:justify;font-family: Poppins;font-style: normal;font-size: 15px;line-height: 26px;color: #263238;">
                                      Agent Code : <b>{{ $list->agent_code }}</b>
                                  </p>
                                  <p style="text-align:justify;font-family: Poppins;font-style: normal;font-size: 15px;line-height: 26px;color: #263238;">
                                      Referal Code : <b>{{ $list->referal_code }}</b>
                                  </p>
                                  <p style="text-align:justify;font-family: Poppins;font-style: normal;font-size: 15px;line-height: 26px;color: #263238;">
                                      Address : <b>{{ $list->address }}</b>
                                  </p>
                              </div>
                            </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="/logout" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

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

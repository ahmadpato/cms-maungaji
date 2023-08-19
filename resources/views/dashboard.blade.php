@extends('layout.main')

<body id="page-top">
  <style>
  .card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #1baa69;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }
  </style>
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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
              <div class="col-md-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <div class="container">
                      <div class="row">
                
                        <div class="col-md-3">
                          <div class="card-counter">
                            <i class="fa fa-database"></i>
                            @foreach ($count2020 as $data)
                            <?php
                            $session2020 = $data;
                            ?>
                            @endforeach
                            <span class="count-numbers">{{ $session2020 }}</span>
                            <span class="count-name"> Session 2020</span>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="card-counter info">
                            <i class="fa fa-database"></i>
                            @foreach ($count2021 as $data)
                            <?php
                            $session2021 = $data;
                            ?>
                            @endforeach
                            <span class="count-numbers">{{ $session2021 }}</span>
                            <span class="count-name"> Session 2021</span>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="card-counter primary">
                            <i class="fa fa-database"></i>
                            @foreach ($count2022 as $data)
                            <?php
                            $session2022 = $data;
                            ?>
                            @endforeach
                            <span class="count-numbers text-center">{{ $session2022 }}</span>
                            <span class="count-name"> Session 2022</span>
                          </div>
                        </div>    
                        
                        <div class="col-md-3">
                          <div class="card-counter success">
                            <i class="fa fa-database"></i>
                            @foreach ($countall as $data)
                            <?php
                            $sessionall = $data;
                            ?>
                            @endforeach
                            <span class="count-numbers text-center">{{ $sessionall }}</span>
                            <span class="count-name">Total All Session</span>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-12">
                <p id="countreportyear">
                </p>
              </div>

              <div class="col-lg-12">
                <p id="countreport">
                </p>
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
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">

    var dashboardyear2022 = JSON.parse(`<?php echo $dashboardyear2022 ?>`);

    var dashboardyear2021 = JSON.parse(`<?php echo $dashboardyear2021 ?>`);

    var dashboardyear2020 = JSON.parse(`<?php echo $dashboardyear2020 ?>`);
  
    //year
    Highcharts.chart('countreportyear', {
      chart: {
          type: 'column',
          width: 1200
      },
      title: {
          text: 'Number of session in a year'
      },
      subtitle: {
          text: 'Source: Report'
      },
      xAxis: {
          categories: [
          ],
          crosshair: true
      },
      yAxis: {
          min: 0,
          title: {
              text: 'session'
          }
      },
      tooltip: {
          footerFormat: '</table>',
          shared: true,
          useHTML: true
      },
      plotOptions: {
          column: {
              pointPadding: 0.2,
              borderWidth: 0
          }
      },
      series: [{
        name: '2020',
        data: [dashboardyear2020]
        },
        {
          name: '2021',
          data: [dashboardyear2021]
        },
        {
          name: '2022',
          data: [dashboardyear2022]
        }]
    });

    var dashboard2022 = JSON.parse(`<?php echo $dashboard2022 ?>`);
    
    var dashboard2021 = JSON.parse(`<?php echo $dashboard2021 ?>`);

    var dashboard2020 = JSON.parse(`<?php echo $dashboard2020 ?>`);

    //month
    Highcharts.chart('countreport', {
      chart: {
          type: 'column',
          width: 1200
      },
      title: {
          text: 'Number of session in a month'
      },
      subtitle: {
          text: 'Source: Report'
      },
      xAxis: {
          categories: [
              'Jan',
              'Feb',
              'Mar',
              'Apr',
              'May',
              'Jun',
              'Jul',
              'Aug',
              'Sep',
              'Oct',
              'Nov',
              'Dec'
          ],
          crosshair: true
      },
      yAxis: {
          min: 0,
          title: {
              text: 'session'
          }
      },
      tooltip: {
          footerFormat: '</table>',
          shared: true,
          useHTML: true
      },
      plotOptions: {
          column: {
              pointPadding: 0.2,
              borderWidth: 0
          }
      },
      series: [{name: '2020',
              data: [
              '',
              '',
              '',
              '',
              '',
              dashboard2020[0].count, 
              dashboard2020[1].count, 
              dashboard2020[2].count, 
              dashboard2020[3].count, 
              dashboard2020[4].count, 
              dashboard2020[5].count,
              dashboard2020[6].count]
              },{
              name: '2021',
              data: [dashboard2021[0].count, 
              dashboard2021[1].count, 
              dashboard2021[2].count, 
              dashboard2021[3].count, 
              dashboard2021[4].count, 
              dashboard2021[5].count,
              dashboard2021[6].count,
              dashboard2021[7].count,
              dashboard2021[8].count,
              dashboard2021[9].count,
              dashboard2021[10].count,
              dashboard2021[11].count]
            },{
              name: '2022',
              data: [dashboard2022[0].count, 
              dashboard2022[1].count, 
              dashboard2022[2].count, 
              dashboard2022[3].count, 
              dashboard2022[4].count, 
              dashboard2022[5].count,
              dashboard2022[6].count]
            }]
    });

</script>


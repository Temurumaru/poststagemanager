@php
  use RedBeanPHP\R as R;

  $date = [];
  $uzb_count = [];
  $cli_count = [];
  $i = 0;
  $m_sum = 0;
  $m_cli_sum = 0;
  while($i != 30) {

    $sum = 0;
    $cli_sum = 0;
    
    $tm = date("Y-m-d", strtotime('-'.$i.' day', time()));

    $posts = R::findAll("posts");

    foreach ($posts as $val) {
      $dt = explode(" ", $val -> uzbekistan_date);
      if($dt[0] == $tm) {
        $sum++;
      }

      $dt2 = explode(" ", $val -> client_date);
      if($dt2[0] == $tm) {
        $cli_sum++;
      }
    }

    $date[] = (string)$tm;
    $uzb_count[] = $sum;
    $cli_count[] = $cli_sum;

    $m_sum += $sum;
    $m_cli_sum += $cli_sum;

    $i++;
  }

  $dates = "['" . implode("', '", array_reverse($date)) . "']";
  $uc = '[' . implode(', ', array_reverse($uzb_count)) . ']';
  $cc = '[' . implode(', ', array_reverse($cli_count)) . ']';


@endphp


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body class="toggle-sidebar">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/admin" class="logo d-flex align-items-center">
        <img  src="assets/img/abduganiev.png" alt="">
      </a>
      @include('blocks.notification')
    </div><!-- End Logo -->
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Asosiy sahifa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="/admin">Asosiy sahifa</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        
        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Yukni topish:</h5>

              <div class="row mb-3">
                <div class="col-sm-10">
                  <input type="text" id="search" placeholder="ID & F.I.O & Tel" class="form-control">
                </div>
                <button id="search_client" type="button" class="col-sm-2 btn btn-primary mt-2 mt-md-0">
                  <i class="bi bi-search"></i>  
                </button>
              </div>

            </div>
          </div><!-- End Recent Activity -->

          <!-- Recent Activity -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Yukni Omborxonaga kelganni tasdiqlash:</h5>

              <div class="row mb-3">
                <div class="col-sm-10">
                  <input type="text" id="track_no" placeholder="Track №" class="form-control">
                </div>
                <button id="track_no_change" type="button" class="col-sm-2 btn btn-primary mt-2 mt-md-0">
                  <i class="bi bi-search"></i>  
                </button>
              </div>

            </div>
          </div><!-- End Recent Activity -->

          <!-- Recent Activity -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Yangi Mijoz qo'shish:</h5>

              <form method="POST" action="{{route('CreateClient')}}" class="row mb-3 justify-content-center">
                @csrf
                <div class="col-sm-12 mb-3">
                  <input type="text" placeholder="F.I.O" name="fio" minlength="4" maxlength="50" class="form-control" required>
                </div>
                <div class="col-sm-12 mb-3">
                  <input type="text" placeholder="Tel.raqam" name="phone" minlength="4" maxlength="50" class="form-control" required>
                </div>
                <div class="col-sm-12 mb-3">
                  <input type="text" placeholder="ID ruchnoy 14S" name="clid" minlength="2" maxlength="50" class="form-control" required>
                </div>
                <button type="submit"  class="col-sm-4 btn btn-primary btn-large">Yaratish </button>
              </form>

            </div>
          </div><!-- End Recent Activity -->

          <!-- Budget Report -->
          <div class="card">
           

          
          </div><!-- End Budget Report -->

          <!-- Website Traffic -->
          <div class="card">
           

            <div class="card-body pb-5">
              <h5 class="card-title">Kunlik statistika:</h5>

              <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Omborxonaga kirib kelgan yuklar:
                  <span class="badge bg-primary rounded-pill"> {{$m_sum}} ta</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Mijozga berilgan yuklar:
                  <span class="badge bg-primary rounded-pill"> {{$m_cli_sum}} ta</span>
                </li>
               
              </ul>

               <!-- Bar Chart -->
               <canvas id="line-chart" width="800" height="450"></canvas>
              
               <!-- End Bar CHart -->

            </div>
          </div><!-- End Website Traffic -->

          

        </div><!-- End Right side columns -->


        <!-- Left side columns -->
        <div class="col-lg-8  d-flex flex-column align-items-center justify-content-between">
          <div class="row w-100">
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                {{-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div> --}}

                <div class="card-body">
                  <h5 class="card-title">Klientlar<span></span></h5>
                  {{-- <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">F.I.O</th>
                        <th scope="col">Tel.raqam</th>
                        <th scope="col">O’zgartirish</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">14S777</th>
                        <td>Otabek</td>
                        <td>+998998070708</td>
                        <td>
                          <button type="button" class="btn btn-info"><i class="ri-pencil-line"></i></button>
                          <a href="./profil-person.html"  class="btn btn-success"><i class="bi bi-info-circle"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">14S888</th>
                        <td>Temur</td>
                        <td>+9989971234567</td>
                        <td>
                          <button type="button" class="btn btn-info"><i class="ri-pencil-line"></i></button>
                          <a href="./profil-person.html"  class="btn btn-success"><i class="bi bi-info-circle"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">14SNO-ID</th>
                        <td>NO-ID</td>
                        <td>+998997777777</td>
                        <td>
                          <button type="button" class="btn btn-info"><i class="ri-pencil-line"></i></button>
                          <a href="./profil-person.html"  class="btn btn-success"><i class="bi bi-info-circle"></i></a>

                        </td>
                      </tr>
                      <tr>
                        <th scope="row">14S888</th>
                        <td>MARSS TEAM</td>
                        <td>+998997777777</td>
                        <td>
                          <button type="button" class="btn btn-info"><i class="ri-pencil-line"></i></button>
                          <a href="./profil-person.html"  class="btn btn-success"><i class="bi bi-info-circle"></i></a>

                        </td>
                      </tr>
                    </tbody>
                  </table> --}}
                  <span id="clients_table"></span>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            
            
          </div>
          {{-- <div class="row">
            <div class="col-12 d-flex align-items-end">
              
                  <h5 class="card-title"></h5>
    
                  <!-- Pagination with icons -->
                  <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                          <span aria-hidden="true">«</span>
                        </a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                          <span aria-hidden="true">»</span>
                        </a>
                      </li>
                    </ul>
                  </nav><!-- End Pagination with icons -->
    
            
            </div>
     
          </div> --}}
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><a href="https://abduganiev.uz/">ABDUGANIEV TECHNOLOGY</a></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script>
    const dates = {!!$dates!!};
    const uc = {{$uc}};
    const cc = {{$cc}};

    const req_url_search_table = "{{route('SearchClient')}}";
    const req_url_sontinue_post = "{{route('ContinuePost')}}";
  </script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  @vite('resources/js/admin.js')

</body>

</html>
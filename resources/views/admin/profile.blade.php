@php
  use RedBeanPHP\R as R;

  $client = R::findOne("clients", "id = ?", [@$_GET['id']]);
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
      <a href="/admin" class="logo d-flex align-items-center w-auto">
        <!-- logo -->
        <img src="assets/img/abduganiev.png" alt="">
      </a>
      @include('blocks.notification')
    </div><!-- End Logo -->


  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active" id="tkn"></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        
        <!-- Right side columns -->
        <div class="col-lg-3">

          <!-- Recent Activity -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Yukni topish:</h5>

              <div class="mb-3 row">
                <div class="col-sm-10">
                  <input type="text" id="search_post" placeholder="Track No" class="form-control">
                </div>
                <button id="search_post_submit" type="button" class="col-sm-2 btn btn-primary">
                  <i class="ri-search-2-line"></i> 
                </button>
              </div>

            </div>
          </div><!-- End Recent Activity -->
          <!-- Recent Activity -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Yangi Track Qo'shish:</h5>

              <form action="{{route('CreatePost')}}" method="post" class="mb-3 row justify-content-center">
                @csrf
                <input type="hidden" name="clid" value="{{$client -> id}}">
                <div class="mb-3 col-sm-12">
                  <input type="text" name="track_no" placeholder="Track №" class="form-control">
                </div>
                <button type="submit" class="col-sm-4 btn btn-primary btn-large">
                  <i class="ri-add-line"></i>
                </button>
              </form>

            </div>
          </div><!-- End Recent Activity -->
          

        </div><!-- End Right side columns -->


        <!-- Left side columns -->
        <div class="col-lg-9 d-flex flex-column align-items-center justify-content-between">
          <div class="row w-100">
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="overflow-auto card recent-sales">

                <div class="card-body">
                  <h5 class="card-title">Yuklar </h5>
                  {{-- <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">F.I.O</th>
                        <th scope="col">Tel.raqam</th>
                        <th scope="col">Shtrix kod</th>
                        <th  scope="col">Jarayon</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">14S777</th>
                        <td>MARSS TEAM</td>
                        <td>+998998070708</td>
                        <td>JT3015379758124</td>
                      
                        <td class="d-flex ">
                          <div class="pagetitle ">
                            <nav style="--bs-breadcrumb-divider: '>';">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"  data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="18.07.21" aria-describedby="tooltip718059"><a href="#">Xitoy</a></li>
                                <li class="breadcrumb-item" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="01.08.21" aria-describedby="tooltip718060" ><a href="#" >Uzbekistan</a></li>
                                <li class="breadcrumb-item active" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="10.08.21" aria-describedby="tooltip718061"><a  href="#" >Mijoz</a></li>
                              </ol>
                            </nav>
                            
                          </div>
                         
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">14S777</th>
                        <td>MARSS TEAM</td>
                        <td>+998998070708</td>
                        <td>JT3015379758124</td>
                      
                        <td class="d-flex ">
                          <div class="pagetitle ">
                            <nav style="--bs-breadcrumb-divider: '>';">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"  data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="18.07.21" aria-describedby="tooltip718059"><a href="#">Xitoy</a></li>
                                <li class="breadcrumb-item active" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="01.08.21" aria-describedby="tooltip718060" ><a href="#" >Uzbekistan</a></li>
                                <li class="breadcrumb-item " data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="10.08.21" aria-describedby="tooltip718061"><a  href="#" >Mijoz</a></li>
                              </ol>
                            </nav>
                            
                          </div>
                         
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">14S777</th>
                        <td>MARSS TEAM</td>
                        <td>+998998070708</td>
                        <td>JT3015379758124</td>
                      
                        <td class="d-flex ">
                          <div class="pagetitle ">
                            <nav style="--bs-breadcrumb-divider: '>';">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item active"  data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="18.07.21" aria-describedby="tooltip718059"><a href="#">Xitoy</a></li>
                                <li class="breadcrumb-item " data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="01.08.21" aria-describedby="tooltip718060" ><a href="#" >Uzbekistan</a></li>
                                <li class="breadcrumb-item " data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="10.08.21" aria-describedby="tooltip718061"><a  href="#" >Mijoz</a></li>
                              </ol>
                            </nav>
                            
                          </div>
                         
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">14S777</th>
                        <td>MARSS TEAM</td>
                        <td>+998998070708</td>
                        <td>JT3015379758124</td>
                      
                        <td class="d-flex ">
                          <div class="pagetitle ">
                            <nav style="--bs-breadcrumb-divider: '>';">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"  data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="18.07.21" aria-describedby="tooltip718059"><a href="#">Xitoy</a></li>
                                <li class="breadcrumb-item" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="01.08.21" aria-describedby="tooltip718060" ><a href="#" >Uzbekistan</a></li>
                                <li class="breadcrumb-item active" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="10.08.21" aria-describedby="tooltip718061"><a  href="#" >Mijoz</a></li>
                              </ol>
                            </nav>
                            
                          </div>
                         
                        </td>
                      </tr>
                    
                      
                    </tbody>
                  </table> --}}
                
                  <span id="posts_table"></span>
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
      &copy; Copyright <strong><a href="https:/abduganiev.uz">ABDUGANIEV TECHNOLOGY</a></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    
  <script>


    const req_url_search_table_post = "{{route('SearchPost')}}";
    const req_url_sontinue_post = "{{route('ContinuePost')}}";
    const token = "{{$client -> token}}";
    const username = "{{$client -> username}}";
    const phone = "{{$client -> phone}}";

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

  @vite('resources/js/admin_profile.js')


</body>

</html>
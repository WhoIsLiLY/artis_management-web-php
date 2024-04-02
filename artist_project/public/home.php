<?php
session_start();
    require_once __DIR__ . "\\bootstrap.php";
    $user_data = check_login($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jadwal Artis</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/catalog_page.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .table-responsive {
      overflow-x: auto;
    }
    body {
      background-color: #f8f9fa;
    }
    .container {
      padding: 50px 0;
    }
    th, td {
      vertical-align: middle !important;
    }
  </style>
</head>
<body class="bg-light">

<!--HEADER-->
<?php require_once __DIR__ . "\\assets\\layouts\\header.php";?>

<div class="container-fluid p-0 bg-light mb-5" style="height: 100vh;">
  <div class="container text-center">
    <div class="row">
      <!-- sidebar  -->
      <div class="col-0 col-lg-2 bg-light">
        <div class="sidebar-sticky">
          <div class="offcanvas-lg offcanvas-start bg-light" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
            <div class="offcanvas-header">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/>
              </svg>
              <h5 class="offcanvas-title fw-bolder" id="offcanvasResponsiveLabel">CelebSync</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="list-unstyled text-start">
                <li class="mb-3 text-dark">
                  <div class="row">
                    <div class="col-auto">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                      </svg>
                    </div>
                    <div class="col-auto">
                      <h5 class="fw-bolder">Brands</h5>
                    </div>
                  </div>
                  <ul class="list-unstyled ps-5">
                    <li><button class="btn text-start p-0 filter border-0 " type="button" data-filter="brand" data-name="ALL">ALL</button></li>
                    <li><button class="btn text-start p-0 filter border-0 " type="button" data-filter="brand" data-name="Lacoste">Lacoste</button></li>
                    <li><button class="btn text-start p-0 filter border-0 " type="button" data-filter="brand" data-name="Uniqlo">Uniqlo</button></li>
                    <li><button class="btn text-start p-0 filter border-0 " type="button" data-filter="brand" data-name="H n M">H & M</button></li>
                  </ul>
                </li>
                <li class="mb-3 text-dark">
                  <div class="row">
                    <div class="col-auto">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-incognito" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="m4.736 1.968-.892 3.269-.014.058C2.113 5.568 1 6.006 1 6.5 1 7.328 4.134 8 8 8s7-.672 7-1.5c0-.494-1.113-.932-2.83-1.205a1.032 1.032 0 0 0-.014-.058l-.892-3.27c-.146-.533-.698-.849-1.239-.734C9.411 1.363 8.62 1.5 8 1.5c-.62 0-1.411-.136-2.025-.267-.541-.115-1.093.2-1.239.735Zm.015 3.867a.25.25 0 0 1 .274-.224c.9.092 1.91.143 2.975.143a29.58 29.58 0 0 0 2.975-.143.25.25 0 0 1 .05.498c-.918.093-1.944.145-3.025.145s-2.107-.052-3.025-.145a.25.25 0 0 1-.224-.274ZM3.5 10h2a.5.5 0 0 1 .5.5v1a1.5 1.5 0 0 1-3 0v-1a.5.5 0 0 1 .5-.5Zm-1.5.5c0-.175.03-.344.085-.5H2a.5.5 0 0 1 0-1h3.5a1.5 1.5 0 0 1 1.488 1.312 3.5 3.5 0 0 1 2.024 0A1.5 1.5 0 0 1 10.5 9H14a.5.5 0 0 1 0 1h-.085c.055.156.085.325.085.5v1a2.5 2.5 0 0 1-5 0v-.14l-.21-.07a2.5 2.5 0 0 0-1.58 0l-.21.07v.14a2.5 2.5 0 0 1-5 0v-1Zm8.5-.5h2a.5.5 0 0 1 .5.5v1a1.5 1.5 0 0 1-3 0v-1a.5.5 0 0 1 .5-.5Z"/>
                      </svg>
                    </div>
                    <div class="col-auto">
                      <h5 class="fw-semibold">Fashion</h5>
                    </div>
                  </div>
                  <ul class="list-unstyled ps-5">
                    <li><button class="btn text-start p-0 filter border-0 " type="button" data-filter="gender" data-name="Pria">Pria</button></li>
                    <li><button class="btn text-start p-0 filter border-0 " type="button" data-filter="gender" data-name="Wanita">Wanita</button></li>
                    <li><button class="btn text-start p-0 filter border-0 " type="button" data-filter="jenis" data-name="Baju">Baju</button></li>
                    <li><button class="btn text-start p-0 filter border-0 " type="button" data-filter="jenis" data-name="Celana">Celana</button></li>
                  </ul>
                </li>
                <li class="mb-3 text-dark">
                  <div class="row">
                    <div class="col-auto">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
                      </svg>
                    </div>
                    <div class="col-auto">
                      <h5 class="fw-semibold">Price</h5>
                    </div>
                  </div>
                  <ul class="list-unstyled ps-5">
                    <li><button class="btn text-start p-0 filter border-0 " type="button" data-filter="price" data-name="low">Cheaper</button></li>
                    <li><button class="btn text-start p-0 filter border-0 " type="button" data-filter="price" data-name="mid">Medium</button></li>
                    <li><button class="btn text-start p-0 filter border-0 " type="button" data-filter="price" data-name="high">Expensive</button></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- main-content -->
      <div class="col-lg-10">
        <div class="container">
          <h1 class="text-center mt-3">Schedule</h1>
          <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Artis</th>
                  <th>Jadwal</th>
                  <th>Tempat</th>
                </tr>
              </thead>
              <tbody>
                <?php /*foreach ($jadwal_artis as $key => $jadwal) : ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $jadwal['nama_artis'] ?></td>
                    <td><?= $jadwal['jadwal'] ?></td>
                    <td><?= $jadwal['tempat'] ?></td>
                  </tr>
                <?php endforeach;*/ ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--FOOTER-->
<?php require_once __DIR__ . "\\assets\\layouts\\footer.php";?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="./assets/js/catalog_page.js"></script>
  
</body>
</html>

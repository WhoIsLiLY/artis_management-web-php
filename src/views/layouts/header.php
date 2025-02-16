<?php
if (isset($_COOKIE["token"])) {
  $role = $middleware->getRoleFromToken($_COOKIE["token"]);
} else {
  header("Location: /src/views/401.php");
}
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

  <!-- TAILWIND-->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- JQuery & AJAX & SweetAlert2 -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-light">
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg bg-transparent md:bg-light transition-all duration-300 shadow-md">
    <div class="container-fluid mx-3">
      <button class="btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive">
        <i class="bx bx-menu text-xl"></i>
      </button>
      <a class="navbar-brand fw-bolder text-white md:text-black" href="#">CelebSync</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <i class="bx bx-home text-xl"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <?php echo "<a class='nav-link active fw-semibold text-white md:text-black' href='/src/views/$role/home.php'>Home</a>"; ?>
          </li>
          <li class="nav-item">
            <?php echo "<a class='nav-link fw-semibold text-white md:text-black' href='/src/views/$role/workspace.php'>Workspace</a>"; ?>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold text-white md:text-black" href="/src/views/about.php">About Us</a>
          </li>
        </ul>
        <span class="navbar-text fw-bolder">
          <a href="/src/controllers/logoutController.php" class="text-white md:text-black">Logout</a>
        </span>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container-fluid p-0 min-h-screen flex justify-center items-center overflow-auto bg-gradient-to-br from-blue-700 via-purple-800 to-indigo-900 text-white">
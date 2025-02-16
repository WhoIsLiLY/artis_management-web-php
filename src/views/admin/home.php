<?php
session_start();

require_once __DIR__ . "\\..\\..\\bootstrap.php";
if (isset($_COOKIE["token"])) {
  $middleware->checkAdminTokenValidity($_COOKIE["token"]);
} else {
  header("Location: /src/views/401.php");
}
//echo $_SESSION['user_id'];

// $controller->addArtisKey($_SESSION["user_id"]); JANGAN DIBUKA
?>
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

  th,
  td {
    vertical-align: middle !important;
  }

  .card {
    margin: 20px auto;
    width: 80%;
    height: 200px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .icon {
    font-size: 50px;
    margin-bottom: 15px;
  }
</style>

<!--HEADER-->
<?php require_once __DIR__ . "\\..\\layouts\\header.php" ?>

<!-- Background Elements -->
<div class="absolute inset-0">
  <div class="absolute w-72 h-72 bg-blue-500 opacity-30 rounded-full blur-3xl top-10 left-10 animate-pulse"></div>
  <div class="absolute w-96 h-96 bg-purple-500 opacity-30 rounded-full blur-3xl bottom-10 right-10 animate-pulse"></div>
  <div class="absolute w-48 h-48 bg-white opacity-10 rounded-full blur-2xl top-1/3 left-1/3"></div>
</div>

<!-- Content -->
<div class="flex row">
  <h1 class="text-4xl font-extrabold text-center mb-10 z-10">Welcome ADMIN!</h1>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full max-w-4xl z-10">
    <!-- Card 1: Schedule -->
    <a href="schedule.php" class="group">
      <div class="card bg-white/10 backdrop-blur-xl p-6 rounded-2xl shadow-xl border border-white/20 text-center hover:scale-105 hover:shadow-blue-400/50 transition duration-300">
        <img src="./icon_schedule.png" class="mx-auto w-20 h-auto group-hover:rotate-6 transition duration-300" alt="Schedule Icon">
        <h5 class="mt-4 text-xl font-semibold text-black">Schedule</h5>
      </div>
    </a>

    <!-- Card 2: Manage -->
    <a href="workspace.php" class="group">
      <div class="card bg-white/10 backdrop-blur-xl p-6 rounded-2xl shadow-xl border border-white/20 text-center hover:scale-105 hover:shadow-purple-400/50 transition duration-300">
        <img src="./icon_management.png" class="mx-auto w-20 h-auto group-hover:rotate-6 transition duration-300" alt="Manage Icon">
        <h5 class="mt-4 text-xl font-semibold text-black">Manage</h5>
      </div>
    </a>

    <!-- Card 3: Profile -->
    <a href="profile.php?id=<?php echo $middleware->getIdFromToken($_COOKIE['token']); ?>" class="group">
      <div class="card bg-white/10 backdrop-blur-xl p-6 rounded-2xl shadow-xl border border-white/20 text-center hover:scale-105 hover:shadow-indigo-400/50 transition duration-300">
        <img src="./icon_profile.png" class="mx-auto w-20 h-auto group-hover:rotate-6 transition duration-300" alt="Profile Icon">
        <h5 class="mt-4 text-xl font-semibold text-black">Profile</h5>
      </div>
    </a>
  </div>
</div>
</div>



<!--div class="col-lg-10">
  <h1 class="text-center">Schedule</h1>
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
        <php /*foreach ($jadwal_artis as $key => $jadwal) : ?>
          <tr>
            <td><= $key + 1 ?></td>
            <td><= $jadwal['nama_artis'] ?></td>
            <td><= $jadwal['jadwal'] ?></td>
            <td><= $jadwal['tempat'] ?></td>
          </tr>
        <php endforeach;*/ ?>
      </tbody>
    </table>
  </div>
</!--div-->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    $('header').load('./assets/layouts/header.php');
    reg(); // form load
  });

  function reg() {
    const Toast = Swal.mixin({
      toast: true,
      position: "bottom-end",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
      }
    });
    Toast.fire({
      icon: "success",
      title: "Signed in successfully"
    });
  }
</script>
<!--FOOTER-->
<?php require_once __DIR__ . "\\..\\layouts\\footer.php"; ?>
<?php
session_start();

require_once __DIR__ . "\\..\\..\\bootstrap.php";
if(isset($_COOKIE["token"])){
  $middleware->checkArtistTokenValidity($_COOKIE["token"]);
}else{
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
  th, td {
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
<?php require_once __DIR__ . "\\..\\layouts\\header.php"?>

<!-- main-content -->
  <h1 class="text-center">What do you want to do?</h1>
    <div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
      <a href="workspace.php">
      <div class="card">
        <img src="./icon_schedule.png" class="card-img-top" style="width: 80px; height: auto;" alt="...">
        <div class="card-body">
          <h5 class="card-title">Schedule</h5>
          <p class="card-text"></p>
        </div>
      </div>
      </a>
    </div>
    <div class="col">
      <a href="contract.php">
      <div class="card">
        <img src="./icon_contract.png" class="card-img-top" style="width: 80px; height: auto;" alt="...">
        <div class="card-body">
          <h5 class="card-title">Contract</h5>
          <p class="card-text"></p>
        </div>
      </div>
      </a>
    </div>
    <div class="col">
      <a href="contact.php">
      <div class="card">
        <img src="./icon_contact.png" class="card-img-top" style="width: 80px; height: auto;" alt="...">
        <div class="card-body">
          <h5 class="card-title">Contact</h5>
          <p class="card-text"></p>
        </div>
      </div>
      </a>
    </div>
    <div class="col">
      <a href="profile.php?id="<?php $middleware->getIdFromToken($_COOKIE['token'])?>>
      <div class="card">
        <img src="./icon_profile.png" class="card-img-top" style="width: 80px; height: auto;" alt="...">
        <div class="card-body">
          <h5 class="card-title">Profile</h5>
          <p class="card-text"></p>
        </div>
      </div>
      </a>
    </div>
  </div>
</body>
</html>

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
  function reg(){
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
<?php require_once __DIR__ . "\\..\\layouts\\footer.php";?>
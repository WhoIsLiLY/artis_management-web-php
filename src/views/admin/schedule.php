<?php 
session_start();
  require_once __DIR__ . "\\..\\..\\bootstrap.php";

  if(isset($_COOKIE["token"])){
    $middleware->checkAdminTokenValidity($_COOKIE["token"]);
  }else{
    header("Location: /src/views/401.php");
  }
  //echo $_COOKIE["token"];
  $data = $userController->getSchedule();
  //echo "<pre>";
  //print_r($data);
  //echo "</pre>";
  //$key = $authController->getTokenKey();
  //echo $key;
?>

<!--HEADER-->
<?php require_once __DIR__ . "\\..\\layouts\\header.php"?>
<?php require_once __DIR__ . "\\..\\layouts\\sidebar-admin.php"?>
<!-- main-content -->
  <div class="col-lg-10 pt-12">
  <h1 class="text-center">Manage Schedules</h1>
  <button id="add" class="btn btn-success position-absolute top-0 end-0 mt-5 mr-4">Add</button>
  <div class="table-responsive mt-3" style="height: 500px; overflow-y: auto;">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Event Name</th>
          <th>Time</th>
          <th>Location</th>
          <th>Type</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <?php
            foreach($data as $value){
              echo "<tr>";
              echo "<td>".$value['id']."</td>";
              echo "<td>".$value['nama_acara']."</td>";
              echo "<td>".$value['tanggal_waktu']."</td>";
              echo "<td>".$value['lokasi']."</td>";
              echo "<td>".$value['jenis_acara']."</td>";
              echo "<td><button id='btn-delete-".$value['id']."' class='btn btn-danger position-relative top-0 end-0'>delete</button></td>";
              echo "</tr>";
            }
            ?>
            </tr>
      </tbody>
    </table>
  </div>
  </div>
</body>
</html>

<script>
document.addEventListener('click', function(event) {
  if(event.target.id === "add"){
    window.location.href = "schedule_add.php";
  }
  if(event.target.matches('[id^="btn-"]')){
    if(event.target.matches('[id^="btn-delete-"]')) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be reversed!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Delete Account!',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
              var id;
              var method;
              atr = event.target.id.split('-'); // Mendapatkan bagian ID setelah "btn-update-"
              //alert(atr[1] + " " + atr[2]);
              action(atr[1], atr[2]);
            }
      });
    }
    else{
      var id;
      var method;
      atr = event.target.id.split('-'); // Mendapatkan bagian ID setelah "btn-update-"
      //alert(atr[1] + " " + atr[2]);
      action(atr[1], atr[2]);
    }};
  });
function action(method, id){
  $.ajax({
      url: "../../controllers/actionController.php",
      type: "POST",
      data: JSON.stringify({ method: method, id: id , role: "schedule"}),
      contentType: 'application/json',
      success: function(response) {
        // Tanggapan dari server
        //alert(response.method);
        if(response.method == "update"){
          window.location.href = "manager_update.php?id=" + id;
        }else if(response.method == "schedule"){
          window.location.href = "schedule.php?id=" + id;
        }else if(response.method == "delete"){
          window.location.reload();
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        // Tangani respons error
        //var errorMessage = jqXHR.status + ': ' + jqXHR.statusText;
        //console.error('Error:', errorMessage);

        // Jika ingin menampilkan pesan kesalahan yang dikirim oleh server (jika ada)
        
        if(jqXHR.responseText){
            console.error(jqXHR.responseText);
        }
        console.error("AJAX request failed: " + status);
      }
    });
}
</script>

<!--FOOTER-->
<?php require_once __DIR__ . "\\..\\layouts\\footer.php";?>
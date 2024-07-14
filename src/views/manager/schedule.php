<?php 
session_start();
  require_once __DIR__ . "\\..\\..\\bootstrap.php";
  if(isset($_COOKIE["token"])){
    $middleware->checkManagerTokenValidity($_COOKIE["token"]);
  }else{
    header("Location: /src/views/401.php");
  }
  if(isset($_GET["id"])){
    //print_r($_POST["data"]);
    $data = $userController->getScheduleByArtis($_GET['id']);
  }
  //$data = $userController->getScheduleByArtis($middleware->getIdFromToken($_COOKIE["token"]));
?>

<!--HEADER-->
<?php require_once __DIR__ . "\\..\\layouts\\header.php"?>
<?php require_once __DIR__ . "\\..\\layouts\\sidebar-manager.php"?>
<!-- main-content -->
  <div class="col-lg-10 pt-12">
  <h1 class="text-center">Manage <?php echo $userController->getArtisNameById($_GET['id']);?> <br>Schedule</h1>
  <?php echo "<button id='add-".$_GET['id']."' class='btn btn-success position-absolute top-0 end-0 mt-5 mr-4'>Add</button>";?>
  <div class="table-responsive mt-3" style="height: 500px; overflow-y: auto;">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>EventName</th> 
          <th>Date</th>
          <th>Location</th>
          <th>Type</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <?php
            foreach($data as $value){
              echo "<tr>";
              echo "<td>".$value['nama_acara']."</td>";
              echo "<td>".$value['tanggal_waktu']."</td>";
              echo "<td>".$value['lokasi']."</td>";
              echo "<td>".$value['jenis_acara']."</td>";
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
  if(event.target.matches('[id^="add-"]')){
    atr = event.target.id.split('-');
    window.location.href = "schedule_artist_add.php?id="+atr[1];
  }
  if(event.target.matches('[id^="btn-"]')){
    var id;
    var method;
    atr = event.target.id.split('-'); // Mendapatkan bagian ID setelah "btn-update-"
    //alert(atr[1] + " " + atr[2]);
    action(atr[1], atr[2]);
  }
});
function action(method, id){
  $.ajax({
      url: "../../controllers/actionController.php",
      type: "POST",
      data: JSON.stringify({ method: method, id: id }),
      contentType: 'application/json',
      success: function(response) {
        // Tanggapan dari server
        //alert(response.method);
        if(response.method == "update"){
          window.location.href = "artis_update.php";
        }else if(response.method == "schedule"){
          window.location.href = "artis_schedule.php";
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
<?php
    session_start();
    require_once __DIR__ . "\\..\\..\\bootstrap.php";
    if(isset($_COOKIE["token"])){
        $middleware->checkManagerTokenValidity($_COOKIE["token"]);
    }else{
        header("Location: /src/views/401.php");
    }
    $contracts = $userController->getKontrakByManagerId($middleware->getIdFromToken($_COOKIE['token']));
    
?>

<!--HEADER-->
<?php require_once __DIR__ . "\\..\\layouts\\header.php"?>
<?php require_once __DIR__ . "\\..\\layouts\\sidebar-manager.php"?>
<!-- main-content -->
  <div class="col-lg-10 pt-12">
  <h1 class="text-center">Manage Contract</h1>
  <div class="table-responsive mt-3" style="height: 500px; overflow-y: auto;">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Artist Name</th>
          <th>Manager Name</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Description</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <?php
            foreach($contracts as $value){
              echo "<tr>";
              echo "<td>".$value['id']."</td>";
              echo "<td>".$value['nama_artis']."</td>";
              echo "<td>".$value['nama_manager']."</td>";
              echo "<td>".$value['tanggal_awal']."</td>";
              echo "<td>".$value['tanggal_akhir']."</td>";
              echo "<td>".$value['deskripsi']."</td>";
              echo "<td><button id='btn-print' onclick='printPDF(".$value['id'].")' class='btn btn-success position-relative top-0 end-0'>Print PDF</button></td>";
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
// Function untuk print PDF
function printPDF(id) {
    var form = document.createElement('form');
    form.method = 'POST';
    form.action = '../../utils/print/generate_pdf.php';

    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'id';
    input.value = id;
    
    form.appendChild(input);
    document.body.appendChild(form);
    form.submit();
}       
document.addEventListener('click', function(event) {
  if(event.target.id === "add"){
    window.location.href = "artis_add.php";
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
      data: JSON.stringify({ method: method, id: id, role: "manager" }),
      contentType: 'application/json',
      success: function(response) {
        // Tanggapan dari server
        //alert(response.method);
        if(response.method == "update"){
          window.location.href = "artis_update.php?id=" + id;
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
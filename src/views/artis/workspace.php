<?php
session_start();
require_once __DIR__ . "\\..\\..\\bootstrap.php";
if (isset($_COOKIE["token"])) {
  $middleware->checkArtistTokenValidity($_COOKIE["token"]);
} else {
  header("Location: /src/views/401.php");
}
$data = $userController->getScheduleByArtis($middleware->getIdFromToken($_COOKIE["token"]));
//$data = $userController->getScheduleByArtis($middleware->getIdFromToken($_COOKIE["token"]));
?>

<!--HEADER-->
<?php require_once __DIR__ . "\\..\\layouts\\header.php" ?>
<!-- main-content -->
<div class="col-lg-10 pt-12 px-4">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-white text-center">
      <?php echo $userController->getArtisNameById($middleware->getIdFromToken($_COOKIE["token"])); ?>'s Schedule
    </h1>
  </div>

  <div class="bg-white p-6 rounded-lg shadow-lg overflow-hidden">
    <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
      <table class="table table-hover table-bordered table-striped text-center align-middle">
        <thead class="bg-gradient-to-r from-indigo-500 to-purple-700 text-white">
          <tr>
            <th>Event Name</th>
            <th>Date</th>
            <th>Location</th>
            <th>Type</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data as $value): ?>
            <tr class="hover:bg-gray-100 transition duration-200">
              <td class="p-3 font-medium"> <?= htmlspecialchars($value['nama_acara']); ?> </td>
              <td class="p-3"> <?= htmlspecialchars($value['tanggal_waktu']); ?> </td>
              <td class="p-3"> <?= htmlspecialchars($value['lokasi']); ?> </td>
              <td class="p-3"> <?= htmlspecialchars($value['jenis_acara']); ?> </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>

</html>

<script>
  document.addEventListener('click', function(event) {
    if (event.target.matches('[id^="add-"]')) {
      atr = event.target.id.split('-');
      window.location.href = "schedule_artist_add.php?id=" + atr[1];
    }
    if (event.target.matches('[id^="btn-"]')) {
      var id;
      var method;
      atr = event.target.id.split('-'); // Mendapatkan bagian ID setelah "btn-update-"
      //alert(atr[1] + " " + atr[2]);
      action(atr[1], atr[2]);
    }
  });

  function action(method, id) {
    $.ajax({
      url: "../../controllers/actionController.php",
      type: "POST",
      data: JSON.stringify({
        method: method,
        id: id
      }),
      contentType: 'application/json',
      success: function(response) {
        // Tanggapan dari server
        //alert(response.method);
        if (response.method == "update") {
          window.location.href = "artis_update.php";
        } else if (response.method == "schedule") {
          window.location.href = "artis_schedule.php";
        } else if (response.method == "delete") {
          window.location.reload();
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        // Tangani respons error
        //var errorMessage = jqXHR.status + ': ' + jqXHR.statusText;
        //console.error('Error:', errorMessage);

        // Jika ingin menampilkan pesan kesalahan yang dikirim oleh server (jika ada)

        if (jqXHR.responseText) {
          console.error(jqXHR.responseText);
        }
        console.error("AJAX request failed: " + status);
      }
    });
  }
</script>

<!--FOOTER-->
<?php require_once __DIR__ . "\\..\\layouts\\footer.php"; ?>
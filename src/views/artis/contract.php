<?php
session_start();
require_once __DIR__ . "\\..\\..\\bootstrap.php";
if (isset($_COOKIE["token"])) {
  $middleware->checkArtistTokenValidity($_COOKIE["token"]);
} else {
  header("Location: /src/views/401.php");
}
$contracts = $userController->getKontrakByArtisId($middleware->getIdFromToken($_COOKIE['token']));
?>

<!--HEADER-->
<?php require_once __DIR__ . "\\..\\layouts\\header.php" ?>
<!-- main-content -->
<div class="col-lg-10 pt-12 px-4">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-white text-center">Manage Contract</h1>
  </div>

  <div class="bg-white p-6 rounded-lg shadow-lg overflow-hidden">
    <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
      <table class="table table-hover table-bordered table-striped text-center align-middle">
        <thead class="bg-gradient-to-r from-indigo-500 to-purple-700 text-white">
          <tr>
            <th>Artist Name</th>
            <th>Manager Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($contracts as $value): ?>
            <tr class="hover:bg-gray-100 transition duration-200">
              <td class="p-3 font-medium"> <?= htmlspecialchars($value['nama_artis']); ?> </td>
              <td class="p-3"> <?= htmlspecialchars($value['nama_manager']); ?> </td>
              <td class="p-3"> <?= htmlspecialchars($value['tanggal_awal']); ?> </td>
              <td class="p-3"> <?= htmlspecialchars($value['tanggal_akhir']); ?> </td>
              <td class="p-3"> <?= htmlspecialchars($value['deskripsi']); ?> </td>
              <td class="p-3">
                <button id="btn-print-<?= $value['id']; ?>"
                  onclick="printPDF(<?= $value['id']; ?>)"
                  class="btn btn-success shadow-lg transition duration-300 hover:scale-105">
                  Print PDF
                </button>
              </td>
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
    if (event.target.id === "add") {
      window.location.href = "artis_add.php";
    }
    if (event.target.matches('[id^="btn-"]')) {
      if (event.target.matches('[id^="btn-delete-"]')) {
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
      } else {
        var id;
        var method;
        atr = event.target.id.split('-'); // Mendapatkan bagian ID setelah "btn-update-"
        //alert(atr[1] + " " + atr[2]);
        action(atr[1], atr[2]);
      }
    };
  });

  function action(method, id) {
    $.ajax({
      url: "../../controllers/actionController.php",
      type: "POST",
      data: JSON.stringify({
        method: method,
        id: id,
        role: "manager"
      }),
      contentType: 'application/json',
      success: function(response) {
        // Tanggapan dari server
        //alert(response.method);
        if (response.method == "update") {
          window.location.href = "artis_update.php?id=" + id;
        } else if (response.method == "schedule") {
          window.location.href = "schedule.php?id=" + id;
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
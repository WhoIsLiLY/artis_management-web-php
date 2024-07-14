
<?php
    session_start();
    require_once __DIR__ . "\\..\\..\\bootstrap.php";
    if(isset($_COOKIE["token"])){
        $middleware->checkManagerTokenValidity($_COOKIE["token"]);
    }else{
        header("Location: /src/views/401.php");
    }
    $data = $userController->getSchedule();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contract</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php
        // $email = $controller->getEmailById($id);
        // $artis = $controller->showContractArtistSide($email);
    ?>

    <div class="container mt-4">
        <h2 class="text-center mt-3 mb-4">Available Schedule(s)</h2>
        <form action="" method="post">
            
            <?php
            foreach($data as $keys => $values){
                echo "<div class='card' name='id' value=".$data[$keys]['id'].">";
                echo "<div class='card-header'>";
                echo "<a value=".$data[$keys]['jenis_acara'].">".$data[$keys]['jenis_acara']."</a>";
                echo "</div>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title' value=".$data[$keys]['nama_acara'].">".$data[$keys]['nama_acara']."</h5>";
                echo "<p class='card-text' value=".$data[$keys]['lokasi'].">".$data[$keys]['lokasi']."</p>";
                echo "<a href='#' id='btn-add-".$data[$keys]['id']."-".$_GET['id']."' class='btn btn-primary'>Assign Schedule</a>";
                echo "</div>";
                echo "</div>";
                echo "<br>";
            }
            ?>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
    <script>
        function showSuccessMessageAndRedirect(id) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Add schedule success!',
                timer: 2000, // Waktu tampilan pesan (dalam milidetik)
                showConfirmButton: false // Sembunyikan tombol OK
            }).then(function() {
                // Pindahkan halaman setelah beberapa detik
                setTimeout(function() {
                window.location.href = 'schedule.php?id=' + id; // Ganti dengan URL tujuan Anda
                }, 1); // Waktu tunda (dalam milidetik)
            });
        }
        document.addEventListener('click', function(event) {
        if(event.target.id === "add"){
            window.location.href = "artis_add.php";
        }
        if(event.target.matches('[id^="btn-add"]')){
            Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to add this schedule?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Add Schedule!',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                    var id;
                    var method;
                    atr = event.target.id.split('-'); // Mendapatkan bagian ID setelah "btn-update-"
                    //alert(atr[1] + " " + atr[2]);
                    action(atr[2], atr[3]);
                    }
            });
        }});
        function action(idJadwal, idArtist){
        $.ajax({
            url: "../../controllers/actionController.php",
            type: "POST",
            data: JSON.stringify({ method: "add", idJadwal: idJadwal, idArtist: idArtist, role: "schedule" }),
            contentType: 'application/json',
            success: function(response) {
                // Tanggapan dari server
                if(response.method == "add"){
                    showSuccessMessageAndRedirect(idArtist);
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
</body>

</html>
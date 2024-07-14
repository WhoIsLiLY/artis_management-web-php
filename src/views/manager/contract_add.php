<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showSuccessMessageAndRedirect() {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Add artist & contract success!',
            timer: 2000, // Waktu tampilan pesan (dalam milidetik)
            showConfirmButton: false // Sembunyikan tombol OK
        }).then(function() {
            // Pindahkan halaman setelah beberapa detik
            setTimeout(function() {
            window.location.href = 'workspace.php'; // Ganti dengan URL tujuan Anda
            }, 1); // Waktu tunda (dalam milidetik)
        });
        }

    </script>
<?php
    session_start();
    require_once __DIR__ . "\\..\\..\\bootstrap.php";
    if(isset($_COOKIE["token"])){
        $middleware->checkManagerTokenValidity($_COOKIE["token"]);
    }else{
        header("Location: /src/views/401.php");
    }
    if(isset($_POST["submit_contract"])){
        $dataContract = array(
            "tanggal_awal" => "",
            "tanggal_akhir" => "",
            "deskripsi" => "",
            "manager_id" => "",
            "artis_id" => ""
        );
        $idArtist = $userController->createUserArtist($_SESSION['temp_data'], $middleware->getIdFromToken($_COOKIE["token"]));
        $idManager = $middleware->getIdFromToken($_COOKIE["token"]);
        $dataContract['tanggal_awal'] = $_POST['tanggal_mulai'];
        $dataContract['tanggal_akhir'] = $_POST['tanggal_akhir'];
        $dataContract['deskripsi'] = $_POST['deskripsi'];
        $dataContract["manager_id"] = $idManager;
        $dataContract["artis_id"] = $idArtist;

        $userController->createContractArtistManager($dataContract);
        unset($_SESSION['temp_data']);
        echo "<br>";
        echo '<script>';
        echo 'showSuccessMessageAndRedirect();'; // Panggil fungsi JavaScript
        echo '</script>';
    }
    if(isset($_POST["submit"])){
        //print_r($_POST["data"]);
        $data = $_POST["data"];
        $nameArtist = $data[0];
        //echo $_SESSION["name_enc"];
        $_SESSION["temp_data"] = $data;
    }
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
        <h2 class="text-center">Contract Policy</h2>
        <form action="" method="post">
            <div class="mb-3">
                <input type="hidden" name="">
                <label for="nama_manajer" class="form-label">Artist Name:  <?php
                if(isset($nameArtist)) echo $nameArtist;
                ?></label>
            </div>
            <div class="mb-3">
            <input type="hidden" name="">
                <label for="nama_manajer" class="form-label">Manager Name:  <?php
                    $managerName = $userController->getManagerNameById($middleware->getIdFromToken($_COOKIE["token"]));
                    echo $managerName;
                ?></label>
            </div>
            <div class="mb-3">
                <label for="tanggal_mulai" class="form-label">Start Date:</label>
                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_akhir" class="form-label">End Date:</label>
                <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Description Contract:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
            </div>
            <button type="submit" name="submit_contract" class="btn btn-primary">Save Contract</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        // Mendapatkan tanggal hari ini
        var today = new Date();

        // Format tanggal ke "YYYY-MM-DD"
        var formattedDate = today.toISOString().substr(0, 10);

        // Menetapkan nilai awal input tanggal menjadi tanggal hari ini
        document.getElementById("tanggal_mulai").value = formattedDate;
    </script>
</body>

</html>
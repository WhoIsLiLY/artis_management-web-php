<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showSuccessMessageAndRedirect() {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Add data success!',
            timer: 2000, // Waktu tampilan pesan (dalam milidetik)
            showConfirmButton: false // Sembunyikan tombol OK
        }).then(function() {
            // Pindahkan halaman setelah beberapa detik
            setTimeout(function() {
            window.location.href = 'schedule.php'; // Ganti dengan URL tujuan Anda
            }, 1); // Waktu tunda (dalam milidetik)
        });
        }

    </script>
<?php
    session_start();
    require_once __DIR__ . "\\..\\..\\bootstrap.php";
    if(isset($_COOKIE["token"])){
        $middleware->checkAdminTokenValidity($_COOKIE["token"]);
    }else{
        header("Location: /src/views/401.php");
    }
    if(isset($_POST["submit"])){
        //print_r($_POST["data"]);
        $data = $_POST["data"];
        //echo $_SESSION["name_enc"];
        $userController->createSchedule($_POST["data"]);
        echo "<br>";
        echo '<script>';
        echo 'showSuccessMessageAndRedirect();'; // Panggil fungsi JavaScript
        echo '</script>';
        //header("Location: /src/views/admin/workspace.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Schedule</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2 class="text-center pt-4">Add Schedule</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Event Name:</label>
                <input type="text" class="form-control" id="nama_artis" name="data[]" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Date Due:</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="data[]" required>
            </div>
            <div class="mb-3">
                <label for="kota" class="form-label">Location:</label>
                <input type="text" class="form-control" id="kota" name="data[]" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Type:</label>
                <input type="radio" name="data[]" id="rdofans" value="FANS" required> <label for="rdofans">FANS</label>
                <input type="radio" name="data[]" id="rdoimportant" value="IMPORTANT" required> <label for="rdoimportant">IMPORTANT</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mb-3">Save Data</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</body>

</html>
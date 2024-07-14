<?php
    session_start();
    require_once __DIR__ . "\\..\\..\\bootstrap.php";
    if(isset($_COOKIE["token"])){
        $middleware->checkManagerTokenValidity($_COOKIE["token"]);
    }else{
        header("Location: /src/views/401.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Artist</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2 class="text-center pt-4">Add Artist</h2>
        <form action="contract_add.php" method="post">
            <div class="mb-3">
                <input type="hidden">
                <h5 for="nama_manajer" class="form-label">Artist's Manager Name:  <?php
                    $managerName = $userController->getManagerNameById($middleware->getIdFromToken($_COOKIE["token"]));
                    echo $managerName;
                ?></h5>
                
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Artist Name:</label>
                <input type="text" class="form-control" id="nama_artis" name="data[]" required>
            </div>
            
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Birth Date:</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="data[]" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <input type="radio" name="data[]" id="rdolaki" value="Laki-Laki" required> <label for="rdolaki">Male</label>
                <input type="radio" name="data[]" id="rdoperempuan" value="Perempuan" required> <label for="rdoperempuan">Female</label>
            </div>
            <div class="mb-3">
                <label for="kota" class="form-label">City:</label>
                <input type="text" class="form-control" id="kota" name="data[]" required>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">Phone Number:</label>
                <input type="text" class="form-control" id="no_hp" name="data[]" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="data[]" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="data[]" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mb-3">Save Data</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</body>

</html>
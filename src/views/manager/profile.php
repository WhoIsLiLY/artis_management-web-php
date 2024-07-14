<?php
    session_start();
    require_once __DIR__ . "\\..\\..\\bootstrap.php";
    if(isset($_COOKIE["token"])){
        $middleware->checkManagerTokenValidity($_COOKIE["token"]);
    }else{
        header("Location: /src/views/401.php");
    }
    if(isset($_GET['id'])){
        $data = $userController->getManagerById($middleware->getIdFromToken($_COOKIE["token"]));
        //print_r($data);
    }else{
        header("Location:/src/views/manager/workspace.php");
    }
    if(isset($_POST['submit'])){
        //print_r($_POST['data']);
        $userController->updateManagerAuthById($_GET['id'], $_POST["data"]);
        
        header("Location: /src/views/manager/workspace.php?id=".$_GET['id']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Artist</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php
        
    ?>
    <div class="container mt-5">
        <h2 class="text-center">Profile</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Manager Name: </label>
                <input type="text" class="form-control" id="nama_artis" name="data[]" value=<?php echo $data['nama']?> required>
            </div>
            
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Birth Date:</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="data[]" value=<?php echo $data['tanggal_lahir']?> required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <input type="radio" name="data[]" id="rdolaki" value="Laki-Laki" required> <label for="rdolaki">Male</label>
                <input type="radio" name="data[]" id="rdoperempuan" value="Perempuan" required> <label for="rdoperempuan">Female</label>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">2-Step Authentication:</label>
                <input type="checkbox" id="myCheckbox" name="data[]" value="1" onclick="toggleCheckboxValue()">
            </div>
            <div class="mb-3">
                <label for="kota" class="form-label">City: </label>
                <input type="text" class="form-control" id="kota" name="data[]" value=<?php echo $data['asal_kota']?> required>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">Phone Number: </label>
                <input type="text" class="form-control" id="no_hp" name="data[]" value=<?php echo $data['no_hp']?> required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email: </label>
                <input type="email" class="form-control" id="email" name="data[]" value=<?php echo $data['email']?> required>
            </div>
                <button type="submit" name="submit" class="btn btn-primary">Save Data</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</body>

</html>
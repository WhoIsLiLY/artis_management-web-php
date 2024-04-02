<?php
if(!$pdo){
    //echo "<h1>Connect Unsuccessful</h1>";
}else{  
    //echo "<h1>Connect Successful</h1>";
    //print_r($pdo);
}

// PREPARED STATEMENT TO PREVENT SQL INJECTION 
function createUser($pdo, $data){
    $data = [
        'nama' => 'James',
        'tanggal_lahir' => '1990-05-15',
        'gender' => 'male',
        'alamat' => '123 Street Name, City, Country',
        'asal_kota' => 'CityName',
        'no_hp' => '+1234567890',
        'email' => 'james@example.com',
        'username' => 'james90',
        'role' => 'Admin',
    ];

    $sql = '
    INSERT INTO akun (nama, tanggal_lahir, gender, alamat, asal_kota, no_hp, email, username, password, role) 
    VALUES (:nama, :tanggal_lahir, :gender, :alamat, :asal_kota, :no_hp, :email, :username, :password, :role)
    ';

    $statement = $pdo->prepare($sql);

    $statement->execute($data);

    $publisher_id = $pdo->lastInsertId();
}
function updateUser($pdo, $id){
    $data = [
        'nama' => 'James',
        'tanggal_lahir' => '1990-05-15',
        'gender' => 'male',
        'alamat' => '123 Street Name, City, Country',
        'asal_kota' => 'CityName',
        'no_hp' => '+1234567890',
        'email' => 'james@example.com',
        'username' => 'james90',
        'role' => 'Admin',
    ];

    $sql = '
    UPDATE akun SET nama = :nama, tanggal_lahir = :tanggal_lahir, gender = :gender, alamat = :alamat, asal_kota = :asal_kota, no_hp = :no_hp, email = :email, username = :username
    WHERE id = :id
    ';

    $statement = $pdo->prepare($sql);

    $statement->execute($data);

    $publisher_id = $pdo->lastInsertId();
}
function deleteUser($pdo, $id){
    $data = [
        'nama' => 'James',
        'tanggal_lahir' => '1990-05-15',
        'gender' => 'male',
        'alamat' => '123 Street Name, City, Country',
        'asal_kota' => 'CityName',
        'no_hp' => '+1234567890',
        'email' => 'james@example.com',
        'username' => 'james90',
        'role' => 'Admin',
    ];

    $sql = '
    DELETE FROM akun WHERE id = :id
    ';

    $statement = $pdo->prepare($sql);

    $statement->execute($data);

    $publisher_id = $pdo->lastInsertId();
}
//LOGIN USER AUTHENTICATION
function getUserByEmail($pdo, $email) {
    echo "$email";
    $sql = "SELECT * FROM akun WHERE email = :email LIMIT 1";
    print_r($pdo);
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}
function loginUser($pdo, $email, $password) {
    $user_data = getUserByEmail($pdo, $email);
    echo"pass: ".$user_data['password']." $password"; // $2y$10$K3HroGvyF1P72QgCT.5DSeCyLU.nQsGRx5h9P
    if ($user_data && $password == $user_data['password']) {
        echo"success";

        return $user_data['id'];
    }
    return false;
}
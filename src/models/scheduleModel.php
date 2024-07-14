<?php

$method = "";

if(!$pdo){
    //echo "<h1>Connect Unsuccessful</h1>";
}else{  
    //echo "<h1>Connect Successful</h1>";
    //print_r($pdo);
}

if($method == "create" || $method == "update" || $method == "delete"){
    // insert a single publisher
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

    echo "The publisher id {$publisher_id} was {$method}ed";
}else if($method == "read"){
    $id = 5;

    $sql = 'SELECT *
            FROM akun
            WHERE id = :id';

    $statement = $pdo->prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $accounts = $statement->fetch(PDO::FETCH_ASSOC);

    if ($accounts) {
        
        echo "<pre>";
        print_r($accounts);
        echo "</pre>";
        //var_dump($accounts);
        // di laravel -> dump();

        //echo $accounts['id'] . '.' . $accounts['nama'];
    } else {
        echo "The publisher with id $id was not found.";
    }
}
function createUser(){

}
function updateUser(){

}
function deleteUser(){

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
    if ($user_data && $password == $user_data['password']) { // this the problem
        echo"success";
        return $user_data['user_id'];
    }
    return false;
}
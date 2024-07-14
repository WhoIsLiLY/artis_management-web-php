<?php

$pdo = require_once __DIR__ . '\..\config\connection.php';
// $pdo = require_once '/src/config/connection.php';

$method = "read";
if(!$pdo){
    // echo "<h1>Connect Unsuccessful</h1>";
}

if($method == "create" || $method == "update" || $method == "delete"){
    // insert a single publisher
    $data = [
        'nama' => 'James',
        'tanggal_awal' => '1990-05-15',
        'tanggal_akhir' => 'male',
        'akun_id' => '123 Street Name, City, Country',
    ];

    $sql = '
    INSERT INTO kontrak (tanggal_awal, tanggal_akhir, akun_id) 
    VALUES (:tanggal_awal, :tanggal_akhir, :akun_id)
    ';

    $statement = $pdo->prepare($sql);

    $statement->execute($data);

    $publisher_id = $pdo->lastInsertId();

    echo "The publisher id {$publisher_id} was {$method}ed";
}else if($method == "read"){
    $id = 1;

    $sql = 'SELECT *
            FROM kontrak
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
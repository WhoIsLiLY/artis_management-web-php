<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Assuming the server-side logic to retrieve the desired data
    $data = [
        'email' => $_SESSION["email"],
    ];
    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
    die;
} else {
    // Handle other request methods
    http_response_code(405); // Method Not Allowed
    echo 'Only GET requests are allowed';
    die;
}
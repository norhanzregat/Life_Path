<?php
session_start();
header('Content-Type: application/json');

$response = array('status' => 'error', 'user' => null);

if (isset($_SESSION['user_id']) && isset($_SESSION['user_email']) && isset($_SESSION['user_name'])) {
    $response['status'] = 'success';
    $response['user'] = array(
        'id' => $_SESSION['user_id'],
        'email' => $_SESSION['user_email'],
        'name' => $_SESSION['user_name']
    );
}

echo json_encode($response);
?>
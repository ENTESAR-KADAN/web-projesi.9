<?php
session_start();
header('Content-Type: application/json');

$valid_username = 'g231210564';
$valid_password = '123456';

$username = $_POST['kullanici_adi'];
$password = $_POST['sifre'];

$response = [];

if ($username === $valid_username && $password === $valid_password) {
    $_SESSION['username'] = $username;
    $response['status'] = 'success';
    $response['message'] = "Hoş geldiniz, $username!";
} else {
    $response['status'] = 'error';
    $response['message'] = 'Yanlış kullanıcı adı veya şifre.';
}

echo json_encode($response);
?>

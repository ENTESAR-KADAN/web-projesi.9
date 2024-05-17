<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    if (empty($name) || empty($email) || empty($message)) {
        echo json_encode(['status' => 'error', 'message' => 'Tüm alanları doldurun.']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Geçersiz email formatı.']);
        exit;
    }

    $to = "incikadan@gmail.com";  // Replace with your email address
    $subject = "İletişim Formu Mesajı";
    $body = "Ad: $name\nEmail: $email\nMesaj:\n$message";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(['status' => 'success', 'message' => 'Mesajınız başarıyla gönderildi.']);
    } else {
        error_log("Mail error: Failed to send email to $to"); // Log the error
        echo json_encode(['status' => 'error', 'message' => 'Mesaj gönderilemedi.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Geçersiz istek.']);
}
?>

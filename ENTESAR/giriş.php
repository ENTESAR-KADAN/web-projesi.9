<?php
// Kullanıcı adı ve şifre kontrolü
$dogru_kullanici_adi = "g231210564";
$dogru_sifre = "123456";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullanici_adi = $_POST["kullanici_adi"];
    $sifre = $_POST["sifre"];

    if ($kullanici_adi === $dogru_kullanici_adi && $sifre === $dogru_sifre) {
        // Başarılı giriş
        session_start();
        $_SESSION['kullanici_adi'] = $kullanici_adi;
        header("Location: index.html");
        exit();
    } else {
        // Hatalı giriş
        header("Location: hatali_giris.html"); // Hatalı giriş durumunda başka bir sayfaya yönlendirme yapabilirsiniz.
        exit();
    }
}
?>

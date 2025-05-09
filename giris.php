<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if (empty($username) || empty($password)) {
        echo "Kullanıcı adı ve şifre boş bırakılamaz!";
        exit;
    }
    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        echo "Geçerli bir e-posta adresi giriniz!";
        exit;
    }
    if (!str_ends_with($username, "@sakarya.edu.tr")) {
        echo "Sadece @sakarya.edu.tr uzantılı e-posta adresleri kabul edilmektedir!";
        exit;
    }
    $student_number = explode("@", $username)[0];
    if ($password === $student_number) {
        echo "Hoşgeldiniz, " . htmlspecialchars($password);
    } else {
        echo "Giriş başarısız! Tekrar deneyiniz.";
        header("Refresh: 2; url=proje.html");
        exit;
    }
}
?>
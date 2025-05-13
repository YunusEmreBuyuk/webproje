<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if (!str_ends_with($username, "@sakarya.edu.tr")) {
        echo "Sadece @sakarya.edu.tr uzantılı e-posta adresleri kabul edilmektedir!";
        header("Refresh: 1; url=proje.html");
        exit;
    }
    $student_number = explode("@", $username)[0];
    if ($password === $student_number) {
        echo "Hoşgeldiniz, " . htmlspecialchars($password);
        header("Refresh: 1; url=anasayfa.html");
    } else {
        echo "Giriş başarısız! Tekrar deneyiniz.";
        header("Refresh: 1; url=proje.html");
        exit;
    }
}
?>
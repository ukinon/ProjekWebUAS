<?php
include 'connection.php';
$LOGIN = false;
$conn = OpenCon();
session_start();

if (isset($_SESSION['username'])) {
    $LOGIN = true;
}

if (isset($_POST["login"])) {
    $user = $_POST['user'];
    $password = md5($_POST['password']);
    $captcha = $_POST['nilaiCaptcha'];

    $sql = "SELECT * FROM users WHERE username='$user' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($_SESSION["captcha"] == $captcha) {
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            $LOGIN = true;
        } else {
            echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
        }
    } else {
        echo "<script>alert('captcha salah')</script>";
    }
}

if (isset($_POST["logout"])) {
    session_destroy();
    $LOGIN = false;
}

<?php
$LOGIN = false;


if (isset($_POST["login"])) {
    if ("admin" == ($_POST["password"]) && "admin" == ($_POST["user"])) {
        $LOGIN = true;
        
    } else {
        echo "<script>alert('Masukin Username atau Password yang bener dong!!');</script>";
        $LOGIN = false;
    }
}

if (isset($_POST["logout"])) {
    $LOGIN = false;
}

if (isset($_POST["submit"])) {
    echo "<script> alert('File sudah diupload') </script>";
    $LOGIN = true;
}

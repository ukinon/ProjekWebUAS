<?php
session_start();
require 'function.php';


if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["submit"])) {
    //Cek apakah data berhasil di tambahkan / tidak
    if (tambah($_POST) > 0) {
        echo "<script> 
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'index.php';
                </script>
                ";
    } else {
        echo "<script> 
        alert('Data Gagal Ditambahkan');
        document.location.href = 'tambahJadwal.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.38.1/dist/full.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="assets/himatik.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <title>Document</title>
</head>
    <script>

    </script>
</head>

<body class="bg-slate-200 w-full h-screen">

<div class="navbar bg-base-100 sticky top-0 z-50 mb-5">
    <div class="mr-3 text-white">
          <a href="index.php" value="Logout" name="logout" class="btn btn-circle bg-base-200 text-white"> 
          <svg fill="none" class="w-6 h-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"></path>
</svg>
             </a>
    </div>
    <div class=" text-white">
        <h1 class="text-xl"> Jadwal TIK </h1>
    </div>
    </div>

    <div class="bg-slate-400 w-96 h-fit flex flex-col items-center rounded-2xl align-middle m-auto shadow-3xl">
        <h4 class="m-3 text-3xl text-black">Tambah Jadwal</h4>

            <form action="" method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label for="matkul" class="text-black">Mata Kuliah </label></td>
                        <td><input class="input m-1 input-sm bg-slate-200 text-black" type="text" name="matkul" id="matkul" placeholder="Nama Mata Kuliah" required autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td><label for="hari" class="text-black">Hari </label></td>
                        <td><input class="input m-1 input-sm bg-slate-200 text-black" type="text" name="hari" id="hari" placeholder="hari" required></td>
                    </tr>
                    <tr>
                        <td><label for="dosen" class="text-black">Dosen </label></td>
                        <td><input class="input m-1 input-sm bg-slate-200 text-black" type="text" name="dosen" id="dosen" required></td>
                    </tr>
                    <tr>
                        <td><label for="ruangan" class="text-black">Ruangan</label></td>
                        <td><input class="input m-1 input-sm bg-slate-200 text-black" type="text" name="ruangan" id="ruangan" placeholder="ruangan" required></input></td>
                    </tr>
                    <tr>
                        <td><label for="jam" class="text-black">Jam </label></td>
                        <td><input class="input m-1 input-sm bg-slate-200 text-black" type="time" name="jam" id="jam" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="kelas" class="text-black">Kelas </label></td>
                        <td><input class="input m-1 input-sm bg-slate-200 text-black" type="text" name="kelas" id="kelas" required></td>
                    </tr>
                    <tr>
                        <td><label for="sks" class="text-black">Jumlah SKS </label></td>
                        <td><input class="input m-1 input-sm bg-slate-200 text-black" type="text" name="sks" id="sks" required></td>
                    </tr>
                    <tr>
                        <td><label for="semester" class="text-black">Semester </label></td>
                        <td><input class="input m-1 input-sm bg-slate-200 text-black" type="number" name="semester" id="semester" required></td>
                    </tr>
                    <tr>
                        <td><label for="tahunAjaran" class="text-black">Tahun Ajaran </label></td>
                        <td><input class="input m-1 input-sm bg-slate-200 text-black" type="number" name="tahunAjaran" id="tahunAjaran" required></td>
                    </tr>
                </table>

<button type="submit" class="btn btn-wide btn-accent m-3 ml-5 mb-5 bg-black" name="submit">Tambah</button>
            </form>

    </div>




</body>

</html>
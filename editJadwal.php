<?php
session_start();
require 'function.php';


$id = $_GET["id"];
function query($query)
{

    $result = mysqli_query(OpenCon(), $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
$data = query("SELECT * FROM jadwal WHERE id = $id")[0];


if (isset($_POST["submit"])) {
    //Cek apakah data berhasil di diubah / tidak
    if (ubah($_POST) > 0) {
        echo "<script> 
                alert('Data Berhasil Diubah');
                document.location.href = 'index.php';
                </script>
                ";
    } else {
        echo "<script> 
        alert('Data Gagal Diubah');
        document.location.href = 'index.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en" class="bg-slate-100">

<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.38.1/dist/full.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="assets/himatik.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <title>Edit Jadwal</title>

  <style>
::-webkit-calendar-picker-indicator{
    filter: invert(1);
}
    </style>
</head>

<body class="w-full h-screen">
<div class="navbar bg-slate-50 sticky top-0 z-50 mb-5 shadow-md">
    <div class="mr-3 text-white">
          <a href="index.php" value="Logout" name="logout" class="btn btn-circle hover:bg-slate-200 bg-slate-100 text-black"> 
          <svg fill="none" class="w-6 h-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"></path>
</svg>
             </a>
    </div>
    <div class=" text-indigo-600 font-bold">
        <h1 class="text-xl"> Jadwal TIK </h1>
    </div>
    </div>

    <div class="flex justify-center align-middle">
        <div class="bg-slate-300 shadow-lg w-96 h-fit  flex flex-col items-center rounded-2xl align-middle m-auto shadow-3xl">
        <h1 class="m-3 text-3xl text-black">Edit Jadwal</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                    </td>
                </tr>

                <tr>
                    <td><label for="matkul" class="text-black">Mata Kuliah </label></td>
                    <td><input  class="input w-52 m-1 input-sm bg-slate-200 text-black" type="text" name="matkul" id="matkul" placeholder="Mata Kuliah" required autocomplete="off" value="<?= $data["matkul"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="hari" class="text-black">Hari </label></td>
                    <td><input class="input m-1  w-52 input-sm bg-slate-200 text-black" type="text" name="hari" id="hari" placeholder="hari" required value="<?= $data["hari"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="dosen" class="text-black">Dosen </label></td>
                    <td><input class="input m-1  w-52 input-sm bg-slate-200 text-black" type="text" name="dosen" id="dosen" required value="<?= $data["dosen"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="ruangan" class="text-black">Ruangan</label></td>
                    <td><input class="input m-1  w-52 input-sm bg-slate-200 text-black" type="text" name="ruangan" id="ruangan" placeholder="ruangan" required value="<?= $data["ruang"]; ?>"></input></td>
                </tr>
                <tr>
                    <td><label for="jam_awal" class="text-black">Jam </label></td>
                    <td class="text-black"><input class="text-center input m-1 input-sm bg-slate-200 w-24 text-black" type="text" name="jam_awal" id="jam_awal" required value="<?= substr($data["slot_waktu"], 0, 5); ?>"> 
                    -
                    <input class="text-center input m-1 input-sm bg-slate-200 text-black w-24" type="text" name="jam_akhir" id="jam_akhir" required value="<?= substr($data["slot_waktu"], 8); ?>"> 
                    </td>
                </tr>
                <tr>
                    <td><label for="kelas" class="text-black">Kelas </label></td>
                    <td><input class="input m-1 input-sm  w-52 bg-slate-200 text-black" type="text" name="kelas" id="kelas" required value="<?= $data["kelas"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="sks" class="text-black">Jumlah Jam </label></td>
                    <td><input class="input m-1 input-sm  w-52 bg-slate-200 text-black" type="text" name="jumlah_jam" id="jumlah_jam" required value="<?= $data["jumlah_jam"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="semester" class="text-black">Semester </label></td>
                    <td><input class="input m-1 input-sm  w-52 bg-slate-200 text-black" type="text" name="semester" id="semester" required value="<?= $data["semester"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="tahunAjaran" class="text-black">Tahun Ajaran </label></td>
                    <td><input class="input m-1 input-sm  w-52 bg-slate-200 text-black" type="text" name="tahunAjaran" id="tahunAjaran" required value="<?= $data["tahun_ajaran"]; ?>"></td>
                </tr>              
            </table>
            <td><button type="submit" class="btn btn-wide btn-accent m-3 ml-8 mb-0 bg-indigo-600 border-none" name="submit">Ubah</button>
        </form><br>
        </div>
    </div>
</body>

</html>
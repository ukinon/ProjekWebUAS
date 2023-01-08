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
    <title>Document</title>

    <script>

    </script>
</head>

<body>
    <div class="container">
        <h4>Tambah Jadwal</h4>

        <div class="body-add">
            <form action="" method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label for="matkul">Mata Kuliah </label></td>
                        <td><input type="text" name="matkul" id="matkul" placeholder="Nama Mata Kuliah" required autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td><label for="hari">Hari </label></td>
                        <td><input type="text" name="hari" id="hari" placeholder="hari" required></td>
                    </tr>
                    <tr>
                        <td><label for="dosen">Dosen </label></td>
                        <td><input type="text" name="dosen" id="dosen" required></td>
                    </tr>
                    <tr>
                        <td><label for="ruangan">Ruangan</label></td>
                        <td><input type="text" name="ruangan" id="ruangan" placeholder="ruangan" required></input></td>
                    </tr>
                    <tr>
                        <td><label for="jam">Jam </label></td>
                        <td><input type="time" name="jam" id="jam" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="kelas">Kelas </label></td>
                        <td><input type="text" name="kelas" id="kelas" required></td>
                    </tr>
                    <tr>
                        <td><label for="sks">Jumlah SKS </label></td>
                        <td><input type="text" name="sks" id="sks" required></td>
                    </tr>
                    <tr>
                        <td><label for="semester">Semester </label></td>
                        <td><input type="number" name="semester" id="semester" required></td>
                    </tr>
                    <tr>
                        <td><label for="tahunAjaran">Tahun Ajaran </label></td>
                        <td><input type="date" name="tahunAjaran" id="tahunAjaran" required></td>
                    </tr>


                    <tr>
                        <td><button type="submit" name="submit">Tambah</button></td>
                    </tr>
                </table>

            </form>
        </div>

    </div>




</body>

</html>
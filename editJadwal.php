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


    //echo ubah($_POST);

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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container-all">

        <h1>Edit Catalog</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                    </td>
                </tr>

                <tr>
                    <td><label for="matkul">Mata Kuliah </label></td>
                    <td><input type="text" name="matkul" id="matkul" placeholder="Mata Kuliah" require autocomplete="off" value="<?= $data["matkul"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="hari">Hari </label></td>
                    <td><input type="text" name="hari" id="hari" placeholder="hari" require value="<?= $data["hari"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="dosen">Dosen </label></td>
                    <td><input type="text" name="dosen" id="dosen" require value="<?= $data["dosen"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="ruangan">Ruangan</label></td>
                    <td><input type="text" name="ruangan" id="ruangan" placeholder="ruangan" require value="<?= $data["ruang"]; ?>"></input></td>
                </tr>
                <tr>
                    <td><label for="jam">Jam </label></td>
                    <td><input type="time" name="jam" id="jam" require value="<?= $data["jam"]; ?>">
                    </td>
                </tr>
                <tr>
                    <td><label for="kelas">Kelas </label></td>
                    <td><input type="text" name="kelas" id="kelas" require value="<?= $data["kelas"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="sks">Jumlah SKS </label></td>
                    <td><input type="text" name="sks" id="sks" require value="<?= $data["sks"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="semester">Semester </label></td>
                    <td><input type="number" name="semester" id="semester" require value="<?= $data["semester"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="tahunAjaran">Tahun Ajaran </label></td>
                    <td><input type="date" name="tahunAjaran" id="tahunAjaran" require value="<?= $data["tahun_ajaran"]; ?>"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="submit" require>Ubah</button></td>
                </tr>
            </table>
        </form><br>
    </div>
</body>

</html>
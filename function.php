<?php
require 'connection.php';

$conn = OpenCon();

function tambah($data)
{
    global $conn;
    $matkul = htmlspecialchars($data["matkul"]);
    $dosen = htmlspecialchars($data["dosen"]);
    $hari = htmlspecialchars($data["hari"]);
    $sks = htmlspecialchars($data["sks"]);
    $jam = htmlspecialchars($data["jam"]);
    $tahun = htmlspecialchars($data["tahunAjaran"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $ruangan = htmlspecialchars($data["ruangan"]);
    $semester = htmlspecialchars($data["semester"]);

    //query insert data

    $tahunAjaran = date('Y', strtotime($tahun));
    $query = "INSERT INTO jadwal VALUES ('','$jam','$matkul','$hari','$dosen','$ruangan','$sks','$tahunAjaran','$semester','$kelas') ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($data)
{

    global $conn;
    $id = $data["id"];
    $matkul = htmlspecialchars($data["matkul"]);
    $dosen = htmlspecialchars($data["dosen"]);
    $hari = htmlspecialchars($data["hari"]);
    $sks = htmlspecialchars($data["sks"]);
    $jam = htmlspecialchars($data["jam"]);
    $tahun = htmlspecialchars($data["tahunAjaran"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $ruangan = htmlspecialchars($data["ruangan"]);
    $semester = htmlspecialchars($data["semester"]);



    // query insert data 
    $tahunAjaran = date('Y', strtotime($tahun));
    $query = "UPDATE jadwal SET 
                matkul = '$matkul',
                jam = '$jam',           
                dosen = '$dosen',
                sks = '$sks',
                hari = '$hari',
                ruang = '$ruangan',
                tahun_ajaran = '$tahunAjaran',           
                kelas = '$kelas',
                semester = '$semester'
                WHERE id = '$id'
                ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

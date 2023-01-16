<?php
require 'connection.php';

$conn = OpenCon();

function tambah($data)
{
    global $conn;
    $matkul = htmlspecialchars($data["matkul"]);
    $dosen = htmlspecialchars($data["dosen"]);
    $hari = htmlspecialchars($data["hari"]);
    $jumlah_jam = htmlspecialchars($data["jumlah_jam"]);
    $jam_awal = htmlspecialchars($data["jam_awal"]);
    $jam_akhir = htmlspecialchars($data["jam_akhir"]);
    $tahun = htmlspecialchars($data["tahunAjaran"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $ruangan = htmlspecialchars($data["ruangan"]);
    $semester = htmlspecialchars($data["semester"]);
    //query insert data

    $query = "INSERT INTO jadwal VALUES ('','$jam_awal - $jam_akhir', '$matkul','$hari','$dosen','$ruangan','$jumlah_jam','$tahun','$semester','$kelas') ";

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
    $jumlah_jam = htmlspecialchars($data["jumlah_jam"]);
    $jam_awal = htmlspecialchars($data["jam_awal"]);
    $jam_akhir = htmlspecialchars($data["jam_akhir"]);
    $tahun = htmlspecialchars($data["tahunAjaran"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $ruangan = htmlspecialchars($data["ruangan"]);
    $semester = htmlspecialchars($data["semester"]);



    // query insert data 
    $query = "UPDATE jadwal SET 
                matkul = '$matkul',
                slot_waktu = '$jam_awal - $jam_akhir',           
                dosen = '$dosen',
                jumlah_jam = '$jumlah_jam',
                hari = '$hari',
                ruang = '$ruangan',
                tahun_ajaran = '$tahun',           
                kelas = '$kelas',
                semester = '$semester'
                WHERE id = '$id'
                ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

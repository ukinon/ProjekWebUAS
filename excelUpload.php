<?php
$conn = OpenCon();
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if (isset($_POST['submit'])) {
  $nama_file_baru = isset($_FILES['file']['name']);
  $path = 'tmp/' . $nama_file_baru;
  if (is_file('tmp/' . $nama_file_baru))
    unlink('tmp/' . $nama_file_baru);

  $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
  $tmp_file = $_FILES['file']['tmp_name'];


  if ($ext == "xlsx") {
    move_uploaded_file($tmp_file, 'tmp/' . $nama_file_baru);
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load('tmp/' . $nama_file_baru);
    $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

    $numrow = 1;
    foreach ($sheet as $row) {

      $jam = $row['A'];
      $matkul = $row['B'];
      $hari = $row['C'];
      $dosen = $row['D'];
      $ruang = $row['E'];
      $sks = $row['F'];
      $tahun_ajaran = $row['G'];
      $semester = $row['H'];
      $kelas = $row['I'];

      if ($jam == "" && $matkul == "" && $hari == "" && $dosen == "" && $ruang == "" && $sks == "" && $tahun_ajaran == "" && $semester == "" && $kelas == "")
        continue;

      if ($numrow > 1) {
        $query = "insert into jadwal(jam, matkul, hari, dosen, ruang, sks, tahun_ajaran, semester, kelas) values($jam ,'" . $matkul . "','" . $hari . "','" . $dosen . "','" . $ruang . "', $sks, $tahun_ajaran, $semester,'" . $kelas . "')";
        $result = mysqli_query($conn, $query);
      }
      $numrow++;
    }
    echo "<script>alert('data berhasil diimport');</script>";
    unlink($path);
  } 
  else if($ext == 'json'){
    move_uploaded_file($tmp_file, 'tmp/' . $nama_file_baru);
    $json = file_get_contents("$path");
    $data = json_decode($json, true);

    foreach($data as $jadwal){
      $jam = $jadwal["jam"];
      $matkul = $jadwal["matkul"];
      $hari = $jadwal["hari"];
      $dosen = $jadwal["dosen"];
      $ruang = $jadwal["ruang"];
      $tahun_ajaran = $jadwal["tahun_ajaran"];
      $sks = $jadwal["sks"];
      $semester = $jadwal["semester"];
      $kelas = $jadwal["kelas"];

      $conn = OpenCon();

      $query = "insert into jadwal(jam, matkul, hari, dosen, ruang, sks, tahun_ajaran, semester, kelas) values($jam ,'" . $matkul . "','" . $hari . "','" . $dosen . "','" . $ruang . "', $sks, $tahun_ajaran, $semester,'" . $kelas . "')";
      $result = mysqli_query($conn, $query);
    }
    echo "<script>alert('data berhasil diimport');</script>";
    unlink($path);
  }
  else{
    echo "<script> alert('file harus dalam bentuk .xslx atau .json!') </script>";
  }

 
}

<?php
$conn = OpenCon();
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if (isset($_POST['submit'])) {
  $nama_file_baru = $_FILES['file']['name'];
  $path = 'tmp/' . $nama_file_baru;
  if (is_file('tmp/' . $nama_file_baru))
    unlink('tmp/' . $nama_file_baru);

  $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
  $tmp_file = $_FILES['file']['tmp_name'];


  if ($ext == "xlsx") {
    move_uploaded_file($tmp_file, 'tmp/'. $nama_file_baru);
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load('tmp/' . $nama_file_baru);
    $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

    $numrow = 1;
    foreach ($sheet as $row) {

      $jam_awal = $row['A'];
      $jam_akhir = $row['B'];
      $matkul = $row['C'];
      $hari = $row['D'];
      $dosen = $row['E'];
      $ruang = $row['F'];
      $sks = $row['G'];
      $tahun_ajaran = $row['H'];
      $semester = $row['I'];
      $kelas = $row['J'];

      if ($jam_awal == "" && $jam_akhir == "" && $matkul == "" && $hari == "" && $dosen == "" && $ruang == "" && $sks == "" && $tahun_ajaran == "" && $semester == "" && $kelas == "")
        continue;

      if ($numrow > 1) {
        $query = "insert into jadwal(jam_awal, jam_akhir, matkul, hari, dosen, ruang, sks, tahun_ajaran, semester, kelas) values($jam_awal, $jam_akhir, '" . $matkul . "','" . $hari . "','" . $dosen . "','" . $ruang . "', $sks, $tahun_ajaran, $semester,'" . $kelas . "')";
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
      $jam_awal = $jadwal["jam_awal"];
      $jam_akhir = $jadwal["jam_akhir"];
      $matkul = $jadwal["matkul"];
      $hari = $jadwal["hari"];
      $dosen = $jadwal["dosen"];
      $ruang = $jadwal["ruang"];
      $tahun_ajaran = $jadwal["tahun_ajaran"];
      $sks = $jadwal["sks"];
      $semester = $jadwal["semester"];
      $kelas = $jadwal["kelas"];

      $conn = OpenCon();

      $query = "insert into jadwal(jam_awal, jam_akhir, matkul, hari, dosen, ruang, sks, tahun_ajaran, semester, kelas) values($jam_awal, $jam_akhir, '" . $matkul . "','" . $hari . "','" . $dosen . "','" . $ruang . "', $sks, $tahun_ajaran, $semester,'" . $kelas . "')";
      $result = mysqli_query($conn, $query);
    }
    echo "<script>alert('data berhasil diimport');</script>";
    unlink($path);
  }
  else{
    echo "<script> alert('file harus dalam bentuk .xslx atau .json!') </script>";
  }

 
}

<?php
$conn = OpenCon();
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if (isset($_POST['submit'])) {
  $nama_file_baru = $_FILES['file']['name'];
  $path = 'temp/' . $nama_file_baru;
  if (is_file('temp/' . $nama_file_baru))
    unlink('temp/' . $nama_file_baru);

  $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
  $tmp_file = $_FILES['file']['tmp_name'];


  if ($ext == "xlsx") {
    move_uploaded_file($tmp_file, 'temp/'. $nama_file_baru);
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load('temp/' . $nama_file_baru);
    $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

    $numrow = 1;
    foreach ($sheet as $row) {

      $slot_waktu = $row['A'];
      $matkul = $row['B'];
      $hari = $row['C'];
      $dosen = $row['D'];
      $ruang = $row['E'];
      $jumlah_jam = $row['F'];
      $tahun_ajaran = $row['G'];
      $semester = $row['H'];
      $kelas = $row['I'];

      if ($slot_waktu == "" && $matkul == "" && $hari == "" && $dosen == "" && $ruang == "" && $jumlah_jam == "" && $tahun_ajaran == "" && $semester == "" && $kelas == "")
        continue;

      if ($numrow > 1) {
        $query = "insert into jadwal(slot_waktu, matkul, hari, dosen, ruang, jumlah_jam, tahun_ajaran, semester, kelas) values('" . $slot_waktu . "', '" . $matkul . "','" . $hari . "','" . $dosen . "','" . $ruang . "', $jumlah_jam, '" .$tahun_ajaran. "', '" .$semester. "','" . $kelas . "')";
        $result = mysqli_query($conn, $query);
      }
      $numrow++;
    }
    echo "<script>alert('data berhasil diimport'); location.href='index.php'</script>";
    unlink($path);
  } 
  else if($ext == 'json'){
    move_uploaded_file($tmp_file, 'temp/' . $nama_file_baru);
    $json = file_get_contents("$path");
    $data = json_decode($json, true);

    foreach($data as $jadwal){
      $slot_waktu = $jadwal["slot_waktu"];
      $matkul = $jadwal["matkul"];
      $hari = $jadwal["hari"];
      $dosen = $jadwal["dosen"];
      $ruang = $jadwal["ruang"];
      $tahun_ajaran = $jadwal["tahun_ajaran"];
      $jumlah_jam = $jadwal["jumlah_jam"];
      $semester = $jadwal["semester"];
      $kelas = $jadwal["kelas"];

      $conn = OpenCon();

      $query = "insert into jadwal(slot_waktu, matkul, hari, dosen, ruang, jumlah_jam, tahun_ajaran, semester, kelas) values($jam_awal, $jam_akhir, '" . $matkul . "','" . $hari . "','" . $dosen . "','" . $ruang . "', $jumlah_jam, $tahun_ajaran, $semester,'" . $kelas . "')";
      $result = mysqli_query($conn, $query);
    }
    echo "<script>alert('data berhasil diimport'); location.href='index.php'</script>";
    unlink($path);
  }
  else{
    echo "<script> alert('file harus dalam bentuk .xslx atau .json!') location.href='index.php' </script>";
  }
 
}

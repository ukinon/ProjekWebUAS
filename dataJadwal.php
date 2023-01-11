<?php
require 'check.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <script src="https://kit.fontawesome.com/a543fba6bd.js" crossorigin="anonymous"></script>
</head>

<body>
  <table class="w-full text-black border-white table-compact shadow-lg text-center max-h-96 overflow-x-scroll">
    <thead class="bg-indigo-400 text-white sticky top-0">
      <tr>
        <td class="w-10"> No </td>
        <td> Jam </td>
        <td> Mata Kuliah </td>
        <td> Hari </td>
        <td> Dosen </td>
        <td> Ruang </td>
        <td> SKS </td>
        <td> Tahun Ajaran </td>
        <td> Semester </td>
        <td> Kelas </td>
        <?php if ($LOGIN == true) { ?>
          <td> Aksi </td>
        <?php } ?>
      </tr>
    </thead>
    <tbody class="bg-slate-200 text-black">
      <?php
      $s_hari = "";
      $s_dosen = "";
      $s_kelas = "";
      $s_keyword = "";

      if (isset($_POST['keyword'])) {
        $s_keyword = $_POST['keyword'];
      }
      if (isset($_POST['hari'])) {
        $s_hari = $_POST['hari'];
      }
      if (isset($_POST['dosen'])) {
        $s_dosen = $_POST['dosen'];
      }
      if (isset($_POST['kelas'])) {
        $s_kelas = $_POST['kelas'];
      }

      $search_hari = '%' . $s_hari . '%';
      $search_keyword = '%' . $s_keyword . '%';
      $search_dosen = '%' . $s_dosen . '%';
      $search_kelas = '%' . $s_kelas . '%';

      $conn = OpenCon();

      $batas = 10;
      $halaman = isset($_POST['halaman']) ? $_POST['halaman'] : 1;
      $halaman_awal = ($halaman - 1) * $batas;
      $nomor = $halaman_awal + 1;

      $sql = "SELECT * FROM jadwal WHERE hari LIKE ? AND dosen LIKE ? AND kelas LIKE ? AND (jam_awal LIKE ? OR jam_akhir LIKE ? OR hari LIKE ? OR dosen LIKE ? OR matkul LIKE ? OR dosen LIKE ? OR ruang LIKE ? OR sks LIKE ? OR tahun_ajaran LIKE ? OR semester LIKE ? or kelas LIKE ?) limit $halaman_awal, $batas";
      $sort = $conn->prepare($sql);
      $sort->bind_param('ssssssssssssss', $search_hari, $search_dosen, $search_kelas, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword);
      $sort->execute();
      $result = $sort->get_result();

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $id = $row["id"];
          $jam_awal = substr( $row['jam_awal'],0,5 );
          $jam_akhir = substr( $row['jam_akhir'],0,5 );
          $matkul = $row["matkul"];
          $hari = $row["hari"];
          $dosen = $row["dosen"];
          $ruang = $row["ruang"];
          $sks = $row["sks"];
          $tahun = $row["tahun_ajaran"];
          $semester = $row["semester"];
          $kelas = $row["kelas"];

          echo '<tr> 
                        <td>' . $nomor++ . '</td>
                        <td>' . $jam_awal . ' - '.$jam_akhir.'</td> 
                        <td>' . $matkul . '</td> 
                        <td>' . $hari . '</td> 
                        <td>' . $dosen . '</td> 
                        <td>' . $ruang . '</td> 
                        <td>' . $sks . '</td> 
                        <td>' . $tahun . '</td> 
                        <td>' . $semester . '</td> 
                        <td>' . $kelas . '</td>'
      ?>
          <?php
          if ($LOGIN == true) { ?>
            <td> <a href="editJadwal.php?id=<?= $row["id"]; ?>" class="text-blue-600"><i class="fas fa-edit"></i></a> |
              <a href="deleteJadwal.php?id=<?php echo $id; ?>" onclick="return confirm('Are You Sure?');" class="text-red-600"><i class="fa-regular fa-trash-can"></i></a>
            </td>
        <?php
            '</tr>';
          }
        }
      } else {
        echo '<tr> 
          <td> ' . $nomor++ . ' </td> 
          <td> No Data </td> 
          <td> No Data </td> 
          <td> No Data </td> 
          <td> No Data </td> 
          <td> No Data </td> 
          <td> No Data </td> 
          <td> No Data </td> 
          <td> No Data </td> 
          <td> No Data </td>'
        ?>
        <?php
        if ($LOGIN == true) { ?>
          <td>No Data</td>
      <?php
          '</tr>';
        }
      }

      ?>
    </tbody>
  </table>
</body>

</html>


<?php

$query = mysqli_query($conn, "select * from jadwal");
$jumlah_data = mysqli_num_rows($query);
$total_halaman = ceil($jumlah_data / $batas);

?>

<!---Button Pagination--->
<ul class="btn-group flex justify-center mt-5">
  <?php
  for ($x = 1; $x <= $total_halaman; $x++) {
  ?>
    <li class="btn no-animation bg-indigo-300 text-black border-none halaman" id="<?php echo $x ?>"><a><?php echo $x; ?></a></li>
  <?php
  }
  ?>
</ul>
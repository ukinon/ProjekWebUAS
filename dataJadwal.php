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
        <td> Jumlah Jam </td>
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

      $sql = "SELECT * FROM jadwal WHERE hari LIKE ? AND dosen LIKE ? AND kelas LIKE ? AND (slot_waktu LIKE ? OR hari LIKE ? OR dosen LIKE ? OR matkul LIKE ? OR dosen LIKE ? OR ruang LIKE ? OR jumlah_jam LIKE ? OR tahun_ajaran LIKE ? OR semester LIKE ? or kelas LIKE ?) limit $halaman_awal, $batas";
      $sort = $conn->prepare($sql);
      $sort->bind_param('sssssssssssss', $search_hari, $search_dosen, $search_kelas, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword);
      $sort->execute();
      $result = $sort->get_result();

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $id = $row["id"];
          $slot_waktu = $row["slot_waktu"];
          $matkul = $row["matkul"];
          $hari = $row["hari"];
          $dosen = $row["dosen"];
          $ruang = $row["ruang"];
          $jumlah_jam = $row["jumlah_jam"];
          $tahun = $row["tahun_ajaran"];
          $semester = $row["semester"];
          $kelas = $row["kelas"];

          echo '<tr> 
                        <td>' . $nomor++ . '</td>
                        <td>' . $slot_waktu .'</td> 
                        <td>' . $matkul . '</td> 
                        <td>' . $hari . '</td> 
                        <td>' . $dosen . '</td> 
                        <td>' . $ruang . '</td> 
                        <td>' . $jumlah_jam . '</td> 
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

  <!-- <?php
$sql = "SELECT * FROM jadwal WHERE hari LIKE ? AND dosen LIKE ? AND kelas LIKE ? AND (slot_waktu LIKE ?  OR hari LIKE ? OR dosen LIKE ? OR matkul LIKE ? OR dosen LIKE ? OR ruang LIKE ? OR jumlah_jam LIKE ? OR tahun_ajaran LIKE ? OR semester LIKE ? or kelas LIKE ?)";
$sort = $conn->prepare($sql);
$sort->bind_param('sssssssssssss', $search_hari, $search_dosen, $search_kelas, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword);
$sort->execute();
$sort -> store_result();
$jumlah_data = $sort -> num_rows();
$total_halaman = ceil($jumlah_data / $batas);
?> -->

<!---Button Pagination--->
<div class="flex justify-center flex-row">
  <button id="prev" <?php if($halaman == 1) {?> 
  disabled class="h-10 w-20  rounded-lg mt-8 mr-3 bg-indigo-200 text-black border-none cursor-not-allowed"
  <?php }?>
  class="h-10 w-20 hover:bg-indigo-400 active:bg-indigo-500 rounded-lg mt-8 mr-3 bg-indigo-300 text-black border-none">Previous</button>
<select class="btn-group w-20 h-10 bg-indigo-300 text-black rounded-lg text-center mt-8" id="halaman">
  <?php
  for ($x = 1; $x <= $total_halaman; $x++) {
  ?>
    <option value="<?php echo $x ?>" <?php if($x == $halaman){echo "selected";} ?>> <a><?php echo $x; ?></a> </option>
  <?php
  }
  ?>
</select>
<button id="next" 
<?php if($halaman == $total_halaman) {?> 
  disabled class="h-10 w-20  rounded-lg mt-8 ml-3 bg-indigo-200 text-black border-none cursor-not-allowed"
  <?php }?> 
class="h-10 w-20 hover:bg-indigo-400 active:bg-indigo-500 rounded-lg mt-8 ml-3 bg-indigo-300 text-black border-none">Next</button>
</div>
</body>
</html>



<?php
require 'check.php';
?>
<table class="w-full text-black border-white table-compact shadow-lg text-center max-h-96 overflow-x-scroll">
        <thead class="bg-slate-700 text-white sticky top-0">
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
                <?php if($LOGIN == true){ ?>
                <td> status </td> 
                <?php } ?>
            </tr>
        </thead>
        <tbody class="bg-slate-300 text-black">
          <?php
          $s_hari = "";
          $s_dosen = "";
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
        if (isset($_POST['matkul'])) {
        $s_matkul = $_POST['matkul'];
        }
       
        $search_hari = '%'. $s_hari .'%';
        $search_keyword = '%'. $s_keyword .'%';
        $search_dosen = '%'. $s_dosen .'%';

        $conn = OpenCon();

        $batas = 10;
				$halaman = isset($_POST['halaman'])?$_POST['halaman']:1;
				$halaman_awal = ($halaman-1) * $batas;
        $nomor = $halaman_awal+1;

          $sql = "SELECT * FROM jadwal WHERE hari LIKE ? AND dosen LIKE ? AND (hari LIKE ? OR dosen LIKE ? OR matkul LIKE ? OR dosen LIKE ? OR ruang LIKE ? OR sks LIKE ? OR tahun_ajaran LIKE ? OR semester LIKE ? or kelas LIKE ?) limit $halaman_awal, $batas";
          $sort = $conn -> prepare($sql);
          $sort->bind_param('sssssssssss', $search_hari, $search_dosen, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword);
          $sort->execute();
          $result = $sort->get_result();

          if ($result->num_rows > 0) {          
          while ($row = $result -> fetch_assoc()) {
              $id = $row["id"];
              $jam = $row["jam"];
              $matkul = $row["matkul"];
              $hari = $row["hari"];
              $dosen = $row["dosen"];
              $ruang = $row["ruang"];
              $sks = $row["sks"];
              $tahun = $row["tahun_ajaran"];
              $semester = $row["semester"];
              $kelas = $row["kelas"]; 
              
              echo '<tr> 
                        <td>'. $nomor++ .'</td>
                        <td>'.$jam.'</td> 
                        <td>'.$matkul.'</td> 
                        <td>'.$hari.'</td> 
                        <td>'.$dosen.'</td> 
                        <td>'.$ruang.'</td> 
                        <td>'.$sks.'</td> 
                        <td>'.$tahun.'</td> 
                        <td>'.$semester.'</td> 
                        <td>'.$kelas.'</td>'
                        ?>
                        <?php 
                        if($LOGIN == true) {?> 
                        <td> <a href="editJadwal.php?id=<?php echo $id; ?>" class="text-blue-500">edit</a> |
								        <a href="deleteJadwal.php?id=<?php echo $id; ?>" class="text-red-500">delete</a></td>
                          <?php
                    '</tr>';
        }
      }
         } else {
          echo '<tr> 
          <td> '.$nomor++.' </td> 
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
                        if($LOGIN == true) {?> 
                        <td>No Data</td>
                          <?php
                    '</tr>';
        }
          }
          
          ?>
        </tbody>
      </table>
<?php

$query = mysqli_query($conn, "select * from jadwal");
$jumlah_data = mysqli_num_rows($query);
$total_halaman = ceil($jumlah_data / $batas);

?>
      <ul class="btn-group flex justify-center mt-5">
				<?php 
				for($x=1;$x<=$total_halaman;$x++){
          $link_active = ($halaman == $x)? ' active' : '';
					?> 
					<li class="btn bg-slate-500 text-white border-none halaman <?php $link_active ?>" id="<?php echo $x ?>"><a><?php echo $x; ?></a></li>
					<?php
				}
				?>				
  </ul>
<?php
require 'check.php';
?>

<table class=" w-full text-black border-white table-compact shadow-lg text-center max-h-96">
        <thead class="bg-white text-black sticky top-0">
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
        <tbody class="bg-slate-200 text-black color">
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
          $sql = "SELECT * FROM jadwal WHERE hari LIKE ? AND dosen LIKE ? AND (hari LIKE ? OR dosen LIKE ? OR matkul LIKE ? OR dosen LIKE ? OR ruang LIKE ? OR sks LIKE ? OR tahun_ajaran LIKE ? OR semester LIKE ? or kelas LIKE ?)";
          $sort = $conn -> prepare($sql);
          $sort->bind_param('sssssssssss', $search_hari, $search_dosen, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword);
          $sort->execute();
          $result = $sort->get_result();
          $nomor = 1; 

          if ($result->num_rows > 0) {          
          while ($row = $result->fetch_assoc()) {
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
                        <td> <a href="editJadwal.php?id=<?php echo $id; ?>" style="color: blue;">edit</a> |
								        <a href="deleteJadwal.php?id=<?php echo $id; ?>" style="color: red;">delete</a></td>
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
          <td> No Data </td> 
          <td> No Data </td> 
          </tr>';
          }
          ?>
        </tbody>
      </table>
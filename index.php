<?php
require "check.php";
require "excelUpload.php";
require 'vendor/autoload.php';

error_reporting(E_ALL ^ E_WARNING);
$conn = OpenCon();

?>

<!DOCTYPE html>
<html lang="en" class="bg-slate-100">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.38.1/dist/full.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="assets/himatik.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
  <title>Jadwal TIK</title>
</head>

<body>

  <script>
    $(document).ready(function() {
      load_data();
      function load_data(hari, dosen, kelas, ruang, matkul, keyword, page) {
        $.ajax({
          method: "POST",
          url: "dataJadwal.php",
          data: {
            hari: hari,
            dosen: dosen,
            kelas: kelas,
            ruang: ruang,
            keyword: keyword,
            matkul: matkul,
            halaman: page
          },
          success: function(data) {
            $('#data').html(data);
          }
        });
      }

      $(document).on('change', '#halaman', function() {
        var page = $(this).val();
        var hari = $("#s_hari").val();
        var matkul = $("#s_matkul").val();
        var ruang = $("#s_ruang").val();
        var dosen = $("#s_dosen").val();
        var kelas = $("#s_kelas").val();
        var keyword = $("#s_keyword").val();
        load_data(hari, dosen, kelas, ruang, matkul, keyword, page);
      });
      $(document).on('click', '#next', function() {
        var page = parseInt($("#halaman").val()) + 1;
        var hari = $("#s_hari").val();
        var matkul = $("#s_matkul").val();
        var ruang = $("#s_ruang").val();
        var dosen = $("#s_dosen").val();
        var kelas = $("#s_kelas").val();
        var keyword = $("#s_keyword").val();
        load_data(hari, dosen, kelas, ruang, matkul, keyword, page);
      });
      $(document).on('click', '#prev', function() {
        var page = parseInt($("#halaman").val()) - 1;
        var hari = $("#s_hari").val();
        var matkul = $("#s_matkul").val();
        var ruang = $("#s_ruang").val();
        var dosen = $("#s_dosen").val();
        var kelas = $("#s_kelas").val();
        var keyword = $("#s_keyword").val();
        load_data(hari, dosen, kelas, ruang, matkul, keyword, page);
      });

      $('#s_keyword').keyup(function() {
        var hari = $("#s_hari").val();
        var matkul = $("#s_matkul").val();
        var ruang = $("#s_ruang").val();
        var dosen = $("#s_dosen").val();
        var kelas = $("#s_kelas").val();
        var keyword = $("#s_keyword").val();
        load_data(hari, dosen, kelas, ruang, matkul, keyword, 1);
      });
      $('#s_hari').change(function() {
        var hari = $("#s_hari").val();
        var matkul = $("#s_matkul").val();
        var ruang = $("#s_ruang").val();
        var dosen = $("#s_dosen").val();
        var kelas = $("#s_kelas").val();
        var keyword = $("#s_keyword").val();
        load_data(hari, dosen, kelas, ruang, matkul, keyword, 1);
      });
      $('#s_dosen').change(function() {
        var hari = $("#s_hari").val();
        var matkul = $("#s_matkul").val();
        var ruang = $("#s_ruang").val();
        var dosen = $("#s_dosen").val();
        var kelas = $("#s_kelas").val();
        var keyword = $("#s_keyword").val();
        load_data(hari, dosen, kelas, ruang, matkul, keyword, 1);
      });
      $('#s_kelas').change(function() {
        var hari = $("#s_hari").val();
        var matkul = $("#s_matkul").val();
        var ruang = $("#s_ruang").val();
        var dosen = $("#s_dosen").val();
        var kelas = $("#s_kelas").val();
        var keyword = $("#s_keyword").val();
        load_data(hari, dosen, kelas, ruang, matkul, keyword, 1);
      });
      $('#s_ruang').change(function() {
        var hari = $("#s_hari").val();
        var matkul = $("#s_matkul").val();
        var ruang = $("#s_ruang").val();
        var dosen = $("#s_dosen").val();
        var kelas = $("#s_kelas").val();
        var keyword = $("#s_keyword").val();
        load_data(hari, dosen, kelas, ruang, matkul, keyword, 1);
      });
      $('#s_matkul').change(function() {
        var hari = $("#s_hari").val();
        var matkul = $("#s_matkul").val();
        var ruang = $("#s_ruang").val();
        var dosen = $("#s_dosen").val();
        var kelas = $("#s_kelas").val();
        var keyword = $("#s_keyword").val();
        load_data(hari, dosen, kelas, ruang, matkul, keyword, 1);
      });
    });
  </script>

  <div class="navbar bg-slate-50 sticky top-0 z-50 shadow-md">
    <div class="flex-1 text-slate-800">
        <h1 class="text-xl font-bold text-indigo-700"> Jadwal TIK </h1>
    </div>
    <div class="flex-none gap-2">
      <form action="" method="POST">
        <input type="text" placeholder="Search???" class="input input-bordered border-slate-200 bg-slate-200 text-black" aria-label="Search" name="s_keyword" id="s_keyword" autocomplete="off" />
      </form>
      <?php if ($LOGIN === true) { ?>
        <form id="logout-form" method="post" target="_self">
          <input type="submit" value="Logout" name="logout" class="btn bg-red-300 hover:bg-red-400 text-black border-none">
        </form>
      <?php } ?>
    </div>
  </div>
  </div>
  </div>
  </div>

  <div class="option mt-3">
    <div class="flex justify-center m-5 mr-16">
      <div <?php if ($LOGIN === true) { ?>class="flex flex-col items-center bg-slate-300 w-96 rounded-lg shadow-lg mb-5 ml-10 mt-5" <?php } ?> <?php if ($LOGIN === false) { ?>class="hidden" <?php } ?>>
        <label class="m-3 ml-4 text-xl text-black font-bold">Upload Data Jadwal</label>
        <form class="flex flex-col" method="post" action="" enctype="multipart/form-data">
          <input type="file" name="file" class="input-bordered shadow-lg file-input file-input-accent bg-slate-200 text-black  m-3" accept=".json, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"/>
          <button type="submit" name="submit" value="submit" <?php if ($LOGIN === true) { ?>class="btn btn-wide btn-accent bg-indigo-600 text-white border-none text-sm p-2 m-3 ml-11" <?php } ?> <?php if ($LOGIN === false) { ?> class="hidden" <?php } ?>> Upload </button>
        </form>
      </div>
    </div>
    <div class="flex justify-center flex-col flex-wrap-reverse gap-5 md:gap-0 lg:gap-0 <?php if($LOGIN == false){ echo "gap-0"; } ?>">
    <div class="flex justify-center flex-row flex-wrap-reverse gap-5 md:gap-0 lg:gap-0 <?php if($LOGIN == false){ echo "gap-0"; } ?>">
      <form method="POST" action="">
        <select name="s_hari" id="s_hari" class="rounded-md text-center w-20 h-11 bg-indigo-300 text-black h-10 mr-3">
          <option value=""> Hari</option>
          <?php
          $sql ="SELECT hari FROM jadwal group by hari order by field(hari, 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu')";
          $query = $conn -> prepare($sql);
          $query -> execute();
          $result = $query -> get_result();
          while($data = $result -> fetch_assoc()){
          ?>
          <option value="<?=$data['hari']?>"><?=$data['hari']?></option> 
          <?php
          }
          ?>
        </select>

        <select tabindex="0" name="s_dosen" id="s_dosen" class="rounded-md text-center w-24 h-11 bg-indigo-300 text-black h-10 mr-3">
           <option value=""> Dosen </option>
          <?php
          $sql ="SELECT dosen FROM jadwal group by dosen order by dosen asc";
          $query = $conn -> prepare($sql);
          $query -> execute();
          $result = $query -> get_result();
          while($data = $result -> fetch_assoc()){
          ?>
          <option value="<?=$data['dosen']?>"><?=$data['dosen']?></option> 
          <?php
          }
          ?>
        </select>

        <select tabindex="0" name="s_kelas" id="s_kelas" class="rounded-md text-center w-20 h-11 bg-indigo-300 text-black h-10">
           <option value="">Kelas</option>
          <?php
          $sql ="SELECT kelas FROM jadwal group by kelas order by kelas asc";
          $query = $conn -> prepare($sql);
          $query -> execute();
          $result = $query -> get_result();
          while($data = $result -> fetch_assoc()){
          ?>
          <option value="<?=$data['kelas']?>"><?=$data['kelas']?></option> 
          <?php
          }
          ?>
        </select>
        </div>
        <div class="flex justify-center flex-row flex-wrap-reverse gap-5 mt-3 md:gap-0 lg:gap-0 <?php if($LOGIN == false){ echo "gap-0"; } ?>">
        <select tabindex="0" name="s_ruang" id="s_ruang" class="rounded-md text-center w-24 h-11 bg-indigo-300 text-black h-10 mr-3">
           <option value="">Ruangan</option>
          <?php
          $sql ="SELECT ruang FROM jadwal group by ruang order by ruang asc";
          $query = $conn -> prepare($sql);
          $query -> execute();
          $result = $query -> get_result();
          while($data = $result -> fetch_assoc()){
          ?>
          <option value="<?=$data['ruang']?>"><?=$data['ruang']?></option> 
          <?php
          }
          ?>
        </select>

           <select tabindex="0" name="s_matkul" id="s_matkul" class="rounded-md text-center w-32 h-11 bg-indigo-300 text-black h-10 mr-3">
           <option value="">Mata Kuliah</option>
          <?php
          $sql ="SELECT matkul FROM jadwal group by matkul order by matkul asc";
          $query = $conn -> prepare($sql);
          $query -> execute();
          $result = $query -> get_result();
          while($data = $result -> fetch_assoc()){
          ?>
          <option value="<?=$data['matkul']?>"><?=$data['matkul']?></option> 
          <?php
          }
          ?>
          </select>
       
          <button class=" btn rounded-lg bg-violet-400 hover:bg-violet-500 active:scale-75 border-none mt-3 text-black" id="resetfilter"> Reset </button>

        <!-- Link untuk ke halaman tambah jadwal -->
        <?php
        if ($LOGIN == true) { ?>

          <a href="tambahJadwal.php" class="rounded-lg btn bg-teal-300 hover:bg-teal-400 border-none ml-3 mt-3 text-black"> Tambah  </a>

        <?php
        } ?>
      </div>
      </form>
    </div>
  </div>

  <div class="flex justify-center ml-0 mr-0 flex-col m-10 mb-3 md:ml-10 lg:ml-10 md:mr-10 lg:mr-10 rounded-lg" id="data"> </div>




  <br>
  <!-- ADMIN LOGIN -->
  <!-- The button to open modal -->
  <div id="login" <?php if ($LOGIN === true) { ?>class="hidden" <?php } else if ($LOGIN == false) { ?> class="ml-2 flex flex-row " <?php } ?>>
    <h4 class="text-base-100 text-md">You're an admin? </h4>
    <label for="my-modal-2" class="ml-2 mb-2 font-bold underline text-black hover cursor-pointer">Login</label>

    <input type="checkbox" id="my-modal-2" class="modal-toggle" />
    <div class="modal" id="my-modal-2">
      <div class="modal-box text-black w-96 bg-slate-300">
        <label for="my-modal-2" class="btn btn-sm btn-circle absolute right-2 top-2 bg-transparent hover:bg-slate-400 text-black">???</label>
        <form id="login-form" method="post" target="_self">
          <h1 class="text-lg font-bold">Admininstrator</h1>
        <br>
          <label class="input-group">
            <span class="bg-indigo-300">Username</span>
            <input type="text" class="input w-full focus:shadow-md bg-slate-400 text-white" name="user" required>
          </label>
          <br>
          <label class="input-group ">
            <span class="bg-indigo-300">Password</span>
            <input type="password" class="input w-full focus:shadow-md shadow-black bg-slate-400 text-white" name="password" required>
          </label>
          <label class="label mt-3">
            <span class="label-text"><img src="Captcha.php" alt="captcha"></span>
          </label>
          <label class="input-group mt-3">  
          <span class="bg-indigo-300 w-28">Captcha</span>
            <input type="text" class="input w-full bg-slate-400 text-white focus:shadow-md" name="nilaiCaptcha" required>
          </label>
          <div class="flex justify-end m-3 mr-0 mb-0">
            <button type="submit" value="login" class=" bg-indigo-400 hover:bg-indigo-500 border-none w-24 text-black btn mt-5" name="login"> Login </button>
          </div>
        </form>
      </div>
    </div>
  </div>


</body>



</html>
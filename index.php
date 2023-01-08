<?php
require "check.php";
require "excelUpload.php";
require 'vendor/autoload.php';

error_reporting(E_ALL ^ E_WARNING);
$conn = OpenCon();
$tgl_sekarang = date('YmdHis'); // Ini akan mengambil waktu sekarang dengan format yyyymmddHHiiss
$nama_file_baru = 'data' . $tgl_sekarang . '.xlsx';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.38.1/dist/full.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="assets/himatik.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
  <title>Document</title>
</head>

<body class="m-0 p-0 bg-slate-200 h-max">

  <script>
    $(document).ready(function() {
      load_data();
      load_page();

      function load_data(hari, dosen, matkul, keyword) {
        $.ajax({
          method: "POST",
          url: "dataJadwal.php",
          data: {
            hari: hari,
            dosen: dosen,
            matkul: matkul,
            keyword: keyword
          },
          success: function(hasil) {
            $('#data').html(hasil);
          }
        });
      }

      function load_page(page) {
        $.ajax({
          url: "dataJadwal.php",
          method: "POST",
          data: {
            halaman: page
          },
          success: function(data) {
            $('#data').html(data);
          }
        })
      }

      $(document).on('click', '.halaman', function() {
        var page = $(this).attr("id");
        load_page(page);
      });

      $('#s_keyword').keyup(function() {
        var hari = $("#s_hari").val();
        var dosen = $("#s_dosen").val();
        var matkul = $("#s_matkul").val();
        var keyword = $("#s_keyword").val();
        load_data(hari, dosen, matkul, keyword);
      });
      $('#s_hari').change(function() {
        var hari = $("#s_hari").val();
        var dosen = $("#s_dosen").val();
        var matkul = $("#s_matkul").val();
        var keyword = $("#s_keyword").val();
        load_data(hari, dosen, matkul, keyword);
      });
      $('#s_dosen').change(function() {
        var hari = $("#s_hari").val();
        var dosen = $("#s_dosen").val();
        var matkul = $("#s_matkul").val();
        var keyword = $("#s_keyword").val();
        load_data(hari, dosen, matkul, keyword);
      });
      $('#s_matkul').change(function() {
        var hari = $("#s_hari").val();
        var dosen = $("#s_dosen").val();
        var matkul = $("#s_matkul").val();
        var keyword = $("#s_keyword").val();
        load_data(hari, dosen, matkul, keyword);
      });
    });
  </script>

  <div class="navbar bg-base-100 sticky top-0 z-50">
    <div class="flex-1 text-white">
      <?php if ($LOGIN === true) { ?>
        <form id="logout-form" method="post" target="_self">
          <input type="submit" value="Logout" name="logout" class="btn pd-3 bg-slate-200 text-black">
        </form>
      <?php } ?>
      <?php if ($LOGIN === false) { ?>
        <h1 class="text-xl"> Jadwal TIK </h1>
      <?php } ?>
    </div>
    <div class="flex-none gap-2">
      <form action="" method="POST">
        <input type="text" placeholder="Search…" class="input input-bordered bg-base-300" aria-label="Search" name="s_keyword" id="s_keyword" autocomplete="off" />
      </form>
    </div>
  </div>
  </div>
  </div>
  </div>

  <div class="text-5xl text-black flex justify-center m-3">Tabel Jadwal TIK </div>

  <div class="option mt-3">
    <div class="flex justify-center m-5 mr-16">
      <div <?php if ($LOGIN === true) { ?>class="flex flex-col items-center bg-slate-700 w-96 rounded-lg shadow-lg mb-5 ml-10 mt-5" <?php } ?> <?php if ($LOGIN === false) { ?>class="hidden" <?php } ?>>
        <label class="m-3 ml-4 text-xl text-white">Upload Data Jadwal</label>
        <form class="flex flex-col" method="post" action="" enctype="multipart/form-data">
          <input type="file" name="file" class="form-control file-input bg-slate-400 text-black  m-3" />
          <input type="submit" name="submit" value="submit" <?php if ($LOGIN === true) { ?>class="btn btn-wide btn-accent text-white border-white text-sm p-2 m-3 ml-11" <?php } ?> <?php if ($LOGIN === false) { ?> class="hidden" <?php } ?>>
        </form>
      </div>
    </div>
    <div class="flex justify-center">
      <form method="POST" action="">
        <select name="s_hari" id="s_hari" class="rounded-md bg-base-200 text-white h-10 mr-3">
          <option value="">Hari</option>
          <option value="senin">Senin</option>
          <option value="selasa">Selasa</option>
          <option value="rabu">Rabu</option>
          <option value="kamis">Kamis</option>
          <option value="jumat">Jum'at</option>
          <option value="sabtu">Sabtu</option>
        </select>

        <select tabindex="0" name="s_dosen" id="s_dosen" class="rounded-md bg-base-200 text-white h-10 mr-3">
          <option value=""> Dosen </option>
          <option value="ella">Ella</option>
          <option value="adi">Adi</option>
          <option value="ayres">Ayres</option>
          <option value="dewi k">Dewi K</option>
          <option value="mera">Mera<< /option>
          <option value="agus">Agus</option>
          <option value="dewiyanti">Dewiyanti </option>
          <option value="chandra">Chandra </option>
          <option value="weldy">Weldy</option>
          <option value="anggi">Anggi</option>
          <option value="rasyid">Rasyid</option>
          <option value="herlino">Herlino</option>
          <option value="taufik">Taufik</option>
          <option value="risna">Risna</option>
          <option value="syamsi">Syamsi</option>
          <option value="euis">Euis</option>
          <option value="asep">Asep</option>
          <option value="iklima">Iklima></option>
          <option value="shinta">Shinta</option>
          <option value="refirman">Refirman</option>
        </select>

        <select tabindex="0" class="rounded-md bg-base-200 text-white h-10 mr-3">
          <option value="">Kelas</option>
          <option>TI 1A</option>
          <option>TI 1B</option>
          <option>TI 3A</option>
          <option>TI 3B</option>
          <option>TI 5A</option>
          <option>TI 7A</option>
          <option>TI 7B</option>
        </select>
        <button class="btn pt-1 pb-1 bg-base-200 text-white" id="resetfilter"> Reset </button>

        <!-- Link untuk ke halaman tambah jadwal -->
        <?php
        if ($LOGIN == true) { ?>

          <button class="btn pt-1 pb-1 bg-base-200 text-white"> <a href="tambahJadwal.php">Tambah </a> </button>

        <?php
        } ?>


      </form>
    </div>

  </div>

  <div class="flex justify-center flex-col m-10 mb-3" id="data"> </div>




  <br>
  <!-- ADMIN LOGIN -->
  <!-- The button to open modal -->
  <div id="login" <?php if ($LOGIN === true) { ?>class="hidden" <?php } else if ($LOGIN == false) { ?> class="ml-2 flex flex-row " <?php } ?>>
    <h4 class="text-base-100 text-md">You're an admin? </h4>
    <label for="my-modal-2" class="ml-2 mb-2 font-bold underline text-black hover cursor-pointer">Login</label>

    <input type="checkbox" id="my-modal-2" class="modal-toggle" />
    <div class="modal" id="my-modal-2">
      <div class="modal-box text-slate-100 w-96">
        <label for="my-modal-2" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>

        <form id="login-form" method="post" target="_self">
          <h1>Admininstrator</h1>
          <label class="label">
            <span class="label-text">Your Username</span>
          </label>
          <label class="input-group">
            <span>Username</span>
            <input type="text" class="input input-bordered" name="user" required>
          </label>

          <label class="label">
            <span class="label-text">Your Password</span>
          </label>
          <label class="input-group">
            <span>Password</span>
            <input type="password" class="input input-bordered" name="password" required>
          </label>
          <label class="label">
            <span class="label-text"><img src="Captcha.php" alt="captcha"></span>
          </label>
          <label class="input-group">
            <span>Captcha</span>
            <input type="text" class="input input-bordered" name="nilaiCaptcha" required>
          </label>
          <div class="flex justify-end items-start">
            <input type="submit" value="login" class="text-white m-3 bg-black btn mt-5" name="login">
          </div>
        </form>
      </div>
    </div>
  </div>


</body>



</html>
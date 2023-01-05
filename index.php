<?php
require "function.php";
require "check.php";
require "data.php";
include "connection.php";
error_reporting(E_ALL ^ E_WARNING);
$conn = OpenCon();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.38.1/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
  <title>Document</title>

  <script>
	$(document).ready(function(){
		load_data();
    function load_data(hari, dosen, matkul, keyword)
		{
			$.ajax({
				method:"POST",
				url:"dataJadwal.php",
				data: {hari:hari, dosen:dosen, matkul:matkul, keyword:keyword},
				success: function(hasil)
				{
					$('#data').html(hasil);
				}
			});
	 	}
		$('#s_keyword').keyup(function(){
      var hari = $("#s_hari").val();
      var dosen = $("#s_dosen").val();
      var matkul = $("#s_matkul").val();
    		var keyword = $("#s_keyword").val();
			load_data(hari, dosen, matkul, keyword);
		});
		$('#s_hari').change(function(){
			var hari = $("#s_hari").val();
      var dosen = $("#s_dosen").val();
      var matkul = $("#s_matkul").val();
    		var keyword = $("#s_keyword").val();
			load_data(hari, dosen, matkul, keyword);
		});
    $('#s_dosen').change(function(){
			var hari = $("#s_hari").val();
      var dosen = $("#s_dosen").val();
      var matkul = $("#s_matkul").val();
    		var keyword = $("#s_keyword").val();
			load_data(hari, dosen, matkul, keyword);
		});
    $('#s_matkul').change(function(){
			var hari = $("#s_hari").val();
      var dosen = $("#s_dosen").val();
      var matkul = $("#s_matkul").val();
    		var keyword = $("#s_keyword").val();
			load_data(hari, dosen, matkul, keyword);
		});
	});
</script>
</head>

<body class="m-0">
  <div class="navbar bg-base-300 sticky top-0 z-50">
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
          <div class="input-group">
            <input type="text" placeholder="Search…" class="input input-bordered" aria-label="Search" name="s_keyword" id="s_keyword" autocomplete="off" />
          </div>
      </form>
      </div>
    </div>
  </div>
  </div>


  <div <?php if ($LOGIN === true) { ?>class="flex justify-center" <?php } ?> <?php if ($LOGIN === false) { ?>class="hidden" <?php } ?>>
    <div class="flex  w-96 pt-10 pb-10 bg-base-300 shadow-xl m-10 justify-center rounded-3xl flex-col items-center">
      <h1 class="text-xl">Admin Space</h1>
      <br><br>
      <input type="file" class="file-input file-input-bordered file-input-md w-full max-w-xs bg-white text-black" />

      <div class="flex justify-start mt-8">
        <form id="logout-form" method="post" target="_self">
          <input type="submit" value="Submit" name="submit" <?php if ($LOGIN === true) { ?>class="text-white m-3 bg-slate-200 text-black p-3  rounded-xl shadow-lg hover:cursor-pointer" <?php } ?> <?php if ($LOGIN === false) { ?> class="hidden" <?php } ?>>
      </div>
      </form>
    </div>


  </div>
  <div class="flex justify-center">

  <form action="" method="POST">
    <div class="option mt-3">
          <select name="s_hari" id="s_hari" class="rounded-md bg-slate-200 text-black h-10">
            <option value="">Hari</option>
            <option value="senin">Senin</option>
            <option value="selasa">Selasa</option>
            <option value="rabu">Rabu</option>
            <option value="kamis">Kamis</option>
            <option value="jumat">Jum'at</option>
            <option value="sabtu">Sabtu</option>
      </select>

          <select tabindex="0" name="s_dosen" id="s_dosen" class="rounded-md bg-slate-200 text-black h-10">
          <option value=""> Dosen </option>  
          <option value="ella">Ella</option>
            <option value="adi">Adi</option>
            <option value="ayres">Ayres</option>
            <option value="dewi k">Dewi K</option>
            <option><button name="Mera" class="dropdown-item">Mera</button></option>
            <option><button name="Agus" class="dropdown-item">Agus</button></option>
            <option><button name="Dewiyanti" class="dropdown-item">Dewiyanti</button></option>
            <option><button name="Chandra" class="dropdown-item">Chandra</button></option>
            <option><button name="Weldy" class="dropdown-item">Weldy</button></option>
            <option value="anggi">Anggi</option>
            <option><button name="Rasyid" class="dropdown-item">Rasyid</button></option>
            <option><button name="Herlino" class="dropdown-item">Herlino</button></option>
            <option><button name="Taufik" class="dropdown-item">Taufik</button></option>
            <option><button name="Risna" class="dropdown-item">Risna</button></option>
            <option><button name="Syamsi" class="dropdown-item">Syamsi</button></option>
            <option><button name="Euis" class="dropdown-item">Euis</button></option>
            <option><button name="Asep" class="dropdown-item">Asep</button></option>
            <option><button name="Iklima" class="dropdown-item">Iklima</button></option>
            <option><button name="Shinta" class="dropdown-item">Shinta</button></option>
            <option><button name="Refirman" class="dropdown-item">Refirman</button></option>
      </select>

          <select tabindex="0" class="rounded-md bg-slate-200 text-black h-10">
            <option><button name="ti1a" class="dropdown-item">TI 1A</button></option>
            <option><button name="ti1b" class="dropdown-item">TI 1B</button></option>
            <option><button name="ti3a" class="dropdown-item">TI 3A</button></option>
            <option><button name="ti3b" class="dropdown-item">TI 3B</button></option>
            <option><button name="ti5a" class="dropdown-item">TI 5A</button></option>
            <option><button name="ti7a" class="dropdown-item">TI 7A</button></option>
            <option><button name="ti7b" class="dropdown-item">TI 7B</button></option>
      </select>

      </form>
    </div>

  </div>

    <div class="flex justify-center overflow-y-scroll m-5" id="data"> </div>


    <!-- ADMIN LOGIN -->
    <!-- The button to open modal -->
    <div id="login" <?php if ($LOGIN === true) { ?>class="hidden" <?php } ?>>
      <h4 class="text-slate-100 text-sm">You're an admin? </h4>
      <label for="my-modal-2" class="font-bold underline text-slate-300 hover cursor-pointer">Login</label>
      <!-- Put this part before </body> tag -->
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
            <input type="submit" value="login" class="text-white m-3 bg-black btn" name="login">
          </form>
        </div>
      </div>
    </div>


</body>



</html>
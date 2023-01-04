<?php
require "function.php";
require "check.php";
require "data.php";
error_reporting(E_ALL ^ E_WARNING);


if (isset($_POST["search"])) {
  $filterBy = $_POST['keyword'];
  $new_array = filter_array($semester1a, $filterBy);
  $semester1a = $new_array;
}
if (isset($_POST["senin"])) {
  $new_array = dropDown($semester1a, "val1", "Senin");
  $semester1a = $new_array;
}
if (isset($_POST["selasa"])) {
  $new_array = dropDown($semester1a, "val1", "Selasa");
  $semester1a = $new_array;
}
if (isset($_POST["rabu"])) {
  $new_array = dropDown($semester1a, "val1", "Rabu");
  $semester1a = $new_array;
}

if (isset($_POST["kamis"])) {
  $new_array = dropDown($semester1a, "val1", "Kamis");
  $semester1a = $new_array;
}

if (isset($_POST["jumat"])) {
  $new_array = dropDown($semester1a, "val1", "Jumat");
  $semester1a = $new_array;
}

if (isset($_POST["sabtu"])) {
  $new_array = dropDown($semester1a, "val1", "Sabtu");
  $semester1a = $new_array;
}

if (isset($_POST["Ella"])) {
  $new_array = dropDown($semester1a, "val4", "Ella");
  $semester1a = $new_array;
} else if (isset($_POST["Adi"])) {
  $new_array = dropDown($semester1a, "val4", "Adi");
  $semester1a = $new_array;
} else if (isset($_POST["Ayres"])) {
  $new_array = dropDown($semester1a, "val4", "Ayres");
  $semester1a = $new_array;
} else if (isset($_POST["Dewik"])) {
  $new_array = dropDown($semester1a, "val4", "Dewi K");
  $semester1a = $new_array;
} else if (isset($_POST["Mera"])) {
  $new_array = dropDown($semester1a, "val4", "Mera");
  $semester1a = $new_array;
} else if (isset($_POST["Agus"])) {
  $new_array = dropDown($semester1a, "val4", "Agus");
  $semester1a = $new_array;
} else if (isset($_POST["Dewiyanti"])) {
  $new_array = dropDown($semester1a, "val4", "Dewiyanti");
  $semester1a = $new_array;
} else if (isset($_POST["Chandra"])) {
  $new_array = dropDown($semester1a, "val4", "Chandra");
  $semester1a = $new_array;
} else if (isset($_POST["Weldy"])) {
  $new_array = dropDown($semester1a, "val4", "Weldy");
  $semester1a = $new_array;
} else if (isset($_POST["Anggi"])) {
  $new_array = dropDown($semester1a, "val4", "Anggi");
  $semester1a = $new_array;
} else if (isset($_POST["Rasyid"])) {
  $new_array = dropDown($semester1a, "val4", "Rasyid");
  $semester1a = $new_array;
} else if (isset($_POST["Herlino"])) {
  $new_array = dropDown($semester1a, "val4", "Herlino");
  $semester1a = $new_array;
} else if (isset($_POST["Taufik"])) {
  $new_array = dropDown($semester1a, "val4", "Taufik");
  $semester1a = $new_array;
} else if (isset($_POST["Risna"])) {
  $new_array = dropDown($semester1a, "val4", "Risna");
  $semester1a = $new_array;
} else if (isset($_POST["Syamsi"])) {
  $new_array = dropDown($semester1a, "val4", "Syamsi");
  $semester1a = $new_array;
} else if (isset($_POST["Euis"])) {
  $new_array = dropDown($semester1a, "val4", "Euis");
  $semester1a = $new_array;
} else if (isset($_POST["Asep"])) {
  $new_array = dropDown($semester1a, "val4", "Asep");
  $semester1a = $new_array;
} else if (isset($_POST["Iklima"])) {
  $new_array = dropDown($semester1a, "val4", "Iklima");
  $semester1a = $new_array;
} else if (isset($_POST["Shinta"])) {
  $new_array = dropDown($semester1a, "val4", "Shinta");
  $semester1a = $new_array;
} else if (isset($_POST["Refirman"])) {
  $new_array = dropDown($semester1a, "val4", "Refirman");
  $semester1a = $new_array;
}


if (isset($_POST["ti1a"])) {
  $new_array = dropDown($semester1a, "val9", "TI 1A");
  $semester1a = $new_array;
} else if (isset($_POST["ti1b"])) {
  $new_array = dropDown($semester1a, "val9", "TI 1B");
  $semester1a = $new_array;
} else if (isset($_POST["ti3a"])) {
  $new_array = dropDown($semester1a, "val9", "TI 3A");
  $semester1a = $new_array;
} else if (isset($_POST["ti3b"])) {
  $new_array = dropDown($semester1a, "val9", "TI 3B");
  $semester1a = $new_array;
} else if (isset($_POST["ti5a"])) {
  $new_array = dropDown($semester1a, "val9", "TI 5A");
  $semester1a = $new_array;
} else if (isset($_POST["ti7a"])) {
  $new_array = dropDown($semester1a, "val9", "TI 7A");
  $semester1a = $new_array;
} else if (isset($_POST["ti7b"])) {
  $new_array = dropDown($semester1a, "val9", "TI 7B");
  $semester1a = $new_array;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.38.1/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
  <title>Document</title>
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
      <div class="">
        <form action="" method="POST">
          <div class="input-group">
            <input type="search" placeholder="Search…" class="input input-bordered" aria-label="Search" name="keyword" autocomplete="off" />
            <button class="btn btn-square bg-white" id="search" type="submit" name="search">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </button>
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

    <div class="option mt-3">
      <form action="" method="POST">

        <div class="dropdown dropdown-bottom m-3">
          <label tabindex="0" class="btn bg-slate-200 text-black">Hari</label>
          <ul tabindex="0" class="flex flex-row dropdown-content menu p-0.5 shadow bg-base-300 text-white w-24 text-sm h-40 overflow-y-scroll">
            <li><button name="senin" class="dropdown-item ">Senin</button></li>
            <li><button name="selasa" class="dropdown-item">Selasa</button></li>
            <li><button name="rabu" class="dropdown-item">Rabu</button></li>
            <li><button name="kamis" class="dropdown-item">kamis</button></li>
            <li><button name="jumat" class="dropdown-item">Jum'at</button></li>
            <li><button name="sabtu" class="dropdown-item">Sabtu</button></li>
          </ul>
        </div>

        <div class="dropdown dropdown-end">
          <label tabindex="0" class="btn  bg-slate-200 text-black">Dosen</label>
          <ul tabindex="0" class="flex flex-row dropdown-content menu p-0.5 shadow bg-base-300 text-white w-26 text-sm h-40 overflow-y-scroll">
            <li> <button name="Ella" class="dropdown-item">Ella</button></li>
            <li><button name="Adi" class="dropdown-item">Adi</button></li>
            <li><button name="Ayres" class="dropdown-item">Ayres</button></li>
            <li><button name="Dewik" class="dropdown-item">Dewi K</button></li>
            <li><button name="Mera" class="dropdown-item">Mera</button></li>
            <li><button name="Agus" class="dropdown-item">Agus</button></li>
            <li><button name="Dewiyanti" class="dropdown-item">Dewiyanti</button></li>
            <li><button name="Chandra" class="dropdown-item">Chandra</button></li>
            <li><button name="Weldy" class="dropdown-item">Weldy</button></li>
            <li><button name="Anggi" class="dropdown-item">Anggi</button></li>
            <li><button name="Rasyid" class="dropdown-item">Rasyid</button></li>
            <li><button name="Herlino" class="dropdown-item">Herlino</button></li>
            <li><button name="Taufik" class="dropdown-item">Taufik</button></li>
            <li><button name="Risna" class="dropdown-item">Risna</button></li>
            <li><button name="Syamsi" class="dropdown-item">Syamsi</button></li>
            <li><button name="Euis" class="dropdown-item">Euis</button></li>
            <li><button name="Asep" class="dropdown-item">Asep</button></li>
            <li><button name="Iklima" class="dropdown-item">Iklima</button></li>
            <li><button name="Shinta" class="dropdown-item">Shinta</button></li>
            <li><button name="Refirman" class="dropdown-item">Refirman</button></li>
          </ul>
        </div>

        <div class="dropdown dropdown-end m-3">
          <label tabindex="0" class="btn bg-slate-200 text-black">Kelas</label>
          <ul tabindex="0" class="dropdown-content menu p-1 shadow bg-base-300 text-white rounded-box w-52 text-sm">
            <li><button name="ti1a" class="dropdown-item">TI 1A</button></li>
            <li><button name="ti1b" class="dropdown-item">TI 1B</button></li>
            <li><button name="ti3a" class="dropdown-item">TI 3A</button></li>
            <li><button name="ti3b" class="dropdown-item">TI 3B</button></li>
            <li><button name="ti5a" class="dropdown-item">TI 5A</button></li>
            <li><button name="ti7a" class="dropdown-item">TI 7A</button></li>
            <li><button name="ti7b" class="dropdown-item">TI 7B</button></li>
          </ul>

        </div>

      </form>

    </div>

  </div>

  <form action="" method="POST">

    <div class="flex justify-center h-96 overflow-y-scroll m-5">
      <table class=" w-full text-black border-white table-compact shadow-lg text-center">
        <thead class="bg-white text-black sticky top-0">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Hari</th>
            <th scope="col">Waktu</th>
            <th scope="col">Mata Kuliah</th>
            <th scope="col">dropDown</th>
            <th scope="col">Ruang</th>
            <th scope="col">JJ</th>
            <th scope="col">Tahun Ajaran</th>
            <th scope="col">Semester</th>
            <th scope="col">Kelas</th>
          </tr>
        </thead>
        <tbody class="bg-slate-200 text-black">
          <?php
          foreach ($semester1a as $data) {
            echo "<tr>";
            echo "<td>" . $data['val0'] . "</td>";
            echo "<td>" . $data['val1'] . "</td>";
            echo "<td>" . $data['val2'] . "</td>";
            echo "<td>" . $data['val3'] . "</td>";
            echo "<td>" . $data['val4'] . "</td>";
            echo "<td>" . $data['val5'] . "</td>";
            echo "<td>" . $data['val6'] . "</td>";
            echo "<td>" . $data['val7'] . "</td>";
            echo "<td>" . $data['val8'] . "</td>";
            echo "<td>" . $data['val9'] . "</td>";

            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>


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
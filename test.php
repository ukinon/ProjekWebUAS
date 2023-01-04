<html>
<body>
<?php 
$username = "root"; 
$password = ""; 
$database = "jadwaltik"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM jadwal";


echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">jam</font> </td> 
          <td> <font face="Arial">matkul</font> </td> 
          <td> <font face="Arial">dosen</font> </td> 
          <td> <font face="Arial">sks</font> </td> 
          <td> <font face="Arial">kelas</font> </td> 
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["jam"];
        $field2name = $row["matkul"];
        $field3name = $row["dosen"];
        $field4name = $row["sks"];
        $field5name = $row["kelas"]; 

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
              </tr>';
    }
    $result->free();
} 
?>
</body>
</html>
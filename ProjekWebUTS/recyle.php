<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Hari</th>
            <th>Waktu</th>
            <th>Mata Kuliah</th>
            <th>Ruang</th>
            <th>JJ</th>
            <th>Tahun Ajaran</th>
            <th>Semester</th>
        </tr>

    </thead>
    <tbody>
        <?php
        foreach ($matkul as $data => $data_val) {

            foreach ($data_val as $sub_key => $sub_val) {
                echo "<tr>";
                echo "<td>" . $sub_val . "</td>";

                echo "</tr>";
            }
        }
        ?>

    </tbody>
</table>

<?php
function search($var)
{
    $filterBy = $_POST['keyword'];
    return ($var['val4'] == $filterBy);

    $new = array_filter($senin, search($filterBy));

    print_r($new);
};
?>

<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Hari</th>
            <th>Waktu</th>
            <th>Mata Kuliah</th>
            <th>Dosen</th>
            <th>Ruang</th>
            <th>JJ</th>
            <th>Tahun Ajaran</th>
            <th>Semester</th>
        </tr>

    </thead>
    <tbody>
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
            echo "</tr>";
        }

        ?>
    </tbody>

</table>
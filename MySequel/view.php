<?php
    $conn = mysqli_connect("localhost", "root", "", "db_absensi");

    $result = mysqli_query($conn, "SELECT * FROM users")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Data Guru</h3>
    <table>
        <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>Nama</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)):?>
            <tr>
                <td>1</td>
                <td>
                    <a href="#">Ubah | Hapus</a>
                </td>
                <td><?= $row["name"]?></td>
            </tr>
        <?php endwhile?>
    </table>
</body>
</html>
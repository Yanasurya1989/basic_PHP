<?php
    $mahasiswa = [
        [
           "nama" => "Nyanyang Suryana", 
           "nim" => "18111059", 
           "email" => "yana@yana.com",
           "jurusan" => "Teknik Informatika",
           "gambar" => "Nyanyang.jpg"
        ],
        
        [
            "nama" => "Suryana Yana", 
            "nim" => "181112059", 
            "email" => "yana@yana.com",
            "jurusan" => "Teknik Industri",
            "gambar" => "Yana.jpg"
         ]
    ]
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
    <h1>Daftar Mahasiswa</h1>
    <ul>
        <?php foreach($mahasiswa as $x) : ?>
            <li><a href="latihan2.php?nama=<?= $x["nama"]?>&pikcer=<?= $x["gambar"]?>"><?= $x["nama"];?></a></li>
        <?php endforeach ?>
    </ul>
</body>
</html>
<?php
    require 'functions.php';

   $mahasiswa = funcforquery("SELECT * FROM mahasiswa");

//    tombol cari ditekan
if(isset($_POST["cari"])){
    $mahasiswa = cari($_POST["keyword"]);
}
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
    <h3>Data Mahasiswa</h3>
    <a href="tambah.php">+ Tambah data mahasiswa</a>
    <br><br>
    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="Masukan keyword pencarian..." autocomplete="off">

        <button type="submit" name="cari">Cari</button>
    </form>
    <br>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>Foto</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
        <?php $i = 1;?>
        <?php foreach( $mahasiswa as $rows ) :?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $rows["id"]?>">Ubah</a> |
                    <a href="hapus.php?id=<?= $rows["id"];?>" onclick="return confirm('Yakin?')">Hapus</a>
                </td>
                <td>
                    <img src="img/<?= $rows["gambar"];?>" width="50" alt="">
                </td>
                <td><?= $rows["nim"];?></td>
                <td><?= $rows["nama"];?></td>
                <td><?= $rows["email"];?></td>
                <td><?= $rows["jurusan"];?></td>
            </tr>  
            <?php $i++; ?>      
        <?php endforeach; ?>
        
    </table>
</body>
</html>
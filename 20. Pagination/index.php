<?php
    session_start();

    if(!isset($_SESSION["login"])){
        header("Location: login.php");

        exit;
    }

    require 'functions.php';

    // pagination
    // konfigurasi
    $jumlahDataPerhalaman = 2;

    // $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
    // $jumlahData = mysqli_num_rows($result);
    // var_dump($jumlahData);

    $jumlahData = count(funcforquery("SELECT * FROM mahasiswa")) ;
    // var_dump($jumlahData);
    // echo "<br>";

    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman) ;
    // var_dump($jumlahHalaman);
    // echo "<br>";

    // if(isset($_GET["halaman"])){
    //     $halamanAktif = $_GET["halaman"];
    // }else{
    //     $halamanAktif = 1;
    // }

    $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;

    // $jumlahDataPerhalaman = 3;
    // halaman = 2, data awal = 3 {[0,1,2]}{[3]}
    $awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;
    
    // var_dump($halamanAktif);
    // echo"<br>";
    
   $mahasiswa = funcforquery("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerhalaman");

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
    <a href="logout.php">Logout</a>
    <h3>Data Mahasiswa</h3>
    <a href="tambah.php">+ Tambah data mahasiswa</a>
    <br><br>
    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="Masukan keyword pencarian..." autocomplete="off">

        <button type="submit" name="cari">Cari</button>
    </form>

    <!-- navigasi -->
    <?php if($halamanAktif > 1) : ?>
        <a href="?halaman=<?= $halamanAktif - 1 ;?>">&laquo;</a>
    <?php endif?>

    <?php for($i=1; $i<=$jumlahHalaman; $i++) : ?>
        <?php if($i == $halamanAktif) : ?>
            <a href="?halaman=<?= $i;?>" style="font-weight: bold; color: red"><?= $i;?></a>

            <?php else :?>
                <a href="index.php?halaman=<?= $i;?>"><?= $i;?></a>
        <?php endif?>
    <?php endfor?>

    <?php if($halamanAktif < $jumlahHalaman) : ?>
        <a href="?halaman=<?= $halamanAktif + 1 ;?>">&raquo;</a>
    <?php endif?>
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
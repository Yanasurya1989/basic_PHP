<?php
    require '../functions.php';

    $keyword = $_GET["keyword"];

    $query = "SELECT * FROM mahasiswa 
            WHERE 
            nama LIKE '%$keyword%' OR
            nim LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'
        ";
    $mahasiswa = funcforquery($query);

    // var_dump($mahasiswa);
?>
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
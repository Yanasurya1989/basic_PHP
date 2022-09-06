<?php

    require 'functions.php'; 

    // ambil data di URL
    $id = $_GET['id'];
    // var_dump($id);

    // query data mahasiswa berdasarkan id
    $mhs = funcforquery("SELECT * FROM mahasiswa WHERE id = $id")[0];
    // var_dump($mhs["nama"]);

    // cek apakah tombol submit sudah ditekan
    if(isset($_POST["submit"])){ 

        // cek keberhasilan data
        if( ubah($_POST) > 0 ){
            echo "
                <script>
                    alert('data berhasil diubah');
                    document.location.href = 'index.php';
                </script>
            ";
        }
        
        else{
            echo "
                <script>
                    alert('data gagal diubah');
                    document.location.href = 'index.php';
                </script>
            ";
        }

        // ubah(var_dump($_POST));
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ubah data mahasiswa</title>
</head>
<body>
    <h3>ubah data mahasiswa</h3>
    <form action="" method="POST">
        <!-- tadi salah bagian id variablenya yg $mhs awalnya nim -->
        <input type="hidden" name="id" value="<?= $mhs['id']?>">
        <ul>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $mhs['nama']?>">
            </li>
            <li>
                <label for="nim">NIM : </label>
                <input type="text" name="nim" id="nim" value="<?= $mhs['nim']?>">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" value="<?= $mhs['email']?>">
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" value="<?= $mhs['jurusan']?>">
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="text" name="gambar" id="gambar" value="<?= $mhs['gambar']?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah</button>
            </li>
        </ul>

    </form>
</body>
</html>
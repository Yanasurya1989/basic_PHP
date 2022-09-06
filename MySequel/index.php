<?php
    // koneksi database
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");
    

    // ambil data dari tabel/query data mahasiswa
    $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
    // var_dump($result)
    // if(!$result){
    //     echo mysqli_error($conn);
    // }

    // ambil data (fetch) mahasiswa dari data object result
    // mysqli_fetch_row() //mengembalikan array numeric
    // mysqli_fetch_assoc()//mengembalikan array asosiativ
    // mysqli_fetch_array()//mengembalikan keduanya (asoc dan numeric)
    // mysqli_fetch_object()

    // row
    // $variable_fetchnyah = mysqli_fetch_row($result);
    // var_dump($variable_fetchnyah[3])

    // cara lain penggunaan var_dump (tanpa variable)
    // var_dump(mysqli_fetch_row($result));

    // ambil salah satu index array numeric
    // var_dump(mysqli_fetch_row($result)[3]);

    // assoc
    // while($keur_siasos = mysqli_fetch_assoc($result)){
    //     var_dump($keur_siasos);
    // } 
    

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
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
        <?php while($rowataudata = mysqli_fetch_assoc($result)):?>
            <tr>            
                <td>1</td>
                <td>
                    <a href="#">Ubah</a> | <a href="#">Hapus</a>
                </td>
                <td>
                    <img src="img/<?php echo $rowataudata["gambar"]?>" width="50" alt="">
                </td>
                <td>181110599</td>
                <td>Nyanyang Sryana</td>
                <td>yana@a.com</td>
                <td>Teknik Informatika</td>
            </tr>
        <?php endwhile?>

    </table>
</body>
</html>
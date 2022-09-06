<?php
// menampilkan nama hari berjalan
    // echo date("l");

// menampilkan tanggal dan hari berjalan
    // echo date("l, d-M-y");

// menampilkan nama hari dua hari kedepan
    // caranya : 60detik * 60menit * 24jam = 1 hari * 2
    // echo date("l", time()+172800); 
            // -> cara bacanya : tampilkan nama hari dari "l" (hari ini) tambah sekian detik

// mencari nama 3 hari kedepan dgn dihitung php sendiri
    // echo date("l", time()+60*60*24*3);

// mencari tanggal 3 hari kebelakang
    // echo date("l, d-M-y", time()-60*60*24*3);

// mencari hari dari tanggal lahir
// mktime (0,0,0,0,0,0)membuat detik sendiri
// jam, menit, detik, bulan, tanggal, tahun

// tentukan dulu detik berlalu dari januari xxx(anggal penentuan komputer dimulai) sampai tanggal lahir
    // echo mktime(0,0,0,9,11,1989)
    // maka keluar detik ini 621450000

// selanjutnya untuk mengetahui hari di tanggal lahir tersebut cara adalah : 
// echo date("l", mktime(0,0,0,9,11,1989));

// strtotime -> menampilkan detik dati format tanggal yg kita masukan
// echo strtotime("11 sept 1989"); keluarnya ini 621450000

// untuk menentukan nama hari dari tanggal tersebut
echo date("l", strtotime("11 sept 1989"));
?>
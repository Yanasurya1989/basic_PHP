<?php
    require_once __DIR__ . '/vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML('
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
       <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Aksi</th>
                <th>Foto</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>');

            foreach($mahasiswa as $mhs){

            }

        $html .= '</table>
    </body>
    </html>
    ');
    $mpdf->Output();
?>
<?php
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");


    function funcforquery($paramque){
        global $conn;
        $result = mysqli_query($conn, $paramque);

        $empty_palce = [];
        while($rows_cupboard = mysqli_fetch_assoc($result)){
            $empty_palce[] = $rows_cupboard;
        }
        return $empty_palce;
    }


    function tambah($data){
        global $conn;
         // ambil data dari tiap element formnya
         $nama = htmlspecialchars($data["nama"]);
         $nim = htmlspecialchars($data["nim"]) ;
         $email = htmlspecialchars($data["email"]) ;
         $jurusan = htmlspecialchars($data["jurusan"]) ;
         $gambar = htmlspecialchars($data["gambar"]) ;

         // query insert
        $query = " INSERT INTO mahasiswa
                    VALUES
                    ('', '$nama', '$nim', '$email', '$jurusan', '$gambar')
                 ";
            mysqli_query($conn, $query);

            mysqli_affected_rows($conn);
    }

    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

        return mysqli_affected_rows($conn);
    }

    function ubah($data){
        global $conn;
         // ambil data dari tiap element formnya
         $id = $data["id"];
         $nama = htmlspecialchars($data["nama"]);
         $nim = htmlspecialchars($data["nim"]) ;
         $email = htmlspecialchars($data["email"]) ;
         $jurusan = htmlspecialchars($data["jurusan"]) ;
         $gambar = htmlspecialchars($data["gambar"]) ;

         // query insert
        $query = " UPDATE mahasiswa SET
                    nama = '$nama',
                    nim = '$nim',
                    email = '$email',
                    jurusan = '$jurusan',
                    gambar = '$gambar'

                    WHERE id = $id;
                 ";
            mysqli_query($conn, $query);

            mysqli_affected_rows($conn);
    }
?>
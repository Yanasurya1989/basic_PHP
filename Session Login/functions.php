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
         
        //  $gambar = htmlspecialchars($data["gambar"]) ;
        // upload gambar
        $gambar = upload();
            if(!$gambar){
                return false;
            }

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

         $gambarLama = htmlspecialchars($data["gambarLama"]) ;
        //  ngecek apakah user memilih gambar baru atau menggunakan gambar lama
         if($_FILES['gambar']['error'] === 4){
            $gambar = $gambarLama;
         }else{
            $gambar = upload() ;
         }
         
         

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

    function cari($keyword){
        $query = " SELECT * FROM mahasiswa 
                    WHERE 
                    nama LIKE '%$keyword%' OR
                    nim LIKE '%$keyword%' OR
                    email LIKE '%$keyword%' OR
                    jurusan LIKE '%$keyword%'
                ";
        return funcforquery($query);
    }

    function upload(){
        // return false;
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        // pengecekan ada atau tidaknya gambar yang diupload
        if($error === 4){
            echo "<script>
                    alert('tidak ada file gambar yang dipilih, silahkan pilih daulu!!')
                </script>";
            return false;
        }

        // pengecekan gambar yang diupload harus gambar
        $ekstensidiperbolehkan = ['jpg', 'png', 'jpeg'];
        $ambilekstensigambar = explode('.', $namaFile);
        $ambilekstensigambar = strtolower(end($ambilekstensigambar));

        if(!in_array($ambilekstensigambar, $ekstensidiperbolehkan)){
            echo "
                <script>
                    alert('file yang anda upload tidak diizinkan')
                </script>
            ";
            return false;
        };

        // pengecekan untuk gambar yang terlalu besar
        if($ukuranFile > 2000000){
            echo "
                <script>
                    alert('ukuran file badag teuing')
                </script>
            ";
        }

        // proses upload setelah lolos pengecekan
        // generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ambilekstensigambar;
        // var_dump($namaFileBaru); die;

        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

        return $namaFileBaru;
    }

    function register($data){
        global $conn;
        $username = strtolower(stripslashes( $data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);

        // cek username sudah digunakan atau belum
        $result = mysqli_query($conn, "SELECT username FROM user where username = '$username'");

        if(mysqli_fetch_assoc($result)){
            echo "<script>
                alert('username sudah digunakan');
            </script>";
        }


        // cek konfirmasi password
        if($password !== $password2){
            echo "<script>
                alert('konfirmasi password tidak sesuai');
            </script>";

            return false;
        }

        // enkripsi password
        // $password = md5($password);
        $password = password_hash($password, PASSWORD_DEFAULT);
        // var_dump($password);

        // insert data ke database
        mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");
        return mysqli_affected_rows($conn);

    }
?>
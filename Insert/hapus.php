<?php
    require 'functions.php';
    $getid = $_GET['id'];

    if(hapus($getid) > 0 ){
        echo"
            <script>
                alert('data berhasil dihapus');
                document.location.href = 'index.php';
            </script>
            ";
    }else{
        echo"
            <script>
                alert('data gagal dihapus');
                document.location.href = 'index.php';
            </script>
        "; 
    }
?>
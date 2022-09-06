<?php
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");


    function funcforquery($paramque){
        global $conn;
        $result = mysqli_query($conn, $paramque);

        $empty_place = [];
        while($rows_cupboard = mysqli_fetch_assoc($result)){
            $empty_place[] = $rows_cupboard;
        }
        return $empty_place;
    }
?>
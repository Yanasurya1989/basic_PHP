<?php 

function nama_fungsi($waktu="pagi", $nama="admin"){
    echo "selamat $waktu, $nama";
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
    <h1>
        <?php echo nama_fungsi("datng","Yana");?>
    </h1>    
</body>
</html>
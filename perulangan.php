<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .color{
            background-color: brown;
        }
    </style>
</head>
<body>
    <!-- macam2 looping -->
    <?php
        // for($i=0; $i<5; $i++){
        //     echo "hello world <br>";
        // }

        // $j = 0;
        // while($j < 5){
        //     echo "hello while <br>";
        //     $j++;
        // }

        // $l = 0;
        // do{
        //     echo "do while <br>";
        //     $l++;
        // }while($l < 5);
        
    ?>
    <!-- implementasi looping pada tabel -->
    <!-- <table border="1" cellpadding="10" cellspacing="0">
        <?php
        // for($col=1; $col <=5; $col++){
        //     echo"<tr>";
        //         for($row=1; $row <=5; $row++){
        //             echo "<td>$col,$row</td>";
        //         }
        //     echo"</tr>";
        // }
       ?>
    </table> -->
    <!-- menggabungkan php dgn html -->
    <table border="1">
        <?php for($row=1; $row<=5; $row++):?>
            <?php if($row %2 ==1) :?>
                <tr class="color">
                <?php else :?>
                <tr>
            <?php endif?>        
                    <?php for($col=1; $col <=5; $col++) :?>
                    <td><?php echo"$row,$col";?></td>
                    <?php endfor?>
                </tr>
        <?php endfor?>
    </table>
</body>
</html>
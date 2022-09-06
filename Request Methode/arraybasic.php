<!-- array numeric -->
<?php
    $x = [
        [2,3,4,5],
        ["satu", "dua", "tiga", "empat", "lima"]
    ];

    echo $x[1][2];

    echo "<br>";

    // array asosiative
    $personalia = [
        [
            "name" => "Yana",
            "age" => 32,
            "picture" => "Yana.jpg"
        ],

        [
            "name" => "Nyanyang",
            "age" => 32,
            "picture" => "Nyanyang.jpg"
        ]
    ];

    echo $personalia[0]["name"];
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
    <h1>List Product</h1>
    <?php foreach($personalia as $x): ?>
        <ul>
            <li><img src="img/<?php echo $x["picture"];?>"></li>
            <li><?php echo $x["name"];?></li>
        </ul>
    <?php endforeach ?>
    
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css" rel="stylesheet">
        h1{
            color:red;
        }
        p{
            color:green;
            font-size:15px;
        }
    </style>
</head>
<body>
    <p>esse é meu teste!</p>
    <?php

    $var = "cachorro";
    $var2 = 20.5;
    $soma = $var.$var2;
    
    echo"<ul>";
    for($i=0;$i<100;$i++)
    {
        echo"<li>$i</li>";
    }
    echo"</ul>";

    echo "<p>$soma</p>";

    print("<h1>Olá mundo!</h1><br>");

    echo "imprimido";
    ?>
</body>
</html>




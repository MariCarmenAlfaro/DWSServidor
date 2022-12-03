<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    class Frecuencia
    {
        function __construct()
        {
        }
    }
   
    $texto = "La casa es blanca y la nuve gris";
    $letras .= strtoupper($texto);
    echo "Contando letras de: '$texto'\n"."<br>";
    $letras = "abcdefghijklmnopqrstuvwxyz";
   // $letras .= strtoupper($letras);
    for ($i = 0; $i < strlen($letras); $i++) {
        $letra = $letras[$i];
        $contador = 0;
        for ($x = 0; $x < strlen($texto); $x++) {
            $actual = $texto[$x];
            if ($actual === $letra) {
                $contador++;
            }
    
        }
        if ($contador > 0) {
            echo "$letra=";
            echo $contador;
            echo "\n";
        }
    }
    ?>
    
</body>

</html>
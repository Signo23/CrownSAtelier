<!DOCTYPE html>
<html lang="it">
    <head>
        <title><?php echo $templateParams["titolo"]; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = 'icon' href="./resources/icon.ico"
        type = "image/x-icon"/>
        <link rel="stylesheet" href="./style.css"/>
        <?php if(isset($templateParmas["css"])):?> 
                    <link rel="stylesheet" href="css/<?php echo $templateParmas["css"]; ?>"/>
        <?php endif; ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script type="text/javascript" src="./lang/it-ita.js"></script>

    </head>
    <body class="text-center">
            <?php
                if(isset($templateParams["nome"])){
                    require($templateParams["nome"]);
                }
            ?>
    </body>
</html>

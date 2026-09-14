<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>

        <?php require_once "horloge.php" ?>

            <article>
                <p>Bienvenue sur l'exercise!</p>
            </article>

            <article>
                <p><?php 
                    $horloge = new Horloge("Canada/Eastern");
                    echo "Il est : " . $horloge->obtenirHeureMinute() . "<br>";
                    echo $horloge->obtenirMessage(); ?></p>
            </article>
    </main>
    
</body>
</html>
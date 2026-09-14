<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio de Edward Bolduc - Techniques Informatique</title>
</head>
<body>
    <?php 
        // echo $variableInexistante; Genere une erreur
        $prenom = "Edward";
        $nom = "Bolduc";
        $age = 18;
        $ville = "St-Georges";
    
        echo "<h1>" . "Portfolio de " . $prenom . " ". $nom . "</h1>";

        function Presentation(string $prenom, int $age, string $ville, string $passion) {
            return "Salut! Je suis {$prenom}, {$age} ans, de {$ville}. Ma passion : {$passion}";
        } 

        echo "<p>" . "<i>" . Presentation($prenom, $age, $ville, "la musique") . "</p>" . "</i>";

        $pseudo = "GTAcrazy";

        echo "Mon pseudo c'est \"{$pseudo}\"";

        $competences = ["HTML/CSS", "JavaScript", "C#", "PHP", "Git", "SQLServer"];
        echo "<ul>";
        foreach ($competences as $competence) {
            echo "<li> {$competence}";
        }
        echo "</ul>";
    ?>
</body>
</html>





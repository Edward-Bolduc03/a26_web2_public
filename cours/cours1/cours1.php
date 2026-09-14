<?php 
    require_once "fonction.php";

    $jeux = [
        "Zelda" => ["NES", "SNES", "N64"],
        "Mario" => ["NES", "SNES", "N64"],
        "Metroid" => ["NES", "SNES", "N64"]
    ];
    $jeux["Zelda"]; // ["NES", "SNES", "N64"]
    $jeux["Zelda"][1]; // "SNES"

    echo "<ul>";
    foreach ($jeux as $personnage => $consoles) {
        $consolesString = "";

        foreach ($consoles as $console) {
            $consolesString .= $console . ", ";
        }

        $consolesString = substr($consolesString, 0, -2);

        echo "<li>" . $personnage . " : " . $consolesString . "</li>";
    }
    echo "</ul>";

    $message = "Bonjour";
    $nom = "Alice";
    $informations = [
        "nom" => "Alice",
        "message" => "bonjour"
    ];

    Saluer("test1234");

    
?>

<h1><?php echo $message . " " . $nom ?></h1>
<h1><?php echo "{$message} {$nom}" ?></h1>
<h1><?php echo "{$informations["message"]}" ?></h1>
<h1><?php echo '$message $nom' ?></h1>
<h1><?php echo "5\$\\"?></h1>

<?php 
    $nombre = 12;
    $texte = "12";

    if ($nombre === $texte) { //si on a besoin de conversion on prend 2 fois egal == 
        echo "Egal";
    }
    else {
        echo "Pas egal";
    }
?>



<?php 

class SerieJeux
{
    public string $nom;

    public function __construct(string $nom)
    {
        $this->nom = $nom;
    }

    public function GetNom() {
        return $this->nom;
    }

    public function Afficher() {
        echo "<h1>" . $this->GetNom() . "</h1>";
    }
}


$serie = new SerieJeux("The Legend of Zelda");
$serie->Afficher();


?>






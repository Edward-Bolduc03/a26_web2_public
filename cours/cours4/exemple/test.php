<?php
if (!isset($_GET["action"]) || !isset($_POST["nom"]) || !isset($_POST["cours"])) {
    header("location: index.php");
}
echo "Action : " . $_GET["action"] . "<br/>";
echo "Nom : " . $_POST["nom"] . "<br/>";
echo "Cours : " . $_POST["cours"] . "<br/>";
?>
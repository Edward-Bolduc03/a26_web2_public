<a href="test.php">Test</a>

<form action="test.php?action=AjouterCours" method="post">
  <label for="nom">Nom :</label>
  <input type="text" name="nom">

  <label for="cours">Cours :</label>
  <select name="cours" id="">
    <option value="web2">Web 2</option>
    <option value="objet2">Objet 2</option>
  </select>

  <input type="submit" value="Soumettre">
</form>
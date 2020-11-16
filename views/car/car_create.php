<p>Création d'une voiture</p>
<form method="post" action="cars.php?action=create" name="carCreateForm">
    <label for="marque">Marque :<br><input name="marque" id="marque" type="text"></label><br>
    <label for="couleur">Couleur :<br><input name="couleur" id="couleur" type="text"></label><br>
    <label for="modele">Modèle :<br><input name="modele" id="modele" type="text"></label><br>
    <label for="mise_circulation">Date de première mise en circulation :<br><input name="mise_circulation" id="mise_circulation" type="date"></label><br>
    <label for="puissance_moteur">Puissance du moteur (en chevaux) :<br><input name="puissance_moteur" id="puissance_moteur" type="text"></label><br>
    <input type="submit" value="Créer une voiture">
</form>
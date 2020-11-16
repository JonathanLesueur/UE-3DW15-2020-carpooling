<?php

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarsController();
echo $controller->updateCar();
?>

<p>Mise à jour d'une voiture</p>
<form method="post" action="cars_update.php" name ="userUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="marque">Marque :</label>
    <input type="text" name="marque">
    <br />
    <label for="couleur">Couleur :</label>
    <input type="text" name="couleur">
    <br />
    <label for="mise_circulation">Date de la première mise en circulation :</label>
    <input type="text" name="mise_circulation">
    <br />
    <label for="puissance_moteur">Puissance du moteur (en chevaux) :</label>
    <input type="text" name="puissance_moteur">
    <br />
    <label for="modele">Modèle :</label>
    <input name="modele" id="modele" type="text">
    <br />
    <input type="submit" value="Modifier la voiture">
</form>
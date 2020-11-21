<p>Mise à jour d'une voiture</p>
<?= $result_update ?>
<form method="post" action="cars.php?action=update" name="userUpdateForm">
    <div class="form-row">
        <label for="id">Id</label>
        <input name="id" type="text">
    </div>
    <div class="form-row">
        <label for="marque">Marque</label>
        <input name="marque" type="text">
    </div>
    <div class="form-row">
        <label for="couleur">Couleur</label>
        <input name="couleur" type="text">
    </div>
    <div class="form-row">
        <label for="modele">Modèle</label>
        <input name="modele" type="text">
    </div>
    <div class="form-row">
        <label for="mise_circulation">Date de mise en circulation</label>
        <input name="mise_circulation" type="date">
    </div>
    <div class="form-row">
        <label for="puissance_moteur">Puissance moteur (en ch)</label>
        <input name="puissance_moteur" type="text">
    </div>
    <div class="form-row">
        <input name="submit" type="submit" value="Créer une voiture">
    </div>
</form>
<h1>Mise à jour d'une annonce</h1>
<?= $result_update ?>
<form method="post" action="annonces.php?action=update" name="annonceUpdateForm">
    <div class="form-row">
        <label for="id">Id</label>
        <input name="ida" type="text">
    </div>
    <div class="form-row">
        <label for="utilisateur">Utilisateur</label>
        <input name="utilisateur" type="text">
    </div>
    <div class="form-row">
        <label for="lieu_depart">Lieu de départ</label>
        <input name="lieu_depart" type="text">
    </div>
    <div class="form-row">
        <label for="date_depart">Date de départ</label>
        <input name="date_depart" type="date">
    </div>
    <div class="form-row">
        <label for="lieu_arrivee">Lieu d'arrivée</label>
        <input name="lieu_arrivee" type="text">
    </div>
    <div class="form-row">
        <label for="date_arrivee">Date d'arrivée</label>
        <input name="date_arrivee" type="date">
    </div>
    <div class="form-row">
        <input name="submit" type="submit" value="Modifier l'annonce">
    </div>
</form>
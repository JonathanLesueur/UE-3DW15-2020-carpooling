<p>Mise à jour d'une annonce</p>
<form method="post" action="annonces.php?action=update" name="annonceUpdateForm">
    <label for="lieu_depart">Id :<br>
        <input name="id" id="id" type="number">
    </label><br>
    <label for="lieu_depart">Lieu de départ :<br>
        <input name="lieu_depart" id="lieu_depart" type="text">
    </label><br>
    <label for="lieu_arrivee">Lieu d'arrivée :<br>
        <input name="lieu_arrivee" id="lieu_arrivee" type="text">
    </label><br>
    <label for="date_depart">Date de départ :<br>
        <input name="date_depart" id="date_depart" type="date">
    </label><br>
    <label for="date_arrivee">Date d'arrivée :<br>
        <input name="date_arrivee" id="date_arrivee" type="date">
    </label><br>
    <input type="submit" value="Mettre à jour l'annonce">
</form>
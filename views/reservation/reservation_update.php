<p>Mise à jour d'une réservation</p>
<form method="post" action="reservations.php?action=update" name ="reservationUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="utilisateur">Utilisateur :</label>
    <input type="text" name="utilisateur">
    <br />
    <label for="date_depart">Date du départ (format dd-mm-yyyy) :<br>
        <input name="date_depart" id="date_depart" type="date"></label><br>
    <label for="lieu_depart">Lieu du départ :<br>
        <input name="lieu_depart" id="lieu_depart" type="text">
    </label><br>
    <label for="lieu_arrivee">Lieu de l'arrivée :<br>
        <input name="lieu_arrivee" id="lieu_arrivee" type="text">
    </label><br>
    <input type="submit" value="Modifier la réservation">
</form>

<p>Mise à jour d'une réservation</p>
<form method="post" action="reservations.php?action=update" name ="reservationUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="utilisateur">Utilisateur :</label>
    <input type="text" name="utilisateur">
    <br />
    <label for="date_depart">Date du départ (format dd-mm-yyyy) :</label>
    <input type="text" name="date_depart">
    <br />
    <label for="lieu_depart">Lieu du départ :</label>
    <input type="text" name="lieu_depart">
    <br />
    <label for="lieu_arrivee">Lieu de l'arrivée :</label>
    <input type="text" name="lieu_arrivee" id="lieu_arrivee">
    <br />
    <input type="submit" value="Modifier la réservation">
</form>

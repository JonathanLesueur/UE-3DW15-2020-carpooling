<p>Création d'une réservation</p>
<form method="post" action="reservations.php?action=create" name="reservationCreateForm">
    <label for="utilisateur">Utilisateur :<br><input name="utilisateur" id="utilisateur" type="text"></label><br>
    <label for="date_depart">Date du départ (format dd-mm-yyyy) :<br><input name="date_depart" id="date_depart" type="text"></label><br>
    <label for="lieu_depart">Lieu du départ :<br><input name="lieu_depart" id="lieu_depart" type="text"></label><br>
    <label for="lieu_arrivee">Lieu de l'arrivée :<br><input name="lieu_arrivee" id="lieu_arrivee" type="date"></label><br>
    <input type="submit" value="Créer une réservation">
</form>
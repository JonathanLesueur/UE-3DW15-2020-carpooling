<h1>Mise à jour d'une réservation</h1>
<?= $result_update ?>
<form method="post" action="reservations.php?action=update" name ="reservationUpdateForm">
    <div class="form-row">
        <label for="id">Id</label>
        <input name="id" type="text">
    </div>
    <div class="form-row">
        <label for="date_depart">Date de départ</label>
        <input name="date_depart" type="date">
    </div>
    <div class="form-row">
        <label for="lieu_depart">Lieu de départ</label>
        <input name="lieu_depart" type="text">
    </div>
    <div class="form-row">
        <label for="lieu_arrivee">Lieu d'arrivée</label>
        <input name="lieu_arrivee" type="text">
    </div>
    <div class="form-row">
        Utilisateur
        <?php 
            foreach($_users as $user):
                echo '<div class="choice-group"><label><input type="radio" name="utilisateur" value="' . $user->getId() . '" />' . $user->getFirstName() . ' ' . $user->getLastName() . '</label></div>';
            endforeach; 
        ?>
    </div>
    <div class="form-row">
        Annonce
        <?php 
            foreach($_annonces as $annonce):
                echo '<div class="choice-group"><label><input type="radio" name="annonce" value="' . $annonce->getId() . '" />' . $annonce->getLieuDepart() . ' ' . $annonce->getLieuArrivee() . '</label></div>';
            endforeach; 
        ?>
    </div>
    <div class="form-row">
        <input name="submit" type="submit" value="Modifier la réservation">
    </div>
</form>

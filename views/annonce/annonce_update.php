<h1>Mise à jour d'une annonce</h1>
<?= $result_update ?>
<form method="post" action="annonces.php?action=update" name="annonceUpdateForm">
    <div class="form-row">
        <label for="id">Id</label>
        <input name="ida" type="text">
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
        Utilisateur
        <?php 
            foreach($_users as $user):
                echo '<div class="choice-group"><label><input type="radio" name="utilisateur" value="' . $user->getId() . '" />' . $user->getFirstName() . ' ' . $user->getLastName() . '</label></div>';
            endforeach; 
        ?>
    </div>
    <div class="form-row">
        Voiture
        <?php 
            foreach($_cars as $car):
                echo '<div class="choice-group"><label><input type="radio" name="car" value="' . $car->getId() . '" />' . $car->getMarque() . ' ' . $car->getModele() . '</label></div>';
            endforeach; 
        ?>
    </div>
    <div class="form-row">
        <input name="submit" type="submit" value="Modifier l'annonce">
    </div>
</form>
<h1>Création d'un utilisateur</h1>
<?= $insert_result ?>
<form method="post" action="users.php?action=create" name ="userCreateForm">
    <div class="form-row">
        <label for="firstname">Prénom</label>
        <input name="firstname" type="text">
    </div>
    <div class="form-row">
        <label for="lastname">Nom</label>
        <input name="lastname" type="text">
    </div>
    <div class="form-row">
        <label for="email">Email</label>
        <input name="email" typt="mail">
    </div>
    <div class="form-row">
        <label for="birthday">Date de naissance</label>
        <input name="birthday" type="date">
    </div>
    <div class="form-row">
        <span>Voitures</span>
        <?php
            foreach($_cars as $car):
                echo '<div class="choice-group"><label><input type="checkbox" name="cars[]" value="' . $car->getId() . '" />' . $car->getModele() . '</label></div>';
            endforeach;
        ?>
    </div>
    <div class="form-row">
        <input name="submit" type="submit" value="Créer un utilisateur">
    </div>
</form>
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
        <input name="birthday" type="text">
    </div>
    <div class="form-row">
        <label>Voitures</label>
        <?php
            foreach($_cars as $car):
                echo '<input type="checkbox" name="cars[]" value="' . $car->getId() . '" />' . $car->getModele();
            endforeach;
        ?>
    </div>
    <div class="form-row">
        <input name="submit" type="submit" value="Créer un utilisateur">
    </div>
</form>
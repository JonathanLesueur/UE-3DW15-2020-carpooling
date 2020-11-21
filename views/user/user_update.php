<h1>Mise à jour d'un utilisateur</h1>
<?= $update_result ?>
<form method="post" action="users.php?action=update" name ="userUpdateForm">
    <div class="form-row">
        <label for="firstname">Id</label>
        <input name="id" type="text">
    </div>
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
        <input name="submit" type="submit" value="Créer un utilisateur">
    </div>
</form>
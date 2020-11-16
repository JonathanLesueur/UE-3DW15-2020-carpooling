<p>Mise à jour d'un utilisateur</p>
<form method="post" action="users.php?action=update" name ="userUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="firstname">Prénom :</label>
    <input type="text" name="firstname">
    <br />
    <label for="lastname">Nom :</label>
    <input type="text" name="lastname">
    <br />
    <label for="email">Email :</label>
    <input type="text" name="email">
    <br />
    <label for="birthday">Date d'anniversaire au format dd-mm-yyyy :</label>
    <input type="text" name="birthday">
    <br />
    <input type="submit" value="Modifier l'utilisateur">
</form>
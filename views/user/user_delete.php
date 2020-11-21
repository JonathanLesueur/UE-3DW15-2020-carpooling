<h1>Supression d'un utilisateur</h1>
<?= $delete_result ?>
<form method="post" action="users.php?action=delete" name="userDeleteForm">
    <div class="form-row">
        <label for="id">Id</label>
        <input name="id" type="text">
    </div>
    <div class="form-row">
        <input name="submit" type="submit" value="Supprimer un utilisateur">
    </div>
</form>
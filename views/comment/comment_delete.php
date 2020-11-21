<h1>Supression d'un commentaire</h1>
<?= $result_delete ?>
<form method="post" action="comments.php?action=delete" name="commmentDeleteForm">
    <div class="form-row">
        <label for="id">Id</label>
        <input name="id" type="text">
    </div>
    <div class="form-row">
        <input name="submit" type="submit" value="Supprimer un commentaire">
    </div>
</form>
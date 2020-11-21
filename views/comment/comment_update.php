<h1>Mise à jour d'un commentaire</h1>
<?= $resulr_update ?>
<form method="post" action="comments.php?action=update" name="commentUpdateForm">
    <div class="form-row">
        <label for="id">Id</label>
        <input name="id" type="text">
    </div>
    <div class="form-row">
        <label for="titre">Titre</label>
        <input name="titre" type="text">
    </div>
    <div class="form-row">
        <label for="contenu">Contenu</label>
        <input name="contenu" type="text">
    </div>
    <div class="form-row">
        <label for="utilisateur">Utilisateur</label>
        <input name="utilisateur" type="text">
    </div>
    <div class="form-row">
        <input name="submit" type="submit" value="Modifier le commentaire">
    </div>
</form>
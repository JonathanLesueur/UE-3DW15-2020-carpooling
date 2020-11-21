<h1>Création d'un commentaire</h1>
<?= $result_create ?>
<form method="post" action="comments.php?action=create" name="commentCreateForm">
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
        <input name="submit" type="submit" value="Créer le commentaire">
    </div>
</form>
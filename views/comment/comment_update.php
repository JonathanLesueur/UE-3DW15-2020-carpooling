<p>Mise à jour d'un commentaire</p>
<form method="post" action="comments.php?action=update" name="commentUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="titre">Titre :</label>
    <input type="text" name="titre">
    <br />
    <label for="contenu">Contenu :</label>
    <input type="text" name="contenu">
    <br />
    <label for="mise_circulation">Utilisateur :</label>
    <input type="text" name="utilisateur">
    <br />
    <label for="date_ecriture">Date d'écriture :</label>
    <input type="date" name="date_ecriture">
    <br />
    <input type="submit" value="Modifier le commentaire">
</form>
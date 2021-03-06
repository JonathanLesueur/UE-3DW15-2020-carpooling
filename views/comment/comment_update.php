<h1>Mise à jour d'un commentaire</h1>
<?= $result_update ?>
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
        Utilisateur
        <?php 
            foreach($_users as $user):
                echo '<div class="choice-group"><label><input type="radio" name="utilisateur" value="' . $user->getId() . '" />' . $user->getFirstName() . ' ' . $user->getLastName() . '</label></div>';
            endforeach; 
        ?>
    </div>
    <div class="form-row">
        Annonce
        <?php 
            foreach($_annonces as $annonce):
                echo '<div class="choice-group"><label><input type="radio" name="annonce" value="' . $annonce->getId() . '" />de ' . $annonce->getLieuDepart() . ' à ' . $annonce->getLieuArrivee() . '</label></div>';
            endforeach; 
        ?>
    </div>
    <div class="form-row">
        <input name="submit" type="submit" value="Modifier le commentaire">
    </div>
</form>
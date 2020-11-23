<h1>Liste des Annonces</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Départ</th>
            <th>Arrivée</th>
            <th>Utilisateur</th>
            <th>Voiture</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($_annonces as $annonce) : ?>
            <tr>
                <td><?= $annonce->getId() ?></td>
                <td><?= $annonce->getLieuDepart() . ' le ' . $annonce->getDateDepart()->format('d/m/Y') ?></td>
                <td><?= $annonce->getLieuArrivee() . ' le ' . $annonce->getDateArrivee()->format('d/m/Y') ?></td>
                <?php if(count($annonce->getUtilisateurs())): ?>
                <td>
                    <?= $annonce->getUtilisateurs()[0]->getFirstName() . ' ' . $annonce->getUtilisateurs()[0]->getLastName() ?>
                </td>
                <?php endif; ?>
                <?php if(count($annonce->getVoitures())): ?>
                <td>
                    <?= $annonce->getVoitures()[0]->getModele() . ' ' . $annonce->getVoitures()[0]->getMarque() ?>
                </td>
                <?php endif; ?>
            </tr>
            <?php if(count($annonce->getCommentaires())): ?>
                <tr>
                    <td></td>
                    <td colspan="4">
                        <div class="comment-title">Commentaires de l'annonce</div>
                        <?php foreach($annonce->getCommentaires() as $comment) :  ?>
                            <div class="comment-line">
                                <strong><?= $comment->getTitre() ?></strong> - par <?= $comment->getUtilisateur()[0]->getFirstName() . ' ' . $comment->getUtilisateur()[0]->getLastName() ?>
                                <p><em><?= $comment->getContenu() ?></em></p>
                            </div>
                        <?php endforeach; ?>
                    </td>
                </tr>
            <?php endif; ?>
            <?php if(count($annonce->getReservations())): ?>
                <tr>
                    <td></td>
                    <td colspan="4">
                        <div class="comment-title">Réservations de l'annonce</div>
                        <?php foreach($annonce->getReservations() as $reservation) :  ?>
                            <div class="comment-line">
                                <p><em><?= $reservation->getUtilisateurs()[0]->getFirstName() . ' ' . $reservation->getUtilisateurs()[0]->getLastName() ?> - de <?= $reservation->getLieuDepart() ?> le <?= $reservation->getDateDepart()->format('d/m/Y') ?> à <?= $reservation->getLieuArrivee() ?></em></p>
                            </div>
                        <?php endforeach; ?>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>
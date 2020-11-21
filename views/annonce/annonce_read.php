<h1>Liste des Annonces</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Départ</th>
            <th>Arrivée</th>
            <th>Utilisateur</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($_annonces as $annonce) : ?>
            <tr>
                <td><?= $annonce->getId() ?></td>
                <td><?= $annonce->getLieuDepart() . ' le ' . $annonce->getDateDepart()->format('d/m/Y') ?></td>
                <td><?= $annonce->getLieuArrivee() . ' le ' . $annonce->getDateArrivee()->format('d/m/Y') ?></td>
                <td>
                    <?php foreach($annonce->getUtilisateurs() as $utilisateur): ?>
                        <?= $utilisateur->getFirstName() . ' ' . $utilisateur->getLastName() ?>
                    <?php endforeach; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
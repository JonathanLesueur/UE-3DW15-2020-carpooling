<h1>Liste des Réservations</h1>
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
        <?php foreach($_reservations as $reservation) : ?>
            <tr>
                <td><?= $reservation->getId() ?></td>
                <td><?= $reservation->getLieuDepart() . ' le ' . $reservation->getDateDepart()->format('d/m/Y') ?></td>
                <td><?= $reservation->getLieuArrivee() ?></td>
                <td>
                    <?php foreach($reservation->getUtilisateurs() as $utilisateur): ?>
                        <?= $utilisateur->getFirstName() . ' ' . $utilisateur->getLastName() ?>
                    <?php endforeach; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<h1>Liste des Réservations</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Départ</th>
            <th>Arrivée</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($_reservations as $reservation) : ?>
            <tr>
                <td><?= $reservation->getId() ?></td>
                <td><?= $reservation->getLieuDepart() . ' le ' . $reservation->getDateDepart()->format('d/m/Y') ?></td>
                <td><?= $reservation->getLieuArrivee() ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
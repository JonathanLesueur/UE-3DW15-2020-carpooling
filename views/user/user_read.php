<h1>Liste des Utilisateurs</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Identité</th>
            <th>Contact</th>
            <th>Date de naissance</th>
            <th>Voiture(s)</th>
            <th>Annonce(s)</th>
            <th>Réservation(s)</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($_users as $user) : ?>
        <tr>
            <td><?= $user->getId() ?></td>
            <td><?= $user->getFirstname() . ' ' . $user->getLastname() ?></td>
            <td><?= $user->getEmail() ?></td>
            <td><?= $user->getBirthday()->format('d/m/Y') ?></td>
            <td>
                <?php foreach($user->getVoitures() as $voiture): ?>
                <?= $voiture->getMarque() . ' ' . $voiture->getModele() ?>,<br>
                <?php endforeach; ?>
            </td>
            <td>
                <?php foreach($user->getAnnonces() as $annonce): ?>
                <?= $annonce->getId() . ' <em>(' . $annonce->getLieuDepart() . '-' . $annonce->getLieuArrivee() . ')</em>' ?>,<br>
                <?php endforeach; ?>
            </td>
            <td>
                <?php foreach($user->getReservations() as $reservation): ?>
                    de <?= $reservation->getLieuDepart() ?> le <?= $reservation->getDateDepart()->format('d/m/Y') ?> à <?= $reservation->getLieuArrivee() ?>,<br>
                <?php endforeach; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
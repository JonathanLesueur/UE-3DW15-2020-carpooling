<h1>Liste des Voitures</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Couleur</th>
            <th>Puissance Moteur</th>
            <th>1<sup>ère</sup> mise en circulation</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($_cars as $car) : ?>
            <tr>
                <td><?= $car->getId() ?></td>
                <td><?= $car->getMarque() ?></td>
                <td><?= $car->getModele() ?></td>
                <td><?= $car->getCouleur() ?></td>
                <td><?= $car->getPuissanceMoteur() ?></td>
                <td><?= $car->getCirculation()->format('d/m/Y') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
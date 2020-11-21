<h1>Liste des Utilisateurs</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Identité</th>
            <th>Contact</th>
            <th>Date de naissance</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($_users as $user) : ?>
            <tr>
                <td><?= $user->getId() ?></td>
                <td><?= $user->getFirstname() . $user->getLastname() ?> </td>
                <td><?= $user->getEmail() ?></td>
                <td><?= $user->getBirthday()->format('d/m/Y') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
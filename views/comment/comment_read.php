<h1>Liste des Commentaires</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Contenu</th>
            <th>Date d'écriture</th>
            <th>Utilisateur</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($_comments as $comment) : ?>
            <tr>
                <td><?= $comment->getId() ?></td>
                <td><?= $comment->getTitre() ?></td>
                <td><?= $comment->getContenu() ?></td>
                <td><?= $comment->getDateEcriture()->format('d/m/Y') ?></td>
                <?php if(count($comment->getUtilisateur())): ?>
                    <td><?= $comment->getUtilisateur()[0]->getFirstName() . ' ' . $comment->getUtilisateur()[0]->getLastName() ?></td>
                <?php endif; ?>
                
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
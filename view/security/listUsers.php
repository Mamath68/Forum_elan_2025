<?php

    global $result;
    $users = $result["data"]['users'];
?>

<h1>Liste des Utilisateurs</h1>
<div class="container">
    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Pseudo</th>
            <th scope="col">Date Inscription</th>
        </tr>
        </thead>
        <?php foreach( $users as $user ) : ?>
        <tbody>
        <tr>
            <td><?= $user->getId() ?></td>
            <td><?= $user->getPseudo() ?></td>
            <td><?= $user->getRegisterDate() ?></td>
        </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
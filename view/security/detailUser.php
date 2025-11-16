<?php

    use App\Session as Session;

    if( Session::isAdmin() ) {
        ?>
        <div class="card text-center" style="width: 20em; margin-left: 40%;padding-top:2em;">
            <span class="fas fa-user"></span>
            <div class="card-body">
                <h5 class="card-title">
                    <?= Session::getUser()->getPseudo() ?>
                </h5>
                <p>Bienvenu, Administateur</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    Addresse Email
                    <?= Session::getUser()->getEmail() ?>
                </li>
                <li class="list-group-item">
                    Date D'inscription <br>
                    <?= Session::getUser()->getRegisterDate() ?>
                </li>
            </ul>
            <div class="card-body">
                <a href="index.php?ctrl=forum&action=listTopics" class="card-link">Liens vers mes Sujets de
                    Conversation</a>
            </div>
        </div>

        <?php
    } else if( Session::getUser() ) {
        ?>
        <div class="card text-center" style="width: 20em; margin-left: 40%;padding-top:2em;">
            <span class="fas fa-user"></span>
            <div class="card-body">
                <h5 class="card-title">
                    <?= Session::getUser()->getPseudo() ?>
                </h5>
                <p>Bienvenu, Utilisateurs</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    Addresse Email
                    <?= Session::getUser()->getEmail() ?>
                </li>
                <li class="list-group-item">
                    Date D'inscription <br>
                    <?= Session::getUser()->getRegisterDate() ?>
                </li>
            </ul>
            <div class="card-body">
                <a href="index.php?ctrl=forum&action=listTopics" class="card-link">Liens vers mes Sujets de
                    Conversation</a>
            </div>
        </div>
        <?php

    }

?>
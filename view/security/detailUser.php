<?php

    use App\Session as Session;

    if( Session::isAdmin() ) : ?>
        <div class="card text-center col-3 mx-auto pt-4 my-3">
            <span class="fas fa-user"></span>
            <div class="card-body">
                <h5 class="card-title">
                    <?= Session::getUser()->getPseudo() ?>
                </h5>
                <p>Bienvenue, Administateur</p>
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

    <?php elseif( Session::getUser() ):
        ?>
        <div class="card text-center col-3 mx-auto pt-4">
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
    <?php endif;
<?php

    use App\Session as Session;
    use components\Basics\Text;

    if( Session::isAdmin() ) : ?>
        <div class="card text-center col-3 mx-auto pt-4 my-3">
            <div class="text-center">
                <?php Text::make( "", "span", ["class" => "fas fa-user"] ) ?>
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    <?= Session::getUser()->getPseudo() ?>
                </h5>
                <?php Text::make( "Bienvenue, Administateur" ) ?>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <?php Text::make( "Addresse Email", "span" ) ?>
                    <?= Session::getUser()->getEmail() ?>
                </li>
                <li class="list-group-item">
                    <?php Text::make( "Date D'inscription", "span" ) ?> <br>
                    <?= Session::getUser()->getRegisterDate() ?>
                </li>
            </ul>
            <div class="card-body">
                <a href="index.php?ctrl=forum&action=index" class="card-link">Mes Sujets de
                    Conversation</a>
            </div>
        </div>

    <?php elseif( Session::getUser() ):
        ?>
        <div class="card text-center col-3 mx-auto pt-4">
            <?php Text::make( "", "span", ["class" => "fas fa-user"] ) ?>
            <div class="card-body">
                <h5 class="card-title">
                    <?= Session::getUser()->getPseudo() ?>
                </h5>
                <?php Text::make( "Bienvenue, Utilisateur" ) ?>
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
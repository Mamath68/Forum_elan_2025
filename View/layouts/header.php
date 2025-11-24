<?php

    use App\Session as Session;

?>
<nav class="navbar bg-body-tertiary navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">Forum</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
             aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Forum</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link <?= Session::isActive( 'home', 'index' ) ?>" aria-current="page"
                           href="index.php?ctrl=home&action=index">Accueil</a>
                    </li>
                    <!--Si l'utilisateur est administrateur-->
                    <?php if( Session::isAdmin() ) :
                        ?>
                        <li class="nav-item">
                            <a class="nav-link <?= Session::isActive( 'home', 'users' ) ?>"
                               href="index.php?ctrl=home&action=users">Voir la liste des
                                utilisateurs</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link <?= Session::isActive( 'forum', 'index' ) ?>"
                           href="index.php?ctrl=forum&action=index">Liste des
                            catégories</a>
                    </li>
                </ul>
                <div class="d-flex mt-1">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <!-- Si l'utilisateur est connecté-->
                        <?php if( Session::getUser() ): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <span class="fas fa-user"></span>&nbsp;
                                    <?= Session::getUser()->getPseudo() ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                           href="index.php?ctrl=home&action=detailUser&id=<?= Session::getUser()->getId() ?>">Profile</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <form method="post" action="index.php?ctrl=security&action=logout">
                                        <button type="submit" class="dropdown-item">Logout
                                        </button>
                                    </form>
                                </ul>
                            </li>
                        <?php else : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    Connectique
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="index.php?ctrl=security&action=loginForm">Connexion</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="index.php?ctrl=security&action=registerForm">Inscription</a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<?php
    global $meta_description;
    global $title;
    global $page;

    use App\Session as Session;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $meta_description ?>">
    <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
          integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style.css">
    <title><?= $title ?></title>
</head>
<body>
<h3 class="message error">
    <?= Session::getFlash( "error" ) ?>
</h3>
<h3 class="message success">
    <?= Session::getFlash( "success" ) ?>
</h3>
<header>
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
                                        <li><a class="dropdown-item" href="index.php?ctrl=home&action=detailUser&id=<?=Session::getUser()->getId()?>">Profile</a>
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
                                        <li><a class="dropdown-item" href="index.php?ctrl=security&action=login">Connexion</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="index.php?ctrl=security&action=register">Inscription</a>
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
</header>

<main class="container">
    <?= $page ?>
</main>
<footer>
    <p>&copy; <?= date_create()->format( "Y" ) ?> - <a href="#">Règlement du forum</a> - <a href="#">Mentions
            légales</a></p>
</footer>
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
</script>
<script>
    $(document).ready(function () {
        $(".message").each(function () {
            if ($(this).text().length > 0) {
                $(this).slideDown(500, function () {
                    $(this).delay(3000).slideUp(500)
                })
            }
        })
        $(".delete-btn").on("click", function () {
            return confirm("Etes-vous sûr de vouloir supprimer?")
        })
        tinymce.init({
            selector: '.post',
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
<script src="<?= PUBLIC_DIR ?>/js/script.js"></script>
</body>
</html>
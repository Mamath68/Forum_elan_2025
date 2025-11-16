<?php

    global $result;
    $category = $result["data"]['category'];
    $topics = $result["data"]['topics'];

    use App\Session as Session;

    if( Session::getUser() ) :
        include_once( "forms/addTopics.php" );
    endif; ?>

<h1 class='text-center my-2'><?= $category->getName() ?></h1>
<?php if( !empty( $topics ) ) : ?>
    <div class="container text-center">
        <div class="row">
            <?php foreach( $topics as $topic ) : ?>
                <div class="col-md-3 col-sm-4 col-xs-6 mb-3">
                    <div class="card text-bg-dark mb-3">
                        <div class="card-header">
                            <a class="card-title fs-4"
                               href="index.php?ctrl=forum&action=findPostByTopic&id=<?= $topic->getId() ?>">
                                <?= $topic->getTitle() ?>
                            </a>
                        </div>
                        <div class="card-body">
                            <p class="card-text text-center">Créé le :<?= $topic->getCreationDate() ?></p>
                            <p class="card-text text-center">Par : <?= $topic->getUser()->getPseudo() ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php else : ?>
    <div class="text-center">
        <h3>Il n’y a pas de Topic pour cette catégorie.</h3>
    </div>
<?php endif; ?>

<?php

    global $result;
    $category = $result["data"]['category'];
    $topics = $result["data"]['topics'];

    use App\Session as Session;

    if( Session::getUser() ) :
        include_once( "forms/addTopics.php" );
    endif; ?>
<h1 class='text-center my-2'><?= $category->getName() ?></h1>
<div class="container d-flex flex-nowrap">
    <?php
        if( !empty( $topics ) ) :
            foreach( $topics as $topic ) :?>
                <div class="card w-25 m-3">
                    <div class="card-header text-center">
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
            <?php endforeach;
        else : ?>
            <p>Il n’y a pas de Topic pour cette catégorie.</p>
        <?php endif; ?>
</div>

<?php

    global $result;
    $category = $result["data"]['category'];
    $topics = $result["data"]['topics'];

    use App\Session as Session;


    if( Session::getUser() ) : ?>
        <div>
            <button>
                <a href="index.php?ctrl=forum&action=addTopic&id=<?= $category->getId() ?>">Add</a>
            </button>
        </div>
    <?php endif; ?>
<h1 class='text-center' style='margin-bottom: 30px;'><?= $category->getName() ?></h1>
<div class="container" style="display:flex; flex-wrap:wrap;">
    <?php
        if( !empty( $topics ) ) :
            foreach( $topics as $topic ) :?>
                <div class="card" style="width:30%; margin:25px;">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="index.php?ctrl=forum&action=findPostByTopic&id=<?= $topic->getId() ?>"><?=
                                    $topic->getTitle() ?></a>
                        </h5>
                        <p class="card-text text-center"><?= $topic->getCreationDate() ?></p>
                        <p class="card-text text-center"><?= $topic->getUser()->getPseudo() ?></p>
                    </div>
                </div>
            <?php endforeach;
        else :?>
            <p>PAS DE TOPIC POUR CETTE CATEGORIE</p>
        <?php endif; ?>
</div>

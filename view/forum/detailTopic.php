<?php

    global $result;
    $topic = $result["data"]['topic'];
    $posts = $result["data"]['posts'];

    use App\Session as Session;

    if( Session::getUser() ) :?>
        <div>
            <form action="index.php?ctrl=forum&action=addPost&id=<?= $topic->getId() ?>" method="post">
                <label>
                    <textarea name="body" cols="30" rows="10" required></textarea>
                </label>
                <button type="submit" name="submit">Ajouter votre Commentaire</button>
            </form>
        </div>
    <?php endif; ?>
<h1 class='text-center' style='margin-bottom: 30px;'>
    <?= $topic->getTitle() ?>
</h1>
<div class="container" style="display:flex; flex-direction:column; align-items:center;">
    <?php if( !empty( $posts ) ) :
        foreach( $posts as $post ) : ?>
    <div class="card" style="background-color:black; width: 30%;margin:25px;">
        <div class="card-body">
            <p class="card-text text-center" style="color:yellow"><small><?= $post->getUser()->getPseudo() ?>
                </small></p>
            <p class="card-text text-center text-light"><strong><?= $post->getBody() ?>
                </strong></p>
        </div>
        <div class="button" style="display:flex; justify-content:center;">

            <a style="color:white" href="index.php?ctrl=forum&action=editPostByTopic&id=<?= $post->getId() ?>">
                <button class="btn btn-success">Edit</button>
            </a>
            <a style="color:white" href="index.php?ctrl=forum&action=deletPostByTopic&id=<?= $post->getId() ?>">
                <button class="btn btn-danger">Delete</button>
            </a>
        </div>
    </div>
    <?php endforeach;
    else : ?>
    <h3>pas de post</h3>
    <?php endif;?>
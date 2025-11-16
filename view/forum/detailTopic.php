<?php

    global $result;
    $topic = $result["data"]['topic'];
    $posts = $result["data"]['posts'];

    use App\Session as Session;

    if( Session::getUser() ) :
        include_once( "forms/addPost.php" );
    endif; ?>
<h1 class="text-center my-2">
    <?= $topic->getTitle() ?>
</h1>
<div class="container d-flex flex-column align-items-center">
    <?php
    if( !empty( $posts ) ) :
        foreach( $posts as $post ) : ?>
    <div class="card bg-black w-25 m-3">
        <div class="card-body">
            <p class="card-text text-center" style="color:yellow">
            <small>
            <?= $post->getUser()->getPseudo() ?>
                </small>
            </p>
            <p class="card-text text-center text-light">
            <strong>
            <?= $post->getBody() ?>
            </strong>
            </p>
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
    <h3>Pas de post</h3>
    <?php endif;?>
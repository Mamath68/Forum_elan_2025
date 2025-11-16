<?php

    global $result;
    $topic = $result["data"]['topic'];
    $posts = $result["data"]['posts'];

    use App\Session as Session;

    if( Session::getUser() ) :
        include_once( "forms/addPost.php" );
    endif;
?>
<h1 class="text-center my-2">
    <?= $topic->getTitle() ?>
</h1>
<div class="container text-center my-2">
    <?php if( !empty( $posts ) ) : ?>
        <div class="container text-center">
            <div class="row">
                <?php foreach( $posts as $post ) : ?>
                    <div class="col-md-3 col-sm-4 col-xs-6 mb-3">
                        <div class="card text-bg-dark mb-3">
                            <div class="card-header text-warning">
                                <small>
                                    <?= $post->getUser()->getPseudo() ?>
                                </small>
                            </div>
                            <div class="card-body">
                                <h5 class="card-text">
                                    <strong>
                                        <?= $post->getBody() ?>
                                    </strong>
                                </h5>
                            </div>
                            <div class="card-footer">
                                <a href="index.php?ctrl=forum&action=editPostByTopic&id=<?= $post->getId() ?>"
                                   class="btn btn-success text-white">Edit
                                </a>
                                <a href="index.php?ctrl=forum&action=deletPostByTopic&id=<?= $post->getId() ?>"
                                   class="btn btn-danger text-white">
                                    Delete
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php else : ?>
        <div class="text-center">
            <h3>Il n’y a pas de Post pour ce Topic.</h3>
        </div>
    <?php endif; ?>

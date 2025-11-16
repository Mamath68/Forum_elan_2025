<?php
    global $result;
    $categories = $result["data"]["categories"];

    use App\Session as Session;

?>

<h1>Liste des Catégories</h1>

<?php

    if( Session::isAdmin() ) :
        include_once( "forms/addCategory.php" );

    endif; ?>
<div class="container text-center">
    <div class="row">
        <?php foreach( $categories as $category ): ?>
            <div class="col-md-3 col-sm-4 col-xs-6 mb-3">
                <div class="card text-bg-dark mb-3">
                    <div class="card-header">
                        <h3 class="card-title">
                            <?= $category->getName() ?>
                        </h3>
                    </div>
                    <div class="card-body">
                        <h5>
                            <a href="index.php?ctrl=forum&action=findTopicByCat&id=<?= $category->getId() ?>">
                                Voir le Topic
                            </a>
                        </h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php

    global $result;
    $category = $result["data"]['category'];
    $topics = $result["data"]['topics'];

    use App\Session as Session;
    use Components\Basics\Text;
    use Components\Basics\Tag;

    if( Session::getUser() ) :
        include_once( "forms/addTopics.php" );
    endif;

    Text::make( $category->getName(), "h1", ["class" => "text-center text-primary my-2"] );
    if( !empty( $topics ) ) :
        Tag::open( "div", ["class" => "container text-center my-2"] );
        Tag::open( "div", ["class" => "row"] );
        foreach( $topics as $topic ) :
            Tag::open( "div", ["class" => "col-md-3 col-sm-4 col-xs-6 mb-3"] );
            Tag::open( "div", ["class" => "card text-bg-dark mb-3"] );
            Tag::open( "div", ["class" => "card-header"] ); ?>
            <a class="card-title fs-4" href="index.php?ctrl=forum&action=findPostByTopic&id=<?= $topic->getId() ?>">
                <?= $topic->getTitle() ?>
            </a>
            <?php Tag::close( "div" );
            Tag::open( "div", ["class" => "card-body"] );
            Text::make( "Créé le :" . $topic->getCreationDate(), "p", ["class" => "card-text text-center"] );
            Text::make( "Par :" . $topic->getUser()->getPseudo(), "p", ["class" => "card-text text-center"] );
            Tag::close( "div" );
            Tag::close( "div" );
            Tag::close( "div" );
        endforeach;
        Tag::close( "div" );
        Tag::close( "div" );
    else :
        Tag::open( "div", ["class" => "container text-center my-2"] );
        Text::make( "Il n’y a pas de Topic pour cette catégorie.", "h3", ["class" => "text-center text-primary my-2"] );
        Tag::close( "div" );
    endif; ?>

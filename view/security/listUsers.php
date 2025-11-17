<?php

    global $result;

    use components\Basics\Tag;
    use components\Basics\Text;

    $users = $result["data"]['users'];

    Text::make( "Liste des utilisateurs", "h1", ["class" => "text-center my-2"] );
    Tag::open( "div", ["class" => "container"] );
    Tag::open( "table", ["class" => "table table-striped text-center"] );
    Tag::open( "thead" );
    Tag::open( "tr" );
    Tag::close( "tr" );
    Tag::open( "th" );
    Text::make( "ID", "span" );
    Tag::close( "th" );
    Tag::open( "th" );
    Text::make( "Pseudo", "span" );
    Tag::close( "th" );
    Tag::open( "th" );
    Text::make( "Date d'inscription", "span" );
    Tag::close( "th" );
    Tag::close( "thead" );
    foreach( $users as $user ) :
        Tag::open( "tbody" );
        Tag::open( "tr" );
        Tag::open( "td" );
        echo $user->getId();
        Tag::close( "td" );
        Tag::open( "td" );
        echo $user->getPseudo();
        Tag::close( "td" );
        Tag::open( "td" );
        echo $user->getRegisterDate();
        Tag::close( "td" );
        Tag::close( "tr" );
    endforeach;
    Tag::close( "tbody" );

    Tag::close( "table" );
    Tag::close( "div" );

<?php

    use App\Session as Session;
    use Components\Basics\Tag;
    use Components\Basics\Text;


    Tag::open( "div", ["class" => "card text-center col-3 mx-auto pt-4 my-3"] );

    Tag::open( "div", ["class" => "text-center"] );
    Text::make( "", "span", ["class" => "fas fa-user"] );
    Tag::close( "div" );
    Tag::open( "div", ["class" => "card-body"] );
    Text::make( Session::getUser()->getPseudo(), "h5", ["class" => "card-title"] );

    if( Session::isAdmin() ) :
        Text::make( "Bienvenue, Administateur", "h4" );
    else:
        Text::make( "Bienvenue, Utilisateur", "h4" );
    endif;
    Tag::close( "div" );
    Tag::open( "ul", ["class" => "list-group list-group-flush"] );
    Tag::open( "li", ["class" => "list-group-item"] );
    Text::make( "Addresse Email" );
    echo Session::getUser()->getEmail();
    Tag::close( "li" );
    Tag::open( "li", ["class" => "list-group-item"] );
    Text::make( "Date D'inscription" );
    echo Session::getUser()->getRegisterDate();
    Tag::close( "li" );

    Tag::close( "ul" );
    Tag::open( "div", ["class" => "card-body"] );
?>
<a href="index.php?ctrl=forum&action=index" class="card-link">Mes Sujets de
    Conversation</a>
<?php
    Tag::close( "div" );
    Tag::close( "div" );
?>


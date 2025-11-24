<?php

    use Components\Basics\Button;
    use Components\Basics\Tag;
    use Components\Basics\Text;
    use App\Session as Session;


    if( Session::isAdmin() ) :
        Text::make( "Bienvenue Administrateur", "h1", ["class" => "text-center text-primary"] );
        Tag::open( "div", ["class" => "container align-content-center flex-wrap p-2"] );

        Text::make( "Vous pouvez désormais Créer vos Catégories, sujets de conversation, poster des messages, et gérer les users." );
        Text::make( "Vous pouvez par exemple, bannir les users ayant enfreint les", "span" ); ?>
        <a href="index.php?ctrl=home&action=forumRules" target="_blank">Règles du forum</a>
        <?php
        Tag::close( "div" );
    elseif( Session::getUser() ) :
        Text::make( "Bienvenue sur votre Forum Favoris", "h1", ["class" => "text-center text-primary"] );
        Tag::open( "div", ["class" => "container align-content-center flex-wrap p-2"] );

        Text::make( "Vous pouvez désormais poser vos questions, répondre aux questions déjà présente, ou simplement créer un nouveau sujet de conversation, si vous ne trouvez pas votre bonheur." );
        Tag::close( "div" );
    else :
        Text::make( "Bienvenue sur ce Forum", "h1", ["class" => "text-center text-primary"] );
        Tag::open( "div", ["class" => "container align-content-start flex-wrap p-2"] );
        Text::make( "Ici, vous pouvez choisir un thème(Catégorie), sélectionner un sujet de conversation et trouvez les réponses aux questions que vous cherchez.", "inline" );
        Text::make( "Seulement, pour poser vos questions (ou répondre à une question déjà présente), vous devrez créer un compte et vous connecter." );
        Tag::close( "div" );
        Tag::open( "div", ["class" => "d-flex justify-content-center align-items-center"] );

        Button::create( [
                "text" => "Se Connecter",
                "href" => "index.php?ctrl=security&action=loginForm"
        ] );
        Text::make( "-", "span", ["class" => "mx-3"] );

        Button::create( [
                "text" => "S'inscrire",
                "href" => "index.php?ctrl=security&action=registerForm",
                "class" => "btn btn-success"
        ] );
        Tag::close( "div" );
    endif;
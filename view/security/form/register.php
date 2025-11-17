<?php

    use components\Basics\Button;
    use components\Basics\Tag;
    use components\Basics\Text;
    use components\Forms\Form;
    use components\Forms\FormGroup;
    use components\Forms\Input;

    Text::make( "S'inscrire", "h1", ["class" => "text-center text-primary mb-3"] );
    FormGroup::open();
    Form::open( [
            "method" => "post",
            "action" => "index.php?ctrl=security&action=register"
    ] );

    Tag::open( "div", ["class" => "row"] );
    Tag::open( "div", ["class" => "col"] );

    Input::create( [
            "label" => "Pseudo",
            "name" => "pseudo",
            "type" => "text",
            "id" => "pseudo",
            "placeholder" => "Entrez votre Pseudo",
            "required" => true
    ] );
    Tag::close( "div" );
    Tag::open( "div", ["class" => "col"] );
    Input::create( [
            "label" => "Email",
            "name" => "email",
            "type" => "email",
            "id" => "email",
            "placeholder" => "Entrez votre Email",
            "required" => true
    ] );
    Tag::close( "div" );
    Tag::close( "div" );

    Tag::open( "div", ["class" => "row"] );
    Tag::open( "div", ["class" => "col"] );
    Input::create( [
            "label" => "Mot de passe",
            "name" => "password",
            "type" => "password",
            "id" => "password",
            "placeholder" => "Entrez votre mot de passe",
            "required" => true
    ] );
    Tag::close( "div" );
    Tag::open( "div", ["class" => "col"] );
    Input::create( [
            "label" => "Confirmez le Mot de passe",
            "name" => "confirmpassword",
            "type" => "password",
            "id" => "confirmpassword",
            "placeholder" => "Confirmez votre mot de passe",
            "required" => true
    ] );
    Tag::close( "div" );
    Tag::close( "div" );

    Button::create( [
            "text" => "S'enregistrer",
            "type" => "submit",
    ] );

    Form::close();
    FormGroup::close();

    Button::create( [
            "text" => "Déja un compte ? Se connecter !",
            "href" => "index.php?ctrl=security&action=loginForm",
            "class" => "btn btn-success link-light"
    ] );

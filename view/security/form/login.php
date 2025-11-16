<?php

    use components\Basics\Button;
    use components\Basics\Text;
    use components\Forms\Form;
    use components\Forms\FormGroup;
    use components\Forms\Input;

    Text::make( "Se Connecter", "h1", ["class" => "text-center text-primary"] );

    FormGroup::open();
    Form::open( [
            "method" => "post",
            "action" => "index.php?ctrl=security&action=login"
    ] );
    Input::create( [
            "label" => "Pseudo",
            "name" => "pseudo",
            "type" => "text",
            "id" => "pseudo",
            "placeholder" => "Entrez votre Pseudo",
            "required" => true
    ] );

    Input::create( [
            "label" => "Mot de passe",
            "name" => "password",
            "type" => "password",
            "id" => "password",
            "placeholder" => "Entrez votre mot de passe",
            "required" => true
    ] );

    Button::create( [
            "text" => "Se Connecter",
            "type" => "submit",
    ] );

    Form::close();
    FormGroup::close();

    Button::create( [
            "text" => "Pas encore de compte ? Enregistrez-vous !",
            "href" => "index.php?ctrl=security&action=registerForm",
            "class" => "btn btn-success link-light"
    ] );

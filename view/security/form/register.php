<?php

    use components\Button;
    use components\Form;
    use components\FormGroup;
    use components\Input;

?>
<h1>S'inscrire</h1>
<?php
    FormGroup::open();
    Form::open( [
            "method" => "post",
            "action" => "index.php?ctrl=security&action=register"
    ] );
?>
<div class="row">
    <div class="col">
        <?php
            Input::create( [
                    "label" => "Pseudo",
                    "name" => "pseudo",
                    "type" => "text",
                    "id" => "pseudo",
                    "placeholder" => "Entrez votre Pseudo",
                    "required" => true
            ] );
        ?>
    </div>
    <div class="col">
        <?php
            Input::create( [
                    "label" => "Email",
                    "name" => "email",
                    "type" => "email",
                    "id" => "email",
                    "placeholder" => "Entrez votre Email",
                    "required" => true
            ] );
        ?>
    </div>
</div>
<div class="row">
    <div class="col">
        <?php Input::create( [
                "label" => "Mot de passe",
                "name" => "password",
                "type" => "password",
                "id" => "password",
                "placeholder" => "Entrez votre mot de passe",
                "required" => true
        ] );
        ?>
    </div>
    <div class="col">
        <?php Input::create( [
                "label" => "Confirmez le Mot de passe",
                "name" => "confirmpassword",
                "type" => "password",
                "id" => "confirmpassword",
                "placeholder" => "Confirmez votre mot de passe",
                "required" => true
        ] );
        ?>
    </div>
</div>
<?php
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

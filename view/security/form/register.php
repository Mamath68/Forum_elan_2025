<?php

    use components\Button;
    use components\Input;

?>
<h1>Register Form</h1>

<form action="index.php?ctrl=security&action=register" method="post" enctype="multipart/form-data">

    <?php
        Input::create( [
                "label" => "Pseudo",
                "name" => "pseudo",
                "type" => "text",
                "id" => "pseudo",
                "placeholder" => "Entrez votre Pseudo",
                "required" => true
        ] );

        Input::create( [
                "label" => "Email",
                "name" => "email",
                "type" => "email",
                "id" => "email",
                "placeholder" => "Entrez votre Email",
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

        Input::create( [
                "label" => "Confirmez le Mot de passe",
                "name" => "confirmpassword",
                "type" => "password",
                "id" => "confirmpassword",
                "placeholder" => "Confirmez votre mot de passe",
                "required" => true
        ] );
        Button::create( [
                "text" => "S'enregistrer",
                "type" => "submit",
        ] );
    ?>
</form>

<?php
    Button::create( [
            "text" => "Déja un compte ? Se connecter !",
            "href" => "index.php?ctrl=security&action=loginForm",
            "class" => "btn btn-success link-light"
    ] );
?>

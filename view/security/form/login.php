<?php

    use components\Button;
    use components\Input;

?>
    <h1>Form Connexion</h1>

    <form action="index.php?ctrl=security&action=login" method="post" enctype="multipart/form-data">

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
        ?>
    </form>
<?php
    Button::create( [
            "text" => "Pas encore de compte ? Enregistrez-vous !",
            "href" => "index.php?ctrl=security&action=registerForm",
            "class" => "btn btn-success link-light"
    ] );
?>
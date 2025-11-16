<?php
    global $result;

    use components\Button;
    use components\Form;
    use components\FormGroup;
    use components\Textarea;

    $topic = $result["data"]['topic'];
    $posts = $result["data"]['posts'];

    FormGroup::open();
    Form::open( [
            "method" => "post",
            "action" => "index.php?ctrl=forum&action=addPost&id={$topic->getId()}"
    ] );

    Textarea::create( [
            "name" => "body",
            "rows" => 10,
            "cols" => 30,
            "placeholder" => "Votre Commentaire",
            "id" => "body",
    ] );

    Button::create( [
            "text" => "Ajouter votre Commentaire",
            "type" => "submit",
    ] );
    Form::close();
    FormGroup::close();

<?php
    global $result;
    $category = $result["data"]['category'];
	
	use Components\Basics\Button;
	use Components\Forms\Form;
	use Components\Forms\FormGroup;
	use Components\Forms\Input;
	
	FormGroup::open();
    Form::open( [
            "method" => "post",
            "action" => "index.php?ctrl=forum&action=addTopic&id={$category->getId()}"
    ] );
    
    Input::create( [
            "label" => "Titre du Sujet",
            "name" => "title",
            "type" => "text",
            "id" => "title",
            "placeholder" => "Le Sujet",
            "required" => true
    ] );
    Button::create( [
            "text" => "Créer",
            "type" => "submit",
    ] );
    Form::close();
    FormGroup::close();
	

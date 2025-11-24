<?php
	global $result;
	
	use Components\Basics\Button;
	use Components\Forms\Form;
	use Components\Forms\FormGroup;
	use Components\Forms\Textarea;
	
	$topic = $result["data"]['topic'];
	$posts = $result["data"]['posts'];
	
	FormGroup::open();
	Form::open( [
		"method" => "post",
		"action" => "index.php?ctrl=forum&action=addPost&id=" . $topic->getId()
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

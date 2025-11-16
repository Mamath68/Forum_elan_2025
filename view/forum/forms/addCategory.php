<?php
	
	use components\Button;
	use components\Form;
	use components\FormGroup;
	use components\Input;
	
	FormGroup::open();
	Form::open( [
		"method" => "post",
		"action" => "index.php?ctrl=forum&action=addCategory"
	] );
	
	Input::create( [
		"label" => "Créez Votre Catégorie",
		"name" => "name",
		"type" => "text",
		"id" => "name",
		"placeholder" => "Votre Catégorie",
		"required" => true
	] );
	
	Button::create( [
		"text" => "Créer",
		"type" => "submit",
	] );
	Form::close();
	FormGroup::close();
	


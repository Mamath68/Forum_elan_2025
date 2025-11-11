<?php
	
	namespace App;
	
	/**
	 * En programmation orientée objet, une classe abstraite est une classe qui ne peut pas être instanciée directement. </br>
	 * Cela signifie que vous ne pouvez pas créer un objet directement à partir d'une classe abstraite. </br></br>
	 * Les classes abstraites : </br>
	 * — peuvent contenir à la fois des méthodes abstraites (méthodes sans implémentation) et des méthodes concrètes (méthodes avec implémentation).</br>
	 * — Peuvent avoir des propriétés (variables) avec des valeurs par défaut.</br>
	 * — Une classe peut étendre une seule classe abstraite.</br>
	 * — Permettent de fournir une certaine implémentation de base.
	 */
	abstract class AbstractController
	{
		
		public function index() { }
		
		public function redirectTo( $ctrl = null, $action = null, $id = null ) : void
		{
			
			$url = $ctrl ? "?ctrl=" . $ctrl : "";
			$url .= $action ? "&action=" . $action : "";
			$url .= $id ? "&id=" . $id : "";
			
			header( "Location: $url" );
			die();
		}
		
		public function restrictTo( $role ) : void
		{
			
			if( !Session::getUser() || !Session::getUser()->hasRole( $role ) ) {
				$this->redirectTo( "security", "login" );
			}
		}
		
	}
<?php
	
	namespace App;
	
	class Session
	{
		
		public static function start() : void
		{
			if( session_status() === PHP_SESSION_NONE ) {
				// La session n’est pas démarrée
				session_start(); // Lance la session si nécessaire
			}
			
		}
		
		public static function isActive(string $ctrl, string $action): string {
			return ($_GET['ctrl'] ?? '') === $ctrl && ($_GET['action'] ?? '') === $action ? 'active' : '';
		}
		
		
		private static array $categories = ['error', 'success'];
		
		/**
		 *   ajoute un message en session, dans la catégorie $categ
		 */
		public static function addFlash( $categ, $msg ) : void
		{
			$_SESSION[ $categ ] = $msg;
		}
		
		/**
		 *   renvoie un message de la catégorie $categ, s'il y en a !
		 */
		public static function getFlash( $categ )
		{
			
			if( isset( $_SESSION[ $categ ] ) ) {
				$msg = $_SESSION[ $categ ];
				unset( $_SESSION[ $categ ] );
			} else $msg = "";
			
			return $msg;
		}
		
		/**
		 *   met un user dans la session (pour le maintenir connecté)
		 */
		public static function setUser( $user ) : void
		{
			$_SESSION["user"] = $user;
		}
		
		public static function getUser()
		{
			return ( isset( $_SESSION['user'] ) ) ? $_SESSION['user'] : false;
		}
		
		public static function isAdmin() : bool
		{
			// attention de bien définir la méthode "hasRole" dans l'entité User en fonction de la façon dont sont gérés les rôles en base de données
			if( self::getUser() && self::getUser()->hasRole( "ROLE_ADMIN" ) ) {
				return true;
			}
			return false;
		}
	}
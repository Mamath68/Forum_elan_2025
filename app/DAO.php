<?php
	
	namespace App;
	
	use Exception;
	use PDO;
	
	/**
	 * Classe d'accès aux données de la BDD, abstraite
	 *
	 * @property static $bdd l'instance de PDO que la classe stockera lorsque connect() sera appelé
	 *
	 * @method connect() connexion à la BDD
	 * @method insert() requètes d'insertion dans la BDD
	 * @method select() requètes de sélection
	 */
	abstract class DAO
	{
		
		private static string $host = 'mysql:host=127.0.0.1;port=3306';
		private static string $dbname = 'forum_valeria';
		private static string $dbuser = 'root';
		private static string $dbpass = '';
		
		private static PDO $bdd;
		
		/**
		 * Cette méthode permet de créer l'unique instance de PDO de l'application
		 */
		public static function connect() : void
		{
			
			self::$bdd = new PDO(
				self::$host . ';dbname=' . self::$dbname,
				self::$dbuser,
				self::$dbpass,
				[
					PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
				],
			);
		}
		
		public static function insert( $sql ) : false | string | null
		{
			try {
				$stmt = self::$bdd->prepare( $sql );
				$stmt->execute();
				/**
				 * On renvoie l'id de l'enregistrement qui vient d'être ajouté en base pour s’en servir aussitôt dans le controleur.
				 */
				return self::$bdd->lastInsertId();
				
			} catch( Exception $e ) {
				echo $e->getMessage();
			}
			return null;
		}
		
		public static function update( $sql, $params ) : ?bool
		{
			try {
				$stmt = self::$bdd->prepare( $sql );
				
				/**
				 * On renvoie l'état du statement après exécution (true ou false).
				 */
				return $stmt->execute( $params );
				
			} catch( Exception $e ) {
				
				echo $e->getMessage();
			}
			return null;
		}
		
		public static function delete( $sql, $params )
		{
			try {
				$stmt = self::$bdd->prepare( $sql );
				
				/**
				 * On renvoie l'état du statement après exécution (true ou false).
				 */
				return $stmt->execute( $params );
				
			} catch( Exception $e ) {
				echo $sql;
				echo $e->getMessage();
				die();
			}
		}
		
		/**
		 * Cette méthode permet les requêtes de type SELECT
		 *
		 * @param string     $sql      la chaine de caractère contenant la requête elle-même
		 * @param mixed|null $params   =null les paramètres de la requête
		 * @param bool       $multiple =true vrai si le résultat est composé de plusieurs enregistrements (défaut), false si un seul résultat doit être récupéré
		 *
		 * @return array|null les enregistrements en FETCH_ASSOC ou null si aucun résultat
		 */
		public static function select( string $sql, mixed $params = null, bool $multiple = true ) : ?array
		{
			try {
				$stmt = self::$bdd->prepare( $sql );
				$stmt->execute( $params );
				
				$results = ( $multiple ) ? $stmt->fetchAll() : $stmt->fetch();
				
				$stmt->closeCursor();
				return !$results ? null : $results;
			} catch( Exception $e ) {
				echo $e->getMessage();
			}
			return null;
		}
	}
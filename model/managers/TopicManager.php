<?php
	
	namespace Model\Managers;
	
	use App\Manager;
	use App\DAO;
	use Generator;
	
	class TopicManager extends Manager
	{
		
		// on indique la classe POO et la table correspondante en BDD pour le manager concerné
		protected string $className = "Model\Entities\Topic";
		protected string $tableName = "topic";
		
		public function __construct()
		{
			parent::connect();
		}
		
		// récupérer tous les topics d'une catégorie spécifique (par son id)
		public function findTopicsByCategory( $id ) : ?Generator
		{
			
			$sql = "SELECT *
                FROM " . $this->tableName . " t
                WHERE t.category_id = :id";
			
			// la requête renvoie plusieurs enregistrements --> getMultipleResults
			return $this->getMultipleResults(
				DAO::select( $sql, ['id' => $id] ),
				$this->className,
			);
		}
	}
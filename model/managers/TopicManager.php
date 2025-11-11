<?php
	
	namespace Model\Managers;
	
	use App\Manager;
	use App\DAO;
	use Generator;
	
	class TopicManager extends Manager
	{
		
		/**
		 * @var string
		 */
		protected string $className = "Model\Entities\Topic";
		/**
		 * @var string
		 */
		protected string $tableName = "topic";
		
		
		/**
		 *
		 */
		public function __construct()
		{
			parent::connect();
		}
		
		/**
		 * @param $title
		 *
		 * @return false|mixed|string
		 */
		public function findOneByTopic( $title ) : mixed
		{
			$sql = "SELECT *
        FROM " . $this->tableName . " t
        WHERE t.title = :title";
			
			return $this->getOneOrNullResult(
				DAO::select( $sql, ['title' => $title] ),
				$this->className,
			);
		}
		
		/**
		 * @param $id
		 *
		 * @return \Generator|null
		 */
		public function findTopicsByCat( $id ) : ?Generator
		{
			$sql = "SELECT t.id_topic, t.title, t.creationDate, t.user_id, t.category_id
        FROM " . $this->tableName . " t
        INNER JOIN category c ON c.id_category = t.category_id
        WHERE c.id_category = :id";
			
			return $this->getMultipleResults(
				DAO::select( $sql, ['id' => $id] ),
				$this->className,
			);
		}
		
		/**
		 * @param $id
		 *
		 * @return \Generator|null
		 */
		public function findTopicsByUser( $id ) : ?Generator
		{
			$sql = "SELECT t.id_topic, t.title, t.creationDate, t.user_id, u.id_user,u.pseudo
            FROM " . $this->tableName . " t
            INNER JOIN user u
            ON u.id_user = t.user_id
            WHERE t.user_id = :id";
			
			return $this->getMultipleResults(
				DAO::select( $sql, ['id' => $id] ),
				$this->className,
			);
		}
		
	}
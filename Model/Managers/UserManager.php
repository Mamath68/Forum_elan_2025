<?php
	
	namespace Model\Managers;
	
	use App\Manager;
	use App\DAO;
	
	
	class UserManager extends Manager
	{
		
		protected string $className = "Model\Entities\User";
		protected string $tableName = "user";
		
		public function __construct()
		{
			parent::connect();
		}
		
		public function findOneByPseudo( $data )
		{
			
			$sql = "SELECT *
        FROM " . $this->tableName . " u
        WHERE  u.pseudo = :pseudo
        ";
			
			return $this->getOneOrNullResult(
				DAO::select( $sql, ['pseudo' => $data], false ),
				$this->className,
			);
		}
		
		public function updateUser( $sql, $params ) : void
		{
			DAO::update( $sql, $params );
		}
	}
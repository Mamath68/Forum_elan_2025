<?php
	
	namespace Model\Managers;
	
	use App\Manager;
	use App\DAO;
	
	class UserManager extends Manager
	{
		
		// on indique la classe POO et la table correspondante en BDD pour le manager concerné
		protected string $className = "Model\Entities\User";
		protected string $tableName = "user";
		
		public function __construct()
		{
			DAO::connect();
		}
	}
<?php
	
	namespace Model\Managers;
	
	use App\Manager;
	use App\DAO;
	
	class CategoryManager extends Manager
	{
		
		// on indique la classe POO et la table correspondante en BDD pour le manager concerné
		protected string $className = "Model\Entities\Category";
		protected string $tableName = "category";
		
		public function __construct()
		{
			DAO::connect();
		}
	}
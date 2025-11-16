<?php
	
	namespace Model\Managers;
	
	use App\Manager;
	use App\DAO;
	
	class CategoryManager extends Manager
	{
		
		protected string $className = "Model\Entities\Category";
		protected string $tableName = "category";
		
		public function __construct()
		{
			parent::connect();
		}
		
		public function findOneByTitle($name)
		{
			$sql = "SELECT c.id_category, c.name
                FROM " . $this->tableName . " c
                WHERE c.name = :name";
			
			return $this->getOneOrNullResult(
				DAO::select($sql, ['name' => $name] ),
				$this->className
			);
		}
	}
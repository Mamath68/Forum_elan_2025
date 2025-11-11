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
		
		public function findOneByTitle($title)
		{
			$sql = "SELECT c.id_category, c.title
                FROM " . $this->tableName . " c
                WHERE c.title = :title";
			
			return $this->getOneOrNullResult(
				DAO::select($sql, ['title' => $title] ),
				$this->className
			);
		}
	}
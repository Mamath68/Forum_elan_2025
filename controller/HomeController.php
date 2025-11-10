<?php
	
	namespace Controller;
	
	use App\AbstractController;
	use App\ControllerInterface;
	use Model\Managers\UserManager;
	
	class HomeController extends AbstractController implements ControllerInterface
	{
		
		public function index() : array
		{
			return [
				"view" => VIEW_DIR . "home.php",
				"meta_description" => "Page d'accueil du forum"
			];
		}
		
		public function about() : array
		{
			return [
				"view" => VIEW_DIR . "about.php",
				"meta_description" => "Page d'infos"
			];
		}
		
		public function users() : array
		{
			$this->restrictTo( "ROLE_USER" );
			
			$manager = new UserManager();
			$users = $manager->findAll( ['register_date', 'DESC'] );
			
			return [
				"view" => VIEW_DIR . "security/users.php",
				"meta_description" => "Liste des utilisateurs du forum",
				"data" => [
					"users" => $users
				]
			];
		}
	}

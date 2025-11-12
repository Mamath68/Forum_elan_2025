<?php
	
	/**
	 * Ouvre le namespace Controller
	 */
	
	namespace Controller;
	
	/**
	 * Fait appel à AbstractController
	 */
	
	use AllowDynamicProperties;
	use App\AbstractController;
	
	/**
	 * Fait appel à ControllerInterface
	 */
	
	use App\ControllerInterface;
	
	/**
	 * Fait appel à UserManager
	 */
	
	use Model\Managers\UserManager;
	
	/**
	 * Class HomeController hérite de la classe AbstractController et implémente ControllerInterface.
	 */
	#[AllowDynamicProperties]
	class HomeController extends AbstractController implements ControllerInterface
	{
		
		public function __construct( )
		{
			$this->userManager = new UserManager();
		}
		
		public function index() : array
		{
			return [
				"title" => "Forum",
				"meta_description" => "Page d'accueil du forum",
				"view" => VIEW_DIR . "home.php"
			];
		}
		
		public function users() : array
		{
			$this->restrictTo( "ROLE_ADMIN" );
			return [
				
				"view" => VIEW_DIR . "security/listUsers.php",
				
				"data" => [
					"title" => "Les utilisateurs",
					"meta_description" => "Liste des utilisateurs",
					"users" => $this->userManager->findAll( ["registerDate", "DESC"] )
				
				]
			];
		}
		
		public function detailUser( $id ) : array
		{
			$pseudo = $this->userManager->findOneById( $id );
			$username = $pseudo->getPseudo();
			return [
				"view" => VIEW_DIR . "security/detailUser.php",
				"data" => [
					"user" => $this->userManager->findOneById( $id ),
					"title" => "Profile de $username",
					"meta_description" => "Règles d'usages du forum"
				]
			];
		}
		
		public function forumRules() : array
		{
			
			return [
				"view" => VIEW_DIR . "home/forumRules.php",
				"data" => [
					"title" => "Règles d'usages",
					"meta_description" => "Règles d'usages du forum"
				]
			];
		}
		
		public function forumMentions() : array
		{
			
			return [
				"view" => VIEW_DIR . "home/mentions_legal.php",
				"data" => [
					"title" => "Mention Légales",
					"meta_description" => "Mentions légaleres du forum"
				]
			];
		}
	}
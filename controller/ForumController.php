<?php
	
	/** Ouvre le namespace Controller*/
	
	namespace Controller;
	
	use AllowDynamicProperties;
	
	/**
	 * Fait appel à Session
	 */
	
	use App\Session;
	
	/**
	 * Fait appel à l'AbstractController
	 */
	
	use App\AbstractController;
	
	/**
	 * Fait appel à ControllerInterface
	 */
	
	use App\ControllerInterface;
	
	/**
	 * Fait appel à TopicManager
	 */
	
	use Model\Managers\TopicManager;
	
	/**
	 * Fait appel à PostManager
	 */
	
	use Model\Managers\PostManager;
	
	/**
	 * Fait appel à UserManager
	 */
	
	use Model\Managers\UserManager;
	
	/**
	 * Fait appel à CategoryManager
	 */
	
	use Model\Managers\CategoryManager;
	
	/**
	 * Class ForumController hérite de la classe AbstractController et implémente ControllerInterface.
	 */
	#[AllowDynamicProperties]
	class ForumController extends AbstractController implements ControllerInterface
	{
		/**
		 * @param PostManager     $postManager
		 * @param CategoryManager $categoryManager
		 * @param TopicManager    $topicManager
		 * @param UserManager     $userManager
		 */
		public function __construct( PostManager $postManager, CategoryManager $categoryManager, TopicManager $topicManager, UserManager $userManager )
		{
			$this->postManager = $postManager;
			$this->categoryManager = $categoryManager;
			$this->topicManager = $topicManager;
			$this->userManager = $userManager;
		}
		
		/**
		 * Fonction gerant la list des catégories
		 */
		public function listcategories() : array
		{
			
			return [
				
				"view" => VIEW_DIR . "forum/listcategories.php",
				"data" => [
					"title" => "Les Catégories",
					"meta_description" => "Liste des catégories",
					"categories" => $this->categoryManager->findAll( ["id_category", "ASC"] ),
				]
			];
		}
		
		
		/**
		 * @return array
		 */
		public function addCategory() : array
		{
			if( !empty( $_POST ) ) {
				
				$title = filter_input( INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS );
				
				$category = $this->categoryManager->findOneByTitle( $title );
				
				if( !$category ) {
					$this->categoryManager->add( [
						"title" => $title,
					] );
				}
			}
			return [
				"view" => VIEW_DIR . "forum/listcategories.php",
				"data" => [
					"title" => "Créer une catégorie",
					"meta_description" => "Page de création d'une catégorie",
					"categories" => $this->categoryManager->findAll()
				]
			];
		}
		
		/**
		 * @return array
		 */
		public function addTopic() : array
		{
			$id = $_GET['id'];
			if( !empty( $_POST ) ) {
				
				$title = filter_input( INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS );
				$user = Session::getUser()->getId();
				
				if( $title ) {
					
					(
					!$this->topicManager->add(
						[
							"title" => $title,
							"user_id" => $user,
							"category_id" => $id,
						],
					)
					);
				}
				$this->redirectTo( "forum", "detailCategory" );
			}
			return
				[
					"view" => VIEW_DIR . "forum/addTopics.php",
					"data" =>
						[
							"title" => "Ajouter un Topic",
							"meta_description" => "Page de création d'un topic",
							"category" => $this->categoryManager->findOneById( $id )
						]
				];
		}
		
		/**
		 * @param $id
		 *
		 * @return array
		 */
		public function findTopicByCat( $id ) : array
		{
			
			return [
				"view" => VIEW_DIR . "forum/detailCategory.php",
				"data" => [
					"title" => "Les Topics",
					"meta_description" => "Liste des topics",
					"category" => $this->categoryManager->findOneById( $id ),
					"topics" => $this->topicManager->findTopicsByCat( $id ),
				]
			];
		}
		
		/**
		 * @return array
		 */
		public function addPost() : array
		{
			$id = $_GET['id'];
			if( !empty( $_POST ) ) {
				
				$body = filter_input( INPUT_POST, "body", FILTER_SANITIZE_FULL_SPECIAL_CHARS );
				$user = Session::getUser()->getId();
				
				if( $body ) {
					(
					!$this->postManager->add(
						[
							"body" => $body,
							"user_id" => $user,
							"topic_id" => $id,
						],
					)
					);
				}
			}
			return
				[
					"view" => VIEW_DIR . "forum/detailTopic.php",
					"data" =>
						[
							"title" => "Ajouter un Post",
							"meta_description" => "Page d'ajout d'un post",
							"post" => $this->postManager->findOneById( $id )
						]
				];
		}
		
		/**
		 * @param $id
		 *
		 * @return array
		 */
		public function findPostByTopic( $id ) : array
		{
			
			return [
				"view" => VIEW_DIR . "forum/detailTopic.php",
				"data" => [
					"title" => "Les post",
					"meta_description" => "Liste des posts",
					"topic" => $this->topicManager->findOneById( $id ),
					"posts" => $this->postManager->findPostsByTopic( $id ),
				]
			];
		}
		
		/**
		 * @return array
		 */
		public function viewUser() : array
		{
			
			return [
				"view" => VIEW_DIR . "security/listUsers.php",
				"data" => [
					"title" => "Les Utilisateurs",
					"meta_description" => "Liste des utilisateurs",
					"users" => $this->userManager->findAll( ["id_user", "ASC"] ),
				]
			];
		}
		
	}
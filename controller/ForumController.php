<?php
	
	
	namespace Controller;
	
	use AllowDynamicProperties;
	
	use App\Session;
	
	use App\AbstractController;
	
	use App\ControllerInterface;
	
	use Model\Managers\TopicManager;
	
	use Model\Managers\PostManager;
	
	use Model\Managers\UserManager;
	
	use Model\Managers\CategoryManager;
	
	/**
	 * Class ForumController hérite de la classe AbstractController et implémente ControllerInterface.
	 */
	#[AllowDynamicProperties]
	class ForumController extends AbstractController implements ControllerInterface
	{
		public function __construct(  )
		{
			$this->postManager = new PostManager();
			$this->categoryManager = new CategoryManager();
			$this->topicManager = new TopicManager();
			$this->userManager = new UserManager();
		}
		
		/**
		 * Fonction gerant la list des catégories
		 */
		public function index() : array
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
				
				$title = filter_input( INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS );
				
				$category = $this->categoryManager->findOneByTitle( $title );
				
				if( !$category ) {
					$this->categoryManager->add( [
						"name" => $title,
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
					"view" => VIEW_DIR . "forum/forms/addTopics.php",
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
			$category = $this->categoryManager->findOneById( $id );
			$topic = $this->topicManager->findTopicsByCat( $id );
			
			return [
				"view" => VIEW_DIR . "forum/detailCategory.php",
				"data" => [
					"title" => $category->getName(),
					"meta_description" => "Liste des topics",
					"category" => $category,
					"topics" => $topic,
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
					"view" => VIEW_DIR . "forum/forms/detailTopic.php",
					"data" =>
						[
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
			$topic = $this->topicManager->findOneById( $id );
			$post = $this->postManager->findOneById( $id );
			return [
				"view" => VIEW_DIR . "forum/detailTopic.php",
				"data" => [
					"title" => $topic->getTitle(),
					"meta_description" => "Liste des posts",
					"topic" => $topic,
					"posts" => $post,
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
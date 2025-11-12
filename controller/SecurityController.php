<?php
	
	/**
	 * Ouvre le namespace Controller
	 */
	
	namespace Controller;
	
	/**
	 * Fait appel à Session
	 */
	
	use AllowDynamicProperties;
	use App\Session;
	
	/**
	 * Fait appel à AbstractController
	 */
	
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
	 * Class securityController hérite de la classe AbstractController et implémente ControllerInterface.
	 */
	#[AllowDynamicProperties]
	class SecurityController extends AbstractController implements ControllerInterface
	{
		
		public function __construct()
		{
			$this->userManager = new UserManager();
		}
		
		public function index() : array
		{
			return [
				"view" => VIEW_DIR . "home.php",
				"data" => [
					"title" => "Page d'accueil",
					"meta_description" => "Page d'accueil du Forum"
				],
			];
		}
		
		public function registerForm() : array
		{
			return [
				"view" => VIEW_DIR . "security/register.php",
				"data" => [
					"title" => "Page d'inscription",
					"meta_description" => "Page d'inscription du Forum"
				],
			];
		}
		
		public function register() : array
		{
			
			if( !empty( $_POST ) ) {
				
				$nickname = filter_input( INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS );
				$password = filter_input( INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS );
				$confirmpassword = filter_input( INPUT_POST, "confirmpassword", FILTER_SANITIZE_FULL_SPECIAL_CHARS );
				$email = filter_input( INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL );
				if( $nickname && $password && $email ) {
					if( ( $password == $confirmpassword ) and strlen( $password ) >= 3 ) {
						$user = $this->userManager->findOneByPseudo( $nickname );
						
						if( !$user ) {
							
							$hash = password_hash( $password, PASSWORD_DEFAULT );
							
							if(
								$this->userManager->add( [
									"pseudo" => $nickname,
									"email" => $email,
									"password" => $hash,
									"roleUser" => json_encode( ["ROLE_USER"] ),
								] )
							) {
								return [
									"view" => VIEW_DIR . "security/login.php",
									"data" => [
										"title" => "Page de connexion",
										"meta_description" => "Page de connexion du forum"
									]
								];
							}
						}
					}
				}
			}
			return [
				"view" => VIEW_DIR . "security/register.php",
				"data" => [
					"title" => "Page d'inscription",
					"meta_description" => "Page d'inscription du forum"
				]
			];
		}
		
		public function loginForm() : array
		{
			return [
				"view" => VIEW_DIR . "security/login.php",
				"data" => [
					"title" => "Page de connexion",
					"meta_description" => "page de connexion du forum"
				],
			];
		}
		
		public function login() : ?array
		{
			if( !empty( $_POST ) ) {
				
				$nickname = filter_input( INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS );
				$password = filter_input( INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS );
				
				if( $nickname && $password ) {
					
					$user = $this->userManager->findOneByPseudo( $nickname );
					
					$pass = $user->getPassword();
					
					if( password_verify( $password, $pass ) ) {
						session::setUser( $user );
						
						header( 'Location:index.php?ctrl=security&action=index' );
					} else {
						return [
							"view" => VIEW_DIR . "security/login.php",
							"data" => [
								"title" => "Page de connexion",
								"meta_description" => "Page de connexion du forum"
							],
						];
					}
				}
			}
			return [
				"view" => VIEW_DIR . "security/login.php",
				"data" => [
					"title" => "Page de connexion",
					"meta_description" => "Page de connexion du forum"
				],
			];
		}
		
		public function logout() : void
		{
			unset( $_SESSION['user'] );
			header( 'location: index.php?ctrl=security&action=index' );
		}
	}
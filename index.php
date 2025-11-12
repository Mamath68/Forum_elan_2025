<?php
	
	namespace App;
	
	define( 'DS', DIRECTORY_SEPARATOR );
	/**
	 * Le caractère séparateur de dossier (/ ou \) </br>
	 * meilleure portabilité sur les différents systêmes.
	 */
	define( 'BASE_DIR', dirname( __FILE__ ) . DS );
	/**
	 * Pour se simplifier la vie
	 */
	define( 'VIEW_DIR', BASE_DIR . "view/" );
	/**
	 * Le chemin sous lequel se trouvent les vues
	 */
	define( 'PUBLIC_DIR', "public/" );
	/**
	 * le chemin où se trouvent les fichiers publics (CSS, JS, IMG)
	 */
	define( 'DEFAULT_CTRL', 'Home' );
	/**
	 * Nom du contrôleur par défaut
	 */
	define( 'ADMIN_MAIL', "admin@gmail.com" );
	/**
	 * Mail de l'administrateur
	 */
	
	require( "app/Autoloader.php" );
	
	Autoloader::register();
	
	/**
	 * Et on intègre la classe Session qui prend la main sur les messages en session
	 */
	
	use App\Session as Session;
	
	Session::start();
	
	/**
	 * ---------REQUETE HTTP INTERCEPTEE-----------
	 */
	$ctrlname = DEFAULT_CTRL;
	/**
	 * On prend le controller par défaut </br>
	 * ex : index.php?ctrl=home
	 */
	if( isset( $_GET['ctrl'] ) ) {
		$ctrlname = $_GET['ctrl'];
	}
	/**
	 * On construit le namespace de la classe Controller à appeller
	 */
	$ctrlNS = "controller\\" . ucfirst( $ctrlname ) . "Controller";
	/**
	 * On vérifie que le namespace pointe vers une classe qui existe
	 */
	if( !class_exists( $ctrlNS ) ) {
		/**
		 * Si ce n’est pas le cas, on choisit le namespace du controller par défaut
		 */
		$ctrlNS = "controller\\" . DEFAULT_CTRL . "Controller";
	}
	$ctrl = new $ctrlNS();
	
	$action = "index";
	/**
	 * Action par défaut de n’importe quel contrôleur </br>
	 * si l'action est présente dans l'url ET que la méthode correspondante existe dans le ctrl
	 */
	if( isset( $_GET['action'] ) && method_exists( $ctrl, $_GET['action'] ) ) {
		/**
		 * La méthode à appeller sera celle de l'url
		 */
		$action = $_GET['action'];
	}
	$id = $_GET['id'] ?? null;
	/**
	 * ex : HomeController->users(null)
	 */
	$result = $ctrl->$action( $id );
	
	/**
	 * --------CHARGEMENT PAGE--------
	 */
	if( $action == "ajax" ) {
		/**
		 * Si l'action était ajax </br>
		 * On affiche directement le return du contrôleur (càd la réponse HTTP sera uniquement celle-ci)
		 */
		echo $result;
	} else {
		ob_start();
		
		/**
		 * On récupère les données de la vue </br>
		 *
		 * On prépare le titre et la meta description*/
		$title = $result['data']['title'];
		$meta_description = $result['data']['meta_description'];
		
		/**
		 * On rend la vue
		 */
		include( $result['view'] );
		
		/**
		 * On capture le contenu de la vue
		 */
		$page = ob_get_clean();
		
		/**
		 * On affiche le layout
		 */
		include VIEW_DIR . "layout.php";
		
	}
<?php
	global $result;
	$categories = $result["data"]["categories"];
	
	use App\Session as Session;
	use Components\Basics\Button;
	use Components\Basics\Text;
	use Components\Basics\Tag;
	
	Text::make( "List des Catégories", "h1", ["class" => "text-primary text-center my-2"] );
	
	if( Session::isAdmin() ) :
		include_once( "forms/addCategory.php" );
		
		Tag::open( "div", ["class" => "container text-center my-2"] );
		Tag::open( "div", ["class" => "row"] );
	endif;
	foreach( $categories as $category ):
		
		Tag::open( "div", ["class" => "col-md-3 col-sm-4 col-xs-6 mb-3"] );
		Tag::open( "div", ["class" => "card text-bg-dark mb-3"] );
		Tag::open( "div", ["class" => "card-header"] );
		Text::make( $category->getName(), "h3", ["class" => "card-title"] );
		Tag::close( "div" );
		Tag::open( "div", ["class" => "card-body"] );
		Button::create( [
			"text" => "Voir le Topic",
			"href" => "index.php?ctrl=forum&action=findTopicByCat&id=" . $category->getId(),
			"class" => "btn btn-warning"
		] );
		Tag::close( "div" );
		Tag::close( "div" );
		Tag::close( "div" );
	endforeach;
	Tag::close( "div" );
	Tag::close( "div" );
<?php
	
	global $result;
	$topic = $result["data"]['topic'];
	$posts = $result["data"]['posts'];
	
	use App\Session as Session;
	use Components\Basics\Button;
	use Components\Basics\Text;
	use Components\Basics\Tag;
	
	if( Session::getUser() ) :
		include_once( "forms/addPost.php" );
	endif;
	
	Text::make( $topic->getTitle(), "h1", ["class" => "text-center my-2"] );
	
	Tag::open( "div", ["class" => "container text-center my-2"] );
	if( !empty( $posts ) ) :
		Tag::open( "div", ["class" => "container text-center"] );
		Tag::open( "div", ["class" => "row"] );
		foreach( $posts as $post ) :
			Tag::open( "div", ["class" => "col-md-3 col-sm-4 col-xs-6 mb-3"] );
			Tag::open( "div", ["class" => "card text-bg-dark mb-3"] );
			Tag::open( "div", ["class" => "card-header text-warning"] );
			Text::make( $post->getUser()->getPseudo(), "small" );
			Tag::close( "div" );
			Tag::open( "div", ["class" => "card-body"] );
			Text::make( $post->getBody(), "h5", ["class" => "card-text, fw-bold"] );
			
			Tag::close( "div" );
			Tag::open( "div", ["class" => "card-footer"] );
			
			Button::create( [
				"text" => "Edit",
				"href" => "index.php?ctrl=forum&action=deletPostByTopic&id=" . $post->getId(),
				"class" => "btn btn-success link-light"
			] );
			Button::create( [
				"text" => "Delete",
				"href" => "index.php?ctrl=forum&action=editPostByTopic&id=" . $post->getId(),
				"class" => "btn btn-danger link-light"
			] );
			
			Tag::close( "div" );
			Tag::close( "div" );
			Tag::close( "div" );
		endforeach;
		Tag::close( "div" );
		Tag::close( "div" );
	else :
		Tag::open( "div", ["class" => "text-center"] );
		Text::make( "Il n'y a pas de Post pour ce Topic", "h3" );
		Tag::close( "div" );
	endif;
	Tag::close( "div" );

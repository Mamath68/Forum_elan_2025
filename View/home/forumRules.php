<?php
	
	use Components\Basics\Tag;
	use Components\Basics\Text;
	
	Text::make( "Reglement du Forum", "h1", ["class" => "text-center text-primary text-decoration-underline"] );
	Text::make( "Ces règles sont à respecter en toutes situations et toutes circonstance:", "h2" );
	
	Tag::open( "ol", ["class" => "list-group list-group-numbered"] );
	Tag::open( "li", ["class" => "list-group-item"] );
	Text::make( "Toutes personnes ayant des propos à caractère, injurieux, sexuel, diffamatoire, religieux, politique,
        raciste
        ou violent se verra bannir.", "span" );
	Tag::close( "li" );
	
	Tag::open( "li", ["class" => "list-group-item"] );
	Text::make( "Avant d'utiliser des textes ou images de ce forum, ou avant d'utiliser des textes et images provenant
        d'internet, demandez l'accord de l'auteur.", "span" );
	Tag::close( "li" );
	
	Tag::open( "li", ["class" => "list-group-item"] );
	Text::make( "Les sujets postés, ou les réponses aux sujets doivent être rédigés dans un français lisible et correct, ceci
        est un forum, n'utilisez pas le langage SMS.", "span"); ?><br>
	<?php Text::make( "Il en va de même pour les messages chat, qui sont soumis aux mêmes règles que le forum.", "span" );
	Tag::close( "li" );
	
	Tag::open( "li", ["class" => "list-group-item"] );
	Text::make( "Dans le cas où un membre est inscrit uniquement dans le but de poster ses publicités, ce dernier se verra
        bannis et ses annonces seront effacées.", "span" );
	Tag::close( "li" );
	
	Tag::open( "li", ["class" => "list-group-item"] );
	Text::make( "Afin d'éviter tout problème d'ordre privé, il est déconseillé de laisser ses coordonnées dans les sujets du
        forum.", "span" );
	Tag::close( "li" );
	
	Tag::open( "li", ["class" => "list-group-item"] );
	Text::make( "Toutes personnes ayant des propos à caractère, injurieux, sexuel, diffamatoire, religieux, politique,
        raciste
        ou violent se verra bannir.", "span" );
	Tag::close( "li" );
	
	Tag::open( "li", ["class" => "list-group-item"] );
	Text::make( "Chaque auteur d'un message assume pleinement sa responsabilité et se doit d'être conscient des éventuelles
        conséquences de son message.", "span" );?><br>
<?php
	Text::make( "Il arrive qu'un modérateur ou administrateur n'ai pas le temps d'effacé certains message,", "span" );?><br>
<?php
	Text::make( "De ce fait, le forum ainsi que l'association décline toute responsabilité quand au contenu des messages des users.", "span" );
	Tag::close( "li" );
	
	Tag::open( "li", ["class" => "list-group-item"] );
	Text::make( "Toute promotion ou incitation à la reproduction animale est à proscrire sur ce forum.", "span" );?>
	<br>
<?php Text::make( "Si tel était le cas, ce pourrait être un motif de bannissement et/ou de suppression immédiate de compte.", "span" );
	Tag::close( "li" );
	
	Tag::open( "li", ["class" => "list-group-item"] );
	Text::make( "Veillez à garder les annonces d'animaux en urgence claire et lisible, il en va de la survie de ceux ci.
        Ainsi,
        pas de FLOOD ni de SPAM.", "span" );
	Tag::close( "li" );
	
	Tag::close( "ol" );
	
	Tag::open( "div", ["class" => "text-center"] );
	Text::make( "En cas de problème non résolu grâce au FAQ, veuillez contacter l'administrateur ou les modérateurs du forum." );
	Text::make( "Une inscription signifie automatiquement l'acceptation des termes de ce règlement." );
	Tag::close( "div" );

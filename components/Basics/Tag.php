<?php
	
	namespace components\Basics;
	
	class Tag
	{
		public static function open( string $tag, array $props = [] ) : void
		{
			$allowed = [
				"div", "section", "main", "article",
				"aside", "header", "footer", "nav",
				"table", "thead", "tbody", "tfoot",
				"td","th" ,"tr", "ul", "ol", "li"
			];
			
			if( !in_array( $tag, $allowed ) ) {
				$tag = "div";
			}
			
			$attributes = self::buildAttributes( $props );
			
			echo "<$tag$attributes>";
		}
		
		public static function close( string $tag ) : void
		{
			echo "</$tag>";
		}
		
		private static function buildAttributes( array $props ) : string
		{
			$html = "";
			
			foreach( $props as $key => $value ) {
				$html .= " $key='" . htmlspecialchars( $value ) . "'";
			}
			
			return $html;
		}
	}

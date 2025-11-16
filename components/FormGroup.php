<?php
	
	namespace components;
	
	class FormGroup
	{
		public static function open( string $class = "mb-3" ) : void
		{
			echo "<div class='$class'>";
		}
		
		public static function close() : void
		{
			echo "</div>";
		}
	}

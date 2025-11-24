<?php
	
	namespace Components\Forms;
	
	class FormGroup
	{
		public static function open( string $class = "my-3" ) : void
		{
			echo "<div class='$class'>";
		}
		
		public static function close() : void
		{
			echo "</div>";
		}
	}

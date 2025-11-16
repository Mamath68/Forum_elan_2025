<?php
	
	namespace components;
	
	class Form
	{
		public static function open( array $props = [] ) : void
		{
			$method = $props['method'] ?? 'post';
			$action = $props['action'] ?? '';
			$class = $props['class'] ?? '';
			
			echo "<form method='$method' action='$action' class='$class'>";
		}
		
		public static function close() : void
		{
			echo "</form>";
		}
	}

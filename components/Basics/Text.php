<?php
	
	namespace components\Basics;
	
	class Text
	{
		public static function make(?string $content, string $type = "p", array $props = []): void
		{
			// Sécurisation
			$allowed = ["p", "h1", "h2", "h3", "h4", "h5", "h6", "span", "small", "strong"];
			
			if (!in_array($type, $allowed)) {
				$type = "p"; // fallback
			}
			
			// Génération des attributs HTML dynamiques
			$attributes = "";
			foreach ($props as $key => $value) {
				$attributes .= " $key='" . htmlspecialchars($value) . "'";
			}
			
			echo "<$type$attributes>" . htmlspecialchars($content) . "</$type>";
		}
	}

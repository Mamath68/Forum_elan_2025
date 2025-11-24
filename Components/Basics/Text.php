<?php
	
	namespace Components\Basics;
	
	class Text
	{
		public static function make($content, string $type = "p", array $props = []): void
		{
			echo self::render($content, $type, $props);
		}
		
		public static function render($content, string $type = "p", array $props = []): string
		{
			$allowed = ["p", "h1", "h2", "h3", "h4", "h5", "h6", "span", "small", "strong"];
			
			if (!in_array($type, $allowed, true)) {
				$type = "p";
			}
			
			// Convertir automatiquement en string
			$content = (string) $content;
			
			// Attributs
			$attributes = "";
			foreach ($props as $key => $value) {
				$attributes .= " " . htmlspecialchars($key) . "='" . htmlspecialchars((string)$value) . "'";
			}
			
			return "<$type$attributes>" . $content . "</$type>";
		}
	}

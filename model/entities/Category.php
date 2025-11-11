<?php
	
	namespace Model\Entities;
	
	use App\Entity;
	
	/**
	 * En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c’est-à-dire qu’aucune autre classe ne peut hériter de cette classe. </br>
	 * En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
	 */
	final class Category extends Entity
	{
		
		/**
		 * @var int
		 */
		private int $id;
		/**
		 * @var string
		 */
		private string $name;
		/**
		 * @var bool
		 */
		private bool $closed;
		
		/**
		 * Chaque entité aura le même constructeur grâce à la méthode hydrate (issue d’App\Entity).
		 */
		public function __construct( $data )
		{
			$this->hydrate( $data );
		}
		
		/**
		 * Get the value of id
		 */
		public function getId() : int
		{
			return $this->id;
		}
		
		/**
		 * Set the value of id
		 *
		 * @param $id
		 *
		 * @return  self
		 */
		public function setId( $id ) : Category
		{
			$this->id = $id;
			
			return $this;
		}
		
		/**
		 * Get the value of name
		 */
		public function getName() : string
		{
			return $this->name;
		}
		
		/**
		 * Set the value of name
		 *
		 * @param $name
		 *
		 * @return  self
		 */
		public function setName( $name ) : Category
		{
			$this->name = $name;
			return $this;
		}
		
		/**
		 * @return bool
		 */
		public function getClosed() : bool
		{
			return $this->closed;
		}
		
		/**
		 * @param $closed
		 *
		 * @return $this
		 */
		public function setClosed( $closed ) : Category
		{
			$this->closed = $closed;
			return $this;
		}
		
		/**
		 * @return string
		 */
		public function __toString()
		{
			return $this->name;
		}
	}
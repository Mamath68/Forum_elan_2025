<?php
	
	namespace Model\Entities;
	
	use App\Entity;
	use DateTime;
	
	/**
	 * En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c’est-à-dire qu’aucune autre classe ne peut hériter de cette classe. </br>
	 * En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
	 */
	final class Topic extends Entity
	{
		
		private int $id;
		private string $title;
		private User $user;
		private Category $category;
		private DateTime $creationDate;
		private bool $closed;
		
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
		public function setId( $id ) : Topic
		{
			$this->id = $id;
			return $this;
		}
		
		/**
		 * Get the value of title
		 */
		public function getTitle() : string
		{
			return $this->title;
		}
		
		/**
		 * Set the value of title
		 *
		 * @param $title
		 *
		 * @return  self
		 */
		public function setTitle( $title ) : Topic
		{
			$this->title = $title;
			return $this;
		}
		
		/**
		 * Get the value of user
		 */
		public function getUser() : User
		{
			return $this->user;
		}
		
		/**
		 * Set the value of user
		 *
		 * @param $user
		 *
		 * @return  self
		 */
		public function setUser( $user ) : Topic
		{
			$this->user = $user;
			return $this;
		}
		
		public function __toString()
		{
			return $this->title;
		}
	}
<?php
	
	namespace Model\Entities;
	
	use App\Entity;
	use DateTime;
	use DateMalformedStringException;
	
	/**
	 * En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c’est-à-dire qu’aucune autre classe ne peut hériter de cette classe. </br>
	 * En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
	 */
	final class Post extends Entity
	{

		private int $id;
		private string $body;
		private DateTime $creationDate;
		private Topic $topic;
		private User $user;
		
		/**
		 * @param $data
		 */
		public function __construct( $data )
		{
			$this->hydrate( $data );
		}
		
		/**
		 * @return int
		 */
		public function getId() : int
		{
			return $this->id;
		}
		
		/**
		 * @param $id
		 *
		 * @return $this
		 */
		public function setId( $id ) : Post
		{
			$this->id = $id;
			
			return $this;
		}
		
		/**
		 * @return string
		 */
		public function getBody() : string
		{
			return $this->body;
		}
		
		/**
		 * @param $body
		 *
		 * @return Post
		 */
		public function setBody( $body ) : Post
		{
			$this->body = $body;
			
			return $this;
		}
		
		/**
		 * @return string
		 */
		public function getCreationDate() : string
		{
			return $this->creationdate->format( "d/m/Y à H:i" );
		}
		
		/**
		 * @throws DateMalformedStringException | DateTime
		 */
		public function setCreationDate( $date ) : DateTime
		{
			return $this->creationdate = new DateTime( $date );
			
		}
		
		/**
		 * @return Topic
		 */
		public function getTopic() : Topic
		{
			return $this->topic;
		}
		
		/**
		 * @param $topic
		 *
		 * @return Post
		 */
		public function setTopic( $topic ) : Post
		{
			$this->topic = $topic;
			return $this;
		}
		
		/**
		 * @return User
		 */
		public function getUser() : User
		{
			return $this->user;
		}
		
		/**
		 * @param $user
		 *
		 * @return Post
		 */
		public function setUser( $user ) : Post
		{
			$this->user = $user;
			return $this;
		}
		
		public function __toString() : string
		{
			return $this->body;
		}
	}
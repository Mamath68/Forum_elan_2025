<?php
	
	namespace Model\Entities;
	
	use App\Entity;
	use DateTime;
	use DateMalformedStringException;
	
	/**
	 * En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c’est-à-dire qu’aucune autre classe ne peut hériter de cette classe. </br>
	 * En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
	 */
	final class User extends Entity
	{
		/**
		 * @var int
		 */
		private int $id;
		/**
		 * @var string
		 */
		private string $pseudo;
		/**
		 * @var string
		 */
		private string $email;
		/**
		 * @var string
		 */
		private string $password;
		/**
		 * @var \DateTime
		 */
		private DateTime $registerDate;
		/**
		 * @var array
		 */
		private array $role;
		
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
		public function setId( $id ) : User
		{
			$this->id = $id;
			return $this;
		}
		
		/**
		 * @return string
		 */
		public function getPseudo() : string
		{
			return $this->pseudo;
		}
		
		/**
		 * @param $pseudo
		 *
		 * @return $this
		 */
		public function setPseudo( $pseudo ) : User
		{
			$this->pseudo = ucfirst( $pseudo );
			return $this;
		}
		
		/**
		 * @return string
		 */
		public function getEmail() : string
		{
			return $this->email;
		}
		
		/**
		 * @param $email
		 *
		 * @return $this
		 */
		public function setEmail( $email ) : User
		{
			$this->email = $email;
			return $this;
		}
		
		/**
		 * @return string
		 */
		public function getPassword() : string
		{
			return $this->password;
		}
		
		/**
		 * @param $password
		 *
		 * @return $this
		 */
		public function setPassword( $password ) : User
		{
			$this->password = $password;
			return $this;
		}
		
		/**
		 * @return string
		 */
		public function getRegisterDate() : string
		{
			return $this->registerDate->format( "d/m/Y à H:i" );
		}
		
		/**
		 * @throws DateMalformedStringException
		 */
		public function setRegisterDate( $date ) : User
		{
			$this->registerDate = new DateTime( $date );
			return $this;
		}
		
		/**
		 * @return array
		 */
		public function getRole() : array
		{
			if( !empty( $this->role ) ) {
				return $this->role;
			} else
				return [];
		}
		
		/**
		 * @param $role
		 *
		 * @return void
		 */
		public function setRole( $role ) : void
		{
			
			$this->role = json_decode( $role );
			if( !empty( $this->role ) ) {
				$this->role[] = "ROLE_USER";
			}
		}
		
		/**
		 * @param $role
		 *
		 * @return bool
		 */
		public function hasRole( $role ) : bool
		{
			if( $role ) {
				return in_array( $role, $this->getRole() );
			} else
				return false;
		}
		
		/**
		 * @return string
		 */
		public function __toString()
		{
			return $this->getId() . " " . $this->getPseudo();
		}
	}
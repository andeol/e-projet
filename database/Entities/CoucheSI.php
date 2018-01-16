  <?php

class CoucheSI{

	// Properties

	private $id;

	private $libelle;

	// Functions

	// Builder
	function __construct($id, $libelle){
		$this->id = $id;
		$this->libelle = $libelle;
	}

	// Getters
	function getId(){
		return $this->id;
	}

	function getLibelle(){
		return $this->libelle;
	}

	// Setters
	function setId($id)
	{
		$this->id = $id;
	}

	function setLibelle($libelle)
	{
		$this->libelle = $libelle;
	}
}

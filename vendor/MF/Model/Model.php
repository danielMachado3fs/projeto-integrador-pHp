<?php


namespace MF\Model;

abstract class Model {

	protected $db;
	// protected $table;

	public function __construct(\PDO $db) {
		$this->db = $db;
	}
}


?>
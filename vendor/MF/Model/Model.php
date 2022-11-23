<?php


namespace MF\Model;

abstract class Model {

	protected $db;
	// protected $table;

	public function __construct(\PDO $db) {
		$this->db = $db;
	}

	public function getAll(){
        $sql = "SELECT * FROM $this->table WHERE deleted = 0";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getOne($id){
        $sql = "SELECT * FROM $this->table WHERE deleted = 0 AND id = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function delete($id){
        $sql = "UPDATE $this->table SET deleted = 1 WHERE id = $id";
        $stmt = $this->db->prepare($sql);
        if($stmt->execute() && $id){
            return true;
        }
        return $stmt->errorInfo();
    }
}


?>
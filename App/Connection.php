<?php

namespace App;

class Connection {
	private static $connection = null;

	private function getDb() {
		try {

			$conn = new \PDO(
				"mysql:host=localhost;dbname=scf_db;charset=utf8",
				"root",
				"" 
			);

			return $conn;

		} catch (\PDOException $e) {
			var_dump('Error database: ' . $e->getMessage());
		}
	}

	public static function getInstance(): \PDO
    {
        if (!isset(self::$connection)) {
            self::$connection = self::getDb();
        }

        return self::$connection;
    }
}

?>
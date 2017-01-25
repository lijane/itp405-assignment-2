<?php

namespace Database\Query;

require './Database.php';

class DvdQuery extends \Database {

	private $sql;
	public $search;

	public function titleContains($search){
		$this->search = $search;
		$this->sql ="
		SELECT dvds.id, title, rating_name
		FROM dvds
		INNER JOIN ratings ON dvds.rating_id = ratings.id
		WHERE title LIKE ? ";
	}

	public function orderByTitle(){
		$this->sql = $this->sql."ORDER BY title";
	}

	public function find(){

		// echo $this->sql;

		$like = '%' .$this->search. '%';
		$statement = self::$pdo->prepare($this->sql);
		$statement->bindParam(1, $like);
		$statement->execute();
		$dvds = $statement->fetchAll(\PDO::FETCH_OBJ);

		return $dvds;
	}
}
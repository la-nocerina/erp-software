<?php
/**
 * Class that operate on table 'controlli_fase'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class ControlliFaseMySqlDAO implements ControlliFaseDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ControlliFaseMySql 
	 */
	public function load($idFase, $ora){
		$sql = 'SELECT * FROM controlli_fase WHERE id_fase = ?  AND ora = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idFase);
		$sqlQuery->setNumber($ora);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM controlli_fase';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM controlli_fase ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param controlliFase primary key
 	 */
	public function delete($idFase, $ora){
		$sql = 'DELETE FROM controlli_fase WHERE id_fase = ?  AND ora = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idFase);
		$sqlQuery->setNumber($ora);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ControlliFaseMySql controlliFase
 	 */
	public function insert($controlliFase){
		$sql = 'INSERT INTO controlli_fase (c1, c2, c3, c4, c5, c6, c7, c8, c9, c10, c11, c12, c13, c14, c15, c16, id_fase, ora) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($controlliFase->c1);
		$sqlQuery->set($controlliFase->c2);
		$sqlQuery->set($controlliFase->c3);
		$sqlQuery->set($controlliFase->c4);
		$sqlQuery->set($controlliFase->c5);
		$sqlQuery->set($controlliFase->c6);
		$sqlQuery->set($controlliFase->c7);
		$sqlQuery->set($controlliFase->c8);
		$sqlQuery->set($controlliFase->c9);
		$sqlQuery->set($controlliFase->c10);
		$sqlQuery->set($controlliFase->c11);
		$sqlQuery->set($controlliFase->c12);
		$sqlQuery->set($controlliFase->c13);
		$sqlQuery->set($controlliFase->c14);
		$sqlQuery->set($controlliFase->c15);
		$sqlQuery->set($controlliFase->c16);

		
		$sqlQuery->setNumber($controlliFase->idFase);

		$sqlQuery->setNumber($controlliFase->ora);

		$this->executeInsert($sqlQuery);	
		//$controlliFase->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ControlliFaseMySql controlliFase
 	 */
	public function update($controlliFase){
		$sql = 'UPDATE controlli_fase SET c1 = ?, c2 = ?, c3 = ?, c4 = ?, c5 = ?, c6 = ?, c7 = ?, c8 = ?, c9 = ?, c10 = ?, c11 = ?, c12 = ?, c13 = ?, c14 = ?, c15 = ?, c16 = ? WHERE id_fase = ?  AND ora = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($controlliFase->c1);
		$sqlQuery->set($controlliFase->c2);
		$sqlQuery->set($controlliFase->c3);
		$sqlQuery->set($controlliFase->c4);
		$sqlQuery->set($controlliFase->c5);
		$sqlQuery->set($controlliFase->c6);
		$sqlQuery->set($controlliFase->c7);
		$sqlQuery->set($controlliFase->c8);
		$sqlQuery->set($controlliFase->c9);
		$sqlQuery->set($controlliFase->c10);
		$sqlQuery->set($controlliFase->c11);
		$sqlQuery->set($controlliFase->c12);
		$sqlQuery->set($controlliFase->c13);
		$sqlQuery->set($controlliFase->c14);
		$sqlQuery->set($controlliFase->c15);
		$sqlQuery->set($controlliFase->c16);

		
		$sqlQuery->setNumber($controlliFase->idFase);

		$sqlQuery->setNumber($controlliFase->ora);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM controlli_fase';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByC1($value){
		$sql = 'SELECT * FROM controlli_fase WHERE c1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC2($value){
		$sql = 'SELECT * FROM controlli_fase WHERE c2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC3($value){
		$sql = 'SELECT * FROM controlli_fase WHERE c3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC4($value){
		$sql = 'SELECT * FROM controlli_fase WHERE c4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC5($value){
		$sql = 'SELECT * FROM controlli_fase WHERE c5 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC6($value){
		$sql = 'SELECT * FROM controlli_fase WHERE c6 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC7($value){
		$sql = 'SELECT * FROM controlli_fase WHERE c7 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC8($value){
		$sql = 'SELECT * FROM controlli_fase WHERE c8 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC9($value){
		$sql = 'SELECT * FROM controlli_fase WHERE c9 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC10($value){
		$sql = 'SELECT * FROM controlli_fase WHERE c10 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC11($value){
		$sql = 'SELECT * FROM controlli_fase WHERE c11 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC12($value){
		$sql = 'SELECT * FROM controlli_fase WHERE c12 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC13($value){
		$sql = 'SELECT * FROM controlli_fase WHERE c13 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC14($value){
		$sql = 'SELECT * FROM controlli_fase WHERE c14 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC15($value){
		$sql = 'SELECT * FROM controlli_fase WHERE c15 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC16($value){
		$sql = 'SELECT * FROM controlli_fase WHERE c16 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByC1($value){
		$sql = 'DELETE FROM controlli_fase WHERE c1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC2($value){
		$sql = 'DELETE FROM controlli_fase WHERE c2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC3($value){
		$sql = 'DELETE FROM controlli_fase WHERE c3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC4($value){
		$sql = 'DELETE FROM controlli_fase WHERE c4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC5($value){
		$sql = 'DELETE FROM controlli_fase WHERE c5 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC6($value){
		$sql = 'DELETE FROM controlli_fase WHERE c6 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC7($value){
		$sql = 'DELETE FROM controlli_fase WHERE c7 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC8($value){
		$sql = 'DELETE FROM controlli_fase WHERE c8 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC9($value){
		$sql = 'DELETE FROM controlli_fase WHERE c9 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC10($value){
		$sql = 'DELETE FROM controlli_fase WHERE c10 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC11($value){
		$sql = 'DELETE FROM controlli_fase WHERE c11 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC12($value){
		$sql = 'DELETE FROM controlli_fase WHERE c12 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC13($value){
		$sql = 'DELETE FROM controlli_fase WHERE c13 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC14($value){
		$sql = 'DELETE FROM controlli_fase WHERE c14 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC15($value){
		$sql = 'DELETE FROM controlli_fase WHERE c15 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC16($value){
		$sql = 'DELETE FROM controlli_fase WHERE c16 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ControlliFaseMySql 
	 */
	protected function readRow($row){
		$controlliFase = new ControlliFase();
		
		$controlliFase->idFase = $row['id_fase'];
		$controlliFase->ora = $row['ora'];
		$controlliFase->c1 = $row['c1'];
		$controlliFase->c2 = $row['c2'];
		$controlliFase->c3 = $row['c3'];
		$controlliFase->c4 = $row['c4'];
		$controlliFase->c5 = $row['c5'];
		$controlliFase->c6 = $row['c6'];
		$controlliFase->c7 = $row['c7'];
		$controlliFase->c8 = $row['c8'];
		$controlliFase->c9 = $row['c9'];
		$controlliFase->c10 = $row['c10'];
		$controlliFase->c11 = $row['c11'];
		$controlliFase->c12 = $row['c12'];
		$controlliFase->c13 = $row['c13'];
		$controlliFase->c14 = $row['c14'];
		$controlliFase->c15 = $row['c15'];
		$controlliFase->c16 = $row['c16'];

		return $controlliFase;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return ControlliFaseMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>
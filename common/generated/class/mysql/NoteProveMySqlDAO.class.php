<?php
/**
 * Class that operate on table 'note_prove'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class NoteProveMySqlDAO implements NoteProveDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return NoteProveMySql 
	 */
	public function load($idSchedaProve, $linea){
		$sql = 'SELECT * FROM note_prove WHERE id_scheda_prove = ?  AND linea = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idSchedaProve);
		$sqlQuery->setNumber($linea);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM note_prove';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM note_prove ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param noteProve primary key
 	 */
	public function delete($idSchedaProve, $linea){
		$sql = 'DELETE FROM note_prove WHERE id_scheda_prove = ?  AND linea = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idSchedaProve);
		$sqlQuery->setNumber($linea);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param NoteProveMySql noteProve
 	 */
	public function insert($noteProve){
		$sql = 'INSERT INTO note_prove (n1, n2, n3, n4, n5, n6, n7, n8, n9, n10, n11, id_scheda_prove, linea) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($noteProve->n1);
		$sqlQuery->set($noteProve->n2);
		$sqlQuery->set($noteProve->n3);
		$sqlQuery->set($noteProve->n4);
		$sqlQuery->set($noteProve->n5);
		$sqlQuery->set($noteProve->n6);
		$sqlQuery->set($noteProve->n7);
		$sqlQuery->set($noteProve->n8);
		$sqlQuery->set($noteProve->n9);
		$sqlQuery->set($noteProve->n10);
		$sqlQuery->set($noteProve->n11);

		
		$sqlQuery->setNumber($noteProve->idSchedaProve);

		$sqlQuery->setNumber($noteProve->linea);

		$this->executeInsert($sqlQuery);	
		//$noteProve->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param NoteProveMySql noteProve
 	 */
	public function update($noteProve){
		$sql = 'UPDATE note_prove SET n1 = ?, n2 = ?, n3 = ?, n4 = ?, n5 = ?, n6 = ?, n7 = ?, n8 = ?, n9 = ?, n10 = ?, n11 = ? WHERE id_scheda_prove = ?  AND linea = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($noteProve->n1);
		$sqlQuery->set($noteProve->n2);
		$sqlQuery->set($noteProve->n3);
		$sqlQuery->set($noteProve->n4);
		$sqlQuery->set($noteProve->n5);
		$sqlQuery->set($noteProve->n6);
		$sqlQuery->set($noteProve->n7);
		$sqlQuery->set($noteProve->n8);
		$sqlQuery->set($noteProve->n9);
		$sqlQuery->set($noteProve->n10);
		$sqlQuery->set($noteProve->n11);

		
		$sqlQuery->setNumber($noteProve->idSchedaProve);

		$sqlQuery->setNumber($noteProve->linea);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM note_prove';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByN1($value){
		$sql = 'SELECT * FROM note_prove WHERE n1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByN2($value){
		$sql = 'SELECT * FROM note_prove WHERE n2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByN3($value){
		$sql = 'SELECT * FROM note_prove WHERE n3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByN4($value){
		$sql = 'SELECT * FROM note_prove WHERE n4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByN5($value){
		$sql = 'SELECT * FROM note_prove WHERE n5 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByN6($value){
		$sql = 'SELECT * FROM note_prove WHERE n6 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByN7($value){
		$sql = 'SELECT * FROM note_prove WHERE n7 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByN8($value){
		$sql = 'SELECT * FROM note_prove WHERE n8 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByN9($value){
		$sql = 'SELECT * FROM note_prove WHERE n9 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByN10($value){
		$sql = 'SELECT * FROM note_prove WHERE n10 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByN11($value){
		$sql = 'SELECT * FROM note_prove WHERE n11 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByN1($value){
		$sql = 'DELETE FROM note_prove WHERE n1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByN2($value){
		$sql = 'DELETE FROM note_prove WHERE n2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByN3($value){
		$sql = 'DELETE FROM note_prove WHERE n3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByN4($value){
		$sql = 'DELETE FROM note_prove WHERE n4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByN5($value){
		$sql = 'DELETE FROM note_prove WHERE n5 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByN6($value){
		$sql = 'DELETE FROM note_prove WHERE n6 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByN7($value){
		$sql = 'DELETE FROM note_prove WHERE n7 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByN8($value){
		$sql = 'DELETE FROM note_prove WHERE n8 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByN9($value){
		$sql = 'DELETE FROM note_prove WHERE n9 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByN10($value){
		$sql = 'DELETE FROM note_prove WHERE n10 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByN11($value){
		$sql = 'DELETE FROM note_prove WHERE n11 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return NoteProveMySql 
	 */
	protected function readRow($row){
		$noteProve = new NoteProve();
		
		$noteProve->idSchedaProve = $row['id_scheda_prove'];
		$noteProve->linea = $row['linea'];
		$noteProve->n1 = $row['n1'];
		$noteProve->n2 = $row['n2'];
		$noteProve->n3 = $row['n3'];
		$noteProve->n4 = $row['n4'];
		$noteProve->n5 = $row['n5'];
		$noteProve->n6 = $row['n6'];
		$noteProve->n7 = $row['n7'];
		$noteProve->n8 = $row['n8'];
		$noteProve->n9 = $row['n9'];
		$noteProve->n10 = $row['n10'];
		$noteProve->n11 = $row['n11'];

		return $noteProve;
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
	 * @return NoteProveMySql 
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
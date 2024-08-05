<?php
/**
 * Class that operate on table 'magazzini'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class MagazziniMySqlDAO implements MagazziniDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MagazziniMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM magazzini WHERE id_magazzino = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM magazzini';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM magazzini ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param magazzini primary key
 	 */
	public function delete($id_magazzino){
		$sql = 'DELETE FROM magazzini WHERE id_magazzino = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_magazzino);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MagazziniMySql magazzini
 	 */
	public function insert($magazzini){
		$sql = 'INSERT INTO magazzini (descrizione) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($magazzini->descrizione);

		$id = $this->executeInsert($sqlQuery);	
		$magazzini->idMagazzino = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MagazziniMySql magazzini
 	 */
	public function update($magazzini){
		$sql = 'UPDATE magazzini SET descrizione = ? WHERE id_magazzino = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($magazzini->descrizione);

		$sqlQuery->setNumber($magazzini->idMagazzino);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM magazzini';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescrizione($value){
		$sql = 'SELECT * FROM magazzini WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescrizione($value){
		$sql = 'DELETE FROM magazzini WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MagazziniMySql 
	 */
	protected function readRow($row){
		$magazzini = new Magazzini();
		
		$magazzini->idMagazzino = $row['id_magazzino'];
		$magazzini->descrizione = $row['descrizione'];

		return $magazzini;
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
	 * @return MagazziniMySql 
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
<?php
/**
 * Class that operate on table 'macchinari'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class MacchinariMySqlDAO implements MacchinariDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MacchinariMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM macchinari WHERE id_macchinario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM macchinari';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM macchinari ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param macchinari primary key
 	 */
	public function delete($id_macchinario){
		$sql = 'DELETE FROM macchinari WHERE id_macchinario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_macchinario);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MacchinariMySql macchinari
 	 */
	public function insert($macchinari){
		$sql = 'INSERT INTO macchinari (descrizione) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($macchinari->descrizione);

		$id = $this->executeInsert($sqlQuery);	
		$macchinari->idMacchinario = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MacchinariMySql macchinari
 	 */
	public function update($macchinari){
		$sql = 'UPDATE macchinari SET descrizione = ? WHERE id_macchinario = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($macchinari->descrizione);

		$sqlQuery->setNumber($macchinari->idMacchinario);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM macchinari';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescrizione($value){
		$sql = 'SELECT * FROM macchinari WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescrizione($value){
		$sql = 'DELETE FROM macchinari WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MacchinariMySql 
	 */
	protected function readRow($row){
		$macchinari = new Macchinari();
		
		$macchinari->idMacchinario = $row['id_macchinario'];
		$macchinari->descrizione = $row['descrizione'];

		return $macchinari;
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
	 * @return MacchinariMySql 
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
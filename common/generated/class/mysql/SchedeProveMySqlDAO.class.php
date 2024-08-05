<?php
/**
 * Class that operate on table 'schede_prove'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class SchedeProveMySqlDAO implements SchedeProveDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return SchedeProveMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM schede_prove WHERE id_scheda_prove = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM schede_prove';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM schede_prove ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param schedeProve primary key
 	 */
	public function delete($id_scheda_prove){
		$sql = 'DELETE FROM schede_prove WHERE id_scheda_prove = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_scheda_prove);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param SchedeProveMySql schedeProve
 	 */
	public function insert($schedeProve){
		$sql = 'INSERT INTO schede_prove (data, r_laboratorio, note) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($schedeProve->data);
		$sqlQuery->set($schedeProve->rLaboratorio);
		$sqlQuery->set($schedeProve->note);

		$id = $this->executeInsert($sqlQuery);	
		$schedeProve->idSchedaProve = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param SchedeProveMySql schedeProve
 	 */
	public function update($schedeProve){
		$sql = 'UPDATE schede_prove SET data = ?, r_laboratorio = ?, note = ? WHERE id_scheda_prove = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($schedeProve->data);
		$sqlQuery->set($schedeProve->rLaboratorio);
		$sqlQuery->set($schedeProve->note);

		$sqlQuery->setNumber($schedeProve->idSchedaProve);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM schede_prove';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM schede_prove WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRLaboratorio($value){
		$sql = 'SELECT * FROM schede_prove WHERE r_laboratorio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM schede_prove WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByData($value){
		$sql = 'DELETE FROM schede_prove WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRLaboratorio($value){
		$sql = 'DELETE FROM schede_prove WHERE r_laboratorio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM schede_prove WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return SchedeProveMySql 
	 */
	protected function readRow($row){
		$schedeProve = new SchedeProve();
		
		$schedeProve->idSchedaProve = $row['id_scheda_prove'];
		$schedeProve->data = $row['data'];
		$schedeProve->rLaboratorio = $row['r_laboratorio'];
		$schedeProve->note = $row['note'];

		return $schedeProve;
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
	 * @return SchedeProveMySql 
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
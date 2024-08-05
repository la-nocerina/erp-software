<?php
/**
 * Class that operate on table 'cause_fermate'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class CauseFermateMySqlDAO implements CauseFermateDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CauseFermateMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cause_fermate WHERE id_causa_fermata = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cause_fermate';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cause_fermate ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param causeFermate primary key
 	 */
	public function delete($id_causa_fermata){
		$sql = 'DELETE FROM cause_fermate WHERE id_causa_fermata = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_causa_fermata);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CauseFermateMySql causeFermate
 	 */
	public function insert($causeFermate){
		$sql = 'INSERT INTO cause_fermate (id_fermate_guasti, num_causa, da_ora, a_ora) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($causeFermate->idFermateGuasti);
		$sqlQuery->setNumber($causeFermate->numCausa);
		$sqlQuery->set($causeFermate->daOra);
		$sqlQuery->set($causeFermate->aOra);

		$id = $this->executeInsert($sqlQuery);	
		$causeFermate->idCausaFermata = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CauseFermateMySql causeFermate
 	 */
	public function update($causeFermate){
		$sql = 'UPDATE cause_fermate SET id_fermate_guasti = ?, num_causa = ?, da_ora = ?, a_ora = ? WHERE id_causa_fermata = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($causeFermate->idFermateGuasti);
		$sqlQuery->setNumber($causeFermate->numCausa);
		$sqlQuery->set($causeFermate->daOra);
		$sqlQuery->set($causeFermate->aOra);

		$sqlQuery->setNumber($causeFermate->idCausaFermata);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cause_fermate';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdFermateGuasti($value){
		$sql = 'SELECT * FROM cause_fermate WHERE id_fermate_guasti = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumCausa($value){
		$sql = 'SELECT * FROM cause_fermate WHERE num_causa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDaOra($value){
		$sql = 'SELECT * FROM cause_fermate WHERE da_ora = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAOra($value){
		$sql = 'SELECT * FROM cause_fermate WHERE a_ora = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdFermateGuasti($value){
		$sql = 'DELETE FROM cause_fermate WHERE id_fermate_guasti = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumCausa($value){
		$sql = 'DELETE FROM cause_fermate WHERE num_causa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDaOra($value){
		$sql = 'DELETE FROM cause_fermate WHERE da_ora = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAOra($value){
		$sql = 'DELETE FROM cause_fermate WHERE a_ora = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CauseFermateMySql 
	 */
	protected function readRow($row){
		$causeFermate = new CauseFermate();
		
		$causeFermate->idCausaFermata = $row['id_causa_fermata'];
		$causeFermate->idFermateGuasti = $row['id_fermate_guasti'];
		$causeFermate->numCausa = $row['num_causa'];
		$causeFermate->daOra = $row['da_ora'];
		$causeFermate->aOra = $row['a_ora'];

		return $causeFermate;
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
	 * @return CauseFermateMySql 
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
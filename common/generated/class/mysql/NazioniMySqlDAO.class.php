<?php
/**
 * Class that operate on table 'nazioni'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class NazioniMySqlDAO implements NazioniDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return NazioniMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM nazioni WHERE id_nazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM nazioni';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM nazioni ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param nazioni primary key
 	 */
	public function delete($id_nazione){
		$sql = 'DELETE FROM nazioni WHERE id_nazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_nazione);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param NazioniMySql nazioni
 	 */
	public function insert($nazioni){
		$sql = 'INSERT INTO nazioni (nome_nazione) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($nazioni->nomeNazione);

		$id = $this->executeInsert($sqlQuery);	
		$nazioni->idNazione = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param NazioniMySql nazioni
 	 */
	public function update($nazioni){
		$sql = 'UPDATE nazioni SET nome_nazione = ? WHERE id_nazione = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($nazioni->nomeNazione);

		$sqlQuery->setNumber($nazioni->idNazione);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM nazioni';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNomeNazione($value){
		$sql = 'SELECT * FROM nazioni WHERE nome_nazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNomeNazione($value){
		$sql = 'DELETE FROM nazioni WHERE nome_nazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return NazioniMySql 
	 */
	protected function readRow($row){
		$nazioni = new Nazioni();
		
		$nazioni->idNazione = $row['id_nazione'];
		$nazioni->nomeNazione = $row['nome_nazione'];

		return $nazioni;
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
	 * @return NazioniMySql 
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
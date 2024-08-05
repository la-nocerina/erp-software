<?php
/**
 * Class that operate on table 'unita_misura'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class UnitaMisuraMySqlDAO implements UnitaMisuraDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UnitaMisuraMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM unita_misura WHERE id_unita_misura = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM unita_misura';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM unita_misura ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param unitaMisura primary key
 	 */
	public function delete($id_unita_misura){
		$sql = 'DELETE FROM unita_misura WHERE id_unita_misura = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_unita_misura);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UnitaMisuraMySql unitaMisura
 	 */
	public function insert($unitaMisura){
		$sql = 'INSERT INTO unita_misura (descrizione_um) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($unitaMisura->descrizioneUm);

		$id = $this->executeInsert($sqlQuery);	
		$unitaMisura->idUnitaMisura = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UnitaMisuraMySql unitaMisura
 	 */
	public function update($unitaMisura){
		$sql = 'UPDATE unita_misura SET descrizione_um = ? WHERE id_unita_misura = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($unitaMisura->descrizioneUm);

		$sqlQuery->setNumber($unitaMisura->idUnitaMisura);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM unita_misura';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescrizioneUm($value){
		$sql = 'SELECT * FROM unita_misura WHERE descrizione_um = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescrizioneUm($value){
		$sql = 'DELETE FROM unita_misura WHERE descrizione_um = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UnitaMisuraMySql 
	 */
	protected function readRow($row){
		$unitaMisura = new UnitaMisura();
		
		$unitaMisura->idUnitaMisura = $row['id_unita_misura'];
		$unitaMisura->descrizioneUm = $row['descrizione_um'];

		return $unitaMisura;
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
	 * @return UnitaMisuraMySql 
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
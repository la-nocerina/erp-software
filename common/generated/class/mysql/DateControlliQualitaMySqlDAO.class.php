<?php
/**
 * Class that operate on table 'date_controlli_qualita'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class DateControlliQualitaMySqlDAO implements DateControlliQualitaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DateControlliQualitaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM date_controlli_qualita WHERE id_date_controlli_qualita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM date_controlli_qualita';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM date_controlli_qualita ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param dateControlliQualita primary key
 	 */
	public function delete($id_date_controlli_qualita){
		$sql = 'DELETE FROM date_controlli_qualita WHERE id_date_controlli_qualita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_date_controlli_qualita);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DateControlliQualitaMySql dateControlliQualita
 	 */
	public function insert($dateControlliQualita){
		$sql = 'INSERT INTO date_controlli_qualita (id_controlli_qualita, data) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($dateControlliQualita->idControlliQualita);
		$sqlQuery->set($dateControlliQualita->data);

		$id = $this->executeInsert($sqlQuery);	
		$dateControlliQualita->idDateControlliQualita = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DateControlliQualitaMySql dateControlliQualita
 	 */
	public function update($dateControlliQualita){
		$sql = 'UPDATE date_controlli_qualita SET id_controlli_qualita = ?, data = ? WHERE id_date_controlli_qualita = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($dateControlliQualita->idControlliQualita);
		$sqlQuery->set($dateControlliQualita->data);

		$sqlQuery->setNumber($dateControlliQualita->idDateControlliQualita);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM date_controlli_qualita';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdControlliQualita($value){
		$sql = 'SELECT * FROM date_controlli_qualita WHERE id_controlli_qualita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM date_controlli_qualita WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdControlliQualita($value){
		$sql = 'DELETE FROM date_controlli_qualita WHERE id_controlli_qualita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM date_controlli_qualita WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DateControlliQualitaMySql 
	 */
	protected function readRow($row){
		$dateControlliQualita = new DateControlliQualita();
		
		$dateControlliQualita->idDateControlliQualita = $row['id_date_controlli_qualita'];
		$dateControlliQualita->idControlliQualita = $row['id_controlli_qualita'];
		$dateControlliQualita->data = $row['data'];

		return $dateControlliQualita;
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
	 * @return DateControlliQualitaMySql 
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
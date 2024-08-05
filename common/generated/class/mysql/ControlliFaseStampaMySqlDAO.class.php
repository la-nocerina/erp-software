<?php
/**
 * Class that operate on table 'controlli_fase_stampa'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class ControlliFaseStampaMySqlDAO implements ControlliFaseStampaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ControlliFaseStampaMySql 
	 */
	public function load($idFaseStampa, $ora){
		$sql = 'SELECT * FROM controlli_fase_stampa WHERE id_fase_stampa = ?  AND ora = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idFaseStampa);
		$sqlQuery->setNumber($ora);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM controlli_fase_stampa';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM controlli_fase_stampa ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param controlliFaseStampa primary key
 	 */
	public function delete($idFaseStampa, $ora){
		$sql = 'DELETE FROM controlli_fase_stampa WHERE id_fase_stampa = ?  AND ora = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idFaseStampa);
		$sqlQuery->setNumber($ora);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ControlliFaseStampaMySql controlliFaseStampa
 	 */
	public function insert($controlliFaseStampa){
		$sql = 'INSERT INTO controlli_fase_stampa (c1, c2, c3, c4, c5, c6, c7, c8, c9, c10, c11, c12, c13, c14, c15, c16, id_fase_stampa, ora) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($controlliFaseStampa->c1);
		$sqlQuery->set($controlliFaseStampa->c2);
		$sqlQuery->set($controlliFaseStampa->c3);
		$sqlQuery->set($controlliFaseStampa->c4);
		$sqlQuery->set($controlliFaseStampa->c5);
		$sqlQuery->set($controlliFaseStampa->c6);
		$sqlQuery->set($controlliFaseStampa->c7);
		$sqlQuery->set($controlliFaseStampa->c8);
		$sqlQuery->set($controlliFaseStampa->c9);
		$sqlQuery->set($controlliFaseStampa->c10);
		$sqlQuery->set($controlliFaseStampa->c11);
		$sqlQuery->set($controlliFaseStampa->c12);
		$sqlQuery->set($controlliFaseStampa->c13);
		$sqlQuery->set($controlliFaseStampa->c14);
		$sqlQuery->set($controlliFaseStampa->c15);
		$sqlQuery->set($controlliFaseStampa->c16);

		
		$sqlQuery->setNumber($controlliFaseStampa->idFaseStampa);

		$sqlQuery->setNumber($controlliFaseStampa->ora);

		$this->executeInsert($sqlQuery);	
		//$controlliFaseStampa->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ControlliFaseStampaMySql controlliFaseStampa
 	 */
	public function update($controlliFaseStampa){
		$sql = 'UPDATE controlli_fase_stampa SET c1 = ?, c2 = ?, c3 = ?, c4 = ?, c5 = ?, c6 = ?, c7 = ?, c8 = ?, c9 = ?, c10 = ?, c11 = ?, c12 = ?, c13 = ?, c14 = ?, c15 = ?, c16 = ? WHERE id_fase_stampa = ?  AND ora = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($controlliFaseStampa->c1);
		$sqlQuery->set($controlliFaseStampa->c2);
		$sqlQuery->set($controlliFaseStampa->c3);
		$sqlQuery->set($controlliFaseStampa->c4);
		$sqlQuery->set($controlliFaseStampa->c5);
		$sqlQuery->set($controlliFaseStampa->c6);
		$sqlQuery->set($controlliFaseStampa->c7);
		$sqlQuery->set($controlliFaseStampa->c8);
		$sqlQuery->set($controlliFaseStampa->c9);
		$sqlQuery->set($controlliFaseStampa->c10);
		$sqlQuery->set($controlliFaseStampa->c11);
		$sqlQuery->set($controlliFaseStampa->c12);
		$sqlQuery->set($controlliFaseStampa->c13);
		$sqlQuery->set($controlliFaseStampa->c14);
		$sqlQuery->set($controlliFaseStampa->c15);
		$sqlQuery->set($controlliFaseStampa->c16);

		
		$sqlQuery->setNumber($controlliFaseStampa->idFaseStampa);

		$sqlQuery->setNumber($controlliFaseStampa->ora);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM controlli_fase_stampa';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByC1($value){
		$sql = 'SELECT * FROM controlli_fase_stampa WHERE c1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC2($value){
		$sql = 'SELECT * FROM controlli_fase_stampa WHERE c2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC3($value){
		$sql = 'SELECT * FROM controlli_fase_stampa WHERE c3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC4($value){
		$sql = 'SELECT * FROM controlli_fase_stampa WHERE c4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC5($value){
		$sql = 'SELECT * FROM controlli_fase_stampa WHERE c5 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC6($value){
		$sql = 'SELECT * FROM controlli_fase_stampa WHERE c6 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC7($value){
		$sql = 'SELECT * FROM controlli_fase_stampa WHERE c7 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC8($value){
		$sql = 'SELECT * FROM controlli_fase_stampa WHERE c8 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC9($value){
		$sql = 'SELECT * FROM controlli_fase_stampa WHERE c9 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC10($value){
		$sql = 'SELECT * FROM controlli_fase_stampa WHERE c10 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC11($value){
		$sql = 'SELECT * FROM controlli_fase_stampa WHERE c11 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC12($value){
		$sql = 'SELECT * FROM controlli_fase_stampa WHERE c12 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC13($value){
		$sql = 'SELECT * FROM controlli_fase_stampa WHERE c13 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC14($value){
		$sql = 'SELECT * FROM controlli_fase_stampa WHERE c14 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC15($value){
		$sql = 'SELECT * FROM controlli_fase_stampa WHERE c15 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC16($value){
		$sql = 'SELECT * FROM controlli_fase_stampa WHERE c16 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByC1($value){
		$sql = 'DELETE FROM controlli_fase_stampa WHERE c1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC2($value){
		$sql = 'DELETE FROM controlli_fase_stampa WHERE c2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC3($value){
		$sql = 'DELETE FROM controlli_fase_stampa WHERE c3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC4($value){
		$sql = 'DELETE FROM controlli_fase_stampa WHERE c4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC5($value){
		$sql = 'DELETE FROM controlli_fase_stampa WHERE c5 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC6($value){
		$sql = 'DELETE FROM controlli_fase_stampa WHERE c6 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC7($value){
		$sql = 'DELETE FROM controlli_fase_stampa WHERE c7 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC8($value){
		$sql = 'DELETE FROM controlli_fase_stampa WHERE c8 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC9($value){
		$sql = 'DELETE FROM controlli_fase_stampa WHERE c9 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC10($value){
		$sql = 'DELETE FROM controlli_fase_stampa WHERE c10 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC11($value){
		$sql = 'DELETE FROM controlli_fase_stampa WHERE c11 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC12($value){
		$sql = 'DELETE FROM controlli_fase_stampa WHERE c12 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC13($value){
		$sql = 'DELETE FROM controlli_fase_stampa WHERE c13 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC14($value){
		$sql = 'DELETE FROM controlli_fase_stampa WHERE c14 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC15($value){
		$sql = 'DELETE FROM controlli_fase_stampa WHERE c15 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC16($value){
		$sql = 'DELETE FROM controlli_fase_stampa WHERE c16 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ControlliFaseStampaMySql 
	 */
	protected function readRow($row){
		$controlliFaseStampa = new ControlliFaseStampa();
		
		$controlliFaseStampa->idFaseStampa = $row['id_fase_stampa'];
		$controlliFaseStampa->ora = $row['ora'];
		$controlliFaseStampa->c1 = $row['c1'];
		$controlliFaseStampa->c2 = $row['c2'];
		$controlliFaseStampa->c3 = $row['c3'];
		$controlliFaseStampa->c4 = $row['c4'];
		$controlliFaseStampa->c5 = $row['c5'];
		$controlliFaseStampa->c6 = $row['c6'];
		$controlliFaseStampa->c7 = $row['c7'];
		$controlliFaseStampa->c8 = $row['c8'];
		$controlliFaseStampa->c9 = $row['c9'];
		$controlliFaseStampa->c10 = $row['c10'];
		$controlliFaseStampa->c11 = $row['c11'];
		$controlliFaseStampa->c12 = $row['c12'];
		$controlliFaseStampa->c13 = $row['c13'];
		$controlliFaseStampa->c14 = $row['c14'];
		$controlliFaseStampa->c15 = $row['c15'];
		$controlliFaseStampa->c16 = $row['c16'];

		return $controlliFaseStampa;
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
	 * @return ControlliFaseStampaMySql 
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
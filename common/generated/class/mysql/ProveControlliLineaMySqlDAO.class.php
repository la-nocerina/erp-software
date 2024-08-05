<?php
/**
 * Class that operate on table 'prove_controlli_linea'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class ProveControlliLineaMySqlDAO implements ProveControlliLineaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ProveControlliLineaMySql 
	 */
	public function load($idSchedaProve, $linea, $ora){
		$sql = 'SELECT * FROM prove_controlli_linea WHERE id_scheda_prove = ?  AND linea = ?  AND ora = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idSchedaProve);
		$sqlQuery->setNumber($linea);
		$sqlQuery->setNumber($ora);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM prove_controlli_linea';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM prove_controlli_linea ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param proveControlliLinea primary key
 	 */
	public function delete($idSchedaProve, $linea, $ora){
		$sql = 'DELETE FROM prove_controlli_linea WHERE id_scheda_prove = ?  AND linea = ?  AND ora = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idSchedaProve);
		$sqlQuery->setNumber($linea);
		$sqlQuery->setNumber($ora);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProveControlliLineaMySql proveControlliLinea
 	 */
	public function insert($proveControlliLinea){
		$sql = 'INSERT INTO prove_controlli_linea (c1, c2, c3, c4, c5, c6, c7, c8, id_prodotto_in_giacenza, id_fase, id_fase_stampa, id_scheda_prove, linea, ora) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($proveControlliLinea->c1);
		$sqlQuery->set($proveControlliLinea->c2);
		$sqlQuery->set($proveControlliLinea->c3);
		$sqlQuery->set($proveControlliLinea->c4);
		$sqlQuery->set($proveControlliLinea->c5);
		$sqlQuery->set($proveControlliLinea->c6);
		$sqlQuery->set($proveControlliLinea->c7);
		$sqlQuery->set($proveControlliLinea->c8);
		$sqlQuery->setNumber($proveControlliLinea->idProdottoInGiacenza);
		$sqlQuery->setNumber($proveControlliLinea->idFase);
		$sqlQuery->setNumber($proveControlliLinea->idFaseStampa);

		
		$sqlQuery->setNumber($proveControlliLinea->idSchedaProve);

		$sqlQuery->setNumber($proveControlliLinea->linea);

		$sqlQuery->setNumber($proveControlliLinea->ora);

		$this->executeInsert($sqlQuery);	
		//$proveControlliLinea->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProveControlliLineaMySql proveControlliLinea
 	 */
	public function update($proveControlliLinea){
		$sql = 'UPDATE prove_controlli_linea SET c1 = ?, c2 = ?, c3 = ?, c4 = ?, c5 = ?, c6 = ?, c7 = ?, c8 = ?, id_prodotto_in_giacenza = ?, id_fase = ?, id_fase_stampa = ? WHERE id_scheda_prove = ?  AND linea = ?  AND ora = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($proveControlliLinea->c1);
		$sqlQuery->set($proveControlliLinea->c2);
		$sqlQuery->set($proveControlliLinea->c3);
		$sqlQuery->set($proveControlliLinea->c4);
		$sqlQuery->set($proveControlliLinea->c5);
		$sqlQuery->set($proveControlliLinea->c6);
		$sqlQuery->set($proveControlliLinea->c7);
		$sqlQuery->set($proveControlliLinea->c8);
		$sqlQuery->setNumber($proveControlliLinea->idProdottoInGiacenza);
		$sqlQuery->setNumber($proveControlliLinea->idFase);
		$sqlQuery->setNumber($proveControlliLinea->idFaseStampa);

		
		$sqlQuery->setNumber($proveControlliLinea->idSchedaProve);

		$sqlQuery->setNumber($proveControlliLinea->linea);

		$sqlQuery->setNumber($proveControlliLinea->ora);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM prove_controlli_linea';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByC1($value){
		$sql = 'SELECT * FROM prove_controlli_linea WHERE c1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC2($value){
		$sql = 'SELECT * FROM prove_controlli_linea WHERE c2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC3($value){
		$sql = 'SELECT * FROM prove_controlli_linea WHERE c3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC4($value){
		$sql = 'SELECT * FROM prove_controlli_linea WHERE c4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC5($value){
		$sql = 'SELECT * FROM prove_controlli_linea WHERE c5 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC6($value){
		$sql = 'SELECT * FROM prove_controlli_linea WHERE c6 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC7($value){
		$sql = 'SELECT * FROM prove_controlli_linea WHERE c7 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByC8($value){
		$sql = 'SELECT * FROM prove_controlli_linea WHERE c8 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdProdottoInGiacenza($value){
		$sql = 'SELECT * FROM prove_controlli_linea WHERE id_prodotto_in_giacenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdFase($value){
		$sql = 'SELECT * FROM prove_controlli_linea WHERE id_fase = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdFaseStampa($value){
		$sql = 'SELECT * FROM prove_controlli_linea WHERE id_fase_stampa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByC1($value){
		$sql = 'DELETE FROM prove_controlli_linea WHERE c1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC2($value){
		$sql = 'DELETE FROM prove_controlli_linea WHERE c2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC3($value){
		$sql = 'DELETE FROM prove_controlli_linea WHERE c3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC4($value){
		$sql = 'DELETE FROM prove_controlli_linea WHERE c4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC5($value){
		$sql = 'DELETE FROM prove_controlli_linea WHERE c5 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC6($value){
		$sql = 'DELETE FROM prove_controlli_linea WHERE c6 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC7($value){
		$sql = 'DELETE FROM prove_controlli_linea WHERE c7 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByC8($value){
		$sql = 'DELETE FROM prove_controlli_linea WHERE c8 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdProdottoInGiacenza($value){
		$sql = 'DELETE FROM prove_controlli_linea WHERE id_prodotto_in_giacenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdFase($value){
		$sql = 'DELETE FROM prove_controlli_linea WHERE id_fase = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdFaseStampa($value){
		$sql = 'DELETE FROM prove_controlli_linea WHERE id_fase_stampa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ProveControlliLineaMySql 
	 */
	protected function readRow($row){
		$proveControlliLinea = new ProveControlliLinea();
		
		$proveControlliLinea->idSchedaProve = $row['id_scheda_prove'];
		$proveControlliLinea->linea = $row['linea'];
		$proveControlliLinea->ora = $row['ora'];
		$proveControlliLinea->c1 = $row['c1'];
		$proveControlliLinea->c2 = $row['c2'];
		$proveControlliLinea->c3 = $row['c3'];
		$proveControlliLinea->c4 = $row['c4'];
		$proveControlliLinea->c5 = $row['c5'];
		$proveControlliLinea->c6 = $row['c6'];
		$proveControlliLinea->c7 = $row['c7'];
		$proveControlliLinea->c8 = $row['c8'];
		$proveControlliLinea->idProdottoInGiacenza = $row['id_prodotto_in_giacenza'];
		$proveControlliLinea->idFase = $row['id_fase'];
		$proveControlliLinea->idFaseStampa = $row['id_fase_stampa'];

		return $proveControlliLinea;
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
	 * @return ProveControlliLineaMySql 
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
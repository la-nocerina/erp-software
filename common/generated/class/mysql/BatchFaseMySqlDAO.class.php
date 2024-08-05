<?php
/**
 * Class that operate on table 'batch_fase'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class BatchFaseMySqlDAO implements BatchFaseDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return BatchFaseMySql 
	 */
	public function load($idProdottoInGiacenza, $idFase){
		$sql = 'SELECT * FROM batch_fase WHERE id_prodotto_in_giacenza = ?  AND id_fase = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idProdottoInGiacenza);
		$sqlQuery->setNumber($idFase);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM batch_fase';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM batch_fase ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param batchFase primary key
 	 */
	public function delete($idProdottoInGiacenza, $idFase){
		$sql = 'DELETE FROM batch_fase WHERE id_prodotto_in_giacenza = ?  AND id_fase = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idProdottoInGiacenza);
		$sqlQuery->setNumber($idFase);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param BatchFaseMySql batchFase
 	 */
	public function insert($batchFase){
		$sql = 'INSERT INTO batch_fase (consumo, id_prodotto_in_giacenza, id_fase) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($batchFase->consumo);

		
		$sqlQuery->setNumber($batchFase->idProdottoInGiacenza);

		$sqlQuery->setNumber($batchFase->idFase);

		$this->executeInsert($sqlQuery);	
		//$batchFase->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param BatchFaseMySql batchFase
 	 */
	public function update($batchFase){
		$sql = 'UPDATE batch_fase SET consumo = ? WHERE id_prodotto_in_giacenza = ?  AND id_fase = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($batchFase->consumo);

		
		$sqlQuery->setNumber($batchFase->idProdottoInGiacenza);

		$sqlQuery->setNumber($batchFase->idFase);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM batch_fase';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByConsumo($value){
		$sql = 'SELECT * FROM batch_fase WHERE consumo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByConsumo($value){
		$sql = 'DELETE FROM batch_fase WHERE consumo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return BatchFaseMySql 
	 */
	protected function readRow($row){
		$batchFase = new BatchFase();
		
		$batchFase->idProdottoInGiacenza = $row['id_prodotto_in_giacenza'];
		$batchFase->idFase = $row['id_fase'];
		$batchFase->consumo = $row['consumo'];

		return $batchFase;
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
	 * @return BatchFaseMySql 
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
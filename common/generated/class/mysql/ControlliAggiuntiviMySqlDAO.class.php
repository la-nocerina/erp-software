<?php
/**
 * Class that operate on table 'controlli_aggiuntivi'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class ControlliAggiuntiviMySqlDAO implements ControlliAggiuntiviDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ControlliAggiuntiviMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM controlli_aggiuntivi WHERE id_controllo_aggiuntivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM controlli_aggiuntivi';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM controlli_aggiuntivi ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param controlliAggiuntivi primary key
 	 */
	public function delete($id_controllo_aggiuntivo){
		$sql = 'DELETE FROM controlli_aggiuntivi WHERE id_controllo_aggiuntivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_controllo_aggiuntivo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ControlliAggiuntiviMySql controlliAggiuntivi
 	 */
	public function insert($controlliAggiuntivi){
		$sql = 'INSERT INTO controlli_aggiuntivi (id_scheda_prove, linea, controllo, valore) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($controlliAggiuntivi->idSchedaProve);
		$sqlQuery->setNumber($controlliAggiuntivi->linea);
		$sqlQuery->setNumber($controlliAggiuntivi->controllo);
		$sqlQuery->set($controlliAggiuntivi->valore);

		$id = $this->executeInsert($sqlQuery);	
		$controlliAggiuntivi->idControlloAggiuntivo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ControlliAggiuntiviMySql controlliAggiuntivi
 	 */
	public function update($controlliAggiuntivi){
		$sql = 'UPDATE controlli_aggiuntivi SET id_scheda_prove = ?, linea = ?, controllo = ?, valore = ? WHERE id_controllo_aggiuntivo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($controlliAggiuntivi->idSchedaProve);
		$sqlQuery->setNumber($controlliAggiuntivi->linea);
		$sqlQuery->setNumber($controlliAggiuntivi->controllo);
		$sqlQuery->set($controlliAggiuntivi->valore);

		$sqlQuery->setNumber($controlliAggiuntivi->idControlloAggiuntivo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM controlli_aggiuntivi';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdSchedaProve($value){
		$sql = 'SELECT * FROM controlli_aggiuntivi WHERE id_scheda_prove = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLinea($value){
		$sql = 'SELECT * FROM controlli_aggiuntivi WHERE linea = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByControllo($value){
		$sql = 'SELECT * FROM controlli_aggiuntivi WHERE controllo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValore($value){
		$sql = 'SELECT * FROM controlli_aggiuntivi WHERE valore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdSchedaProve($value){
		$sql = 'DELETE FROM controlli_aggiuntivi WHERE id_scheda_prove = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinea($value){
		$sql = 'DELETE FROM controlli_aggiuntivi WHERE linea = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByControllo($value){
		$sql = 'DELETE FROM controlli_aggiuntivi WHERE controllo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValore($value){
		$sql = 'DELETE FROM controlli_aggiuntivi WHERE valore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ControlliAggiuntiviMySql 
	 */
	protected function readRow($row){
		$controlliAggiuntivi = new ControlliAggiuntivi();
		
		$controlliAggiuntivi->idControlloAggiuntivo = $row['id_controllo_aggiuntivo'];
		$controlliAggiuntivi->idSchedaProve = $row['id_scheda_prove'];
		$controlliAggiuntivi->linea = $row['linea'];
		$controlliAggiuntivi->controllo = $row['controllo'];
		$controlliAggiuntivi->valore = $row['valore'];

		return $controlliAggiuntivi;
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
	 * @return ControlliAggiuntiviMySql 
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
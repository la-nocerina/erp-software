<?php
/**
 * Class that operate on table 'schede_produzione'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class SchedeProduzioneMySqlDAO implements SchedeProduzioneDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return SchedeProduzioneMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM schede_produzione WHERE id_scheda_produzione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM schede_produzione';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM schede_produzione ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param schedeProduzione primary key
 	 */
	public function delete($id_scheda_produzione){
		$sql = 'DELETE FROM schede_produzione WHERE id_scheda_produzione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_scheda_produzione);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param SchedeProduzioneMySql schedeProduzione
 	 */
	public function insert($schedeProduzione){
		$sql = 'INSERT INTO schede_produzione (turno, tipo_macchina, macchinista, id_partner, lavorazione, data, ora, linea) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($schedeProduzione->turno);
		$sqlQuery->set($schedeProduzione->tipoMacchina);
		$sqlQuery->set($schedeProduzione->macchinista);
		$sqlQuery->setNumber($schedeProduzione->idPartner);
		$sqlQuery->set($schedeProduzione->lavorazione);
		$sqlQuery->set($schedeProduzione->data);
		$sqlQuery->set($schedeProduzione->ora);
		$sqlQuery->setNumber($schedeProduzione->linea);

		$id = $this->executeInsert($sqlQuery);	
		$schedeProduzione->idSchedaProduzione = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param SchedeProduzioneMySql schedeProduzione
 	 */
	public function update($schedeProduzione){
		$sql = 'UPDATE schede_produzione SET turno = ?, tipo_macchina = ?, macchinista = ?, id_partner = ?, lavorazione = ?, data = ?, ora = ?, linea = ? WHERE id_scheda_produzione = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($schedeProduzione->turno);
		$sqlQuery->set($schedeProduzione->tipoMacchina);
		$sqlQuery->set($schedeProduzione->macchinista);
		$sqlQuery->setNumber($schedeProduzione->idPartner);
		$sqlQuery->set($schedeProduzione->lavorazione);
		$sqlQuery->set($schedeProduzione->data);
		$sqlQuery->set($schedeProduzione->ora);
		$sqlQuery->setNumber($schedeProduzione->linea);

		$sqlQuery->setNumber($schedeProduzione->idSchedaProduzione);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM schede_produzione';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTurno($value){
		$sql = 'SELECT * FROM schede_produzione WHERE turno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoMacchina($value){
		$sql = 'SELECT * FROM schede_produzione WHERE tipo_macchina = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMacchinista($value){
		$sql = 'SELECT * FROM schede_produzione WHERE macchinista = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdPartner($value){
		$sql = 'SELECT * FROM schede_produzione WHERE id_partner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLavorazione($value){
		$sql = 'SELECT * FROM schede_produzione WHERE lavorazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM schede_produzione WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOra($value){
		$sql = 'SELECT * FROM schede_produzione WHERE ora = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLinea($value){
		$sql = 'SELECT * FROM schede_produzione WHERE linea = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTurno($value){
		$sql = 'DELETE FROM schede_produzione WHERE turno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoMacchina($value){
		$sql = 'DELETE FROM schede_produzione WHERE tipo_macchina = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMacchinista($value){
		$sql = 'DELETE FROM schede_produzione WHERE macchinista = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdPartner($value){
		$sql = 'DELETE FROM schede_produzione WHERE id_partner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLavorazione($value){
		$sql = 'DELETE FROM schede_produzione WHERE lavorazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM schede_produzione WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOra($value){
		$sql = 'DELETE FROM schede_produzione WHERE ora = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinea($value){
		$sql = 'DELETE FROM schede_produzione WHERE linea = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return SchedeProduzioneMySql 
	 */
	protected function readRow($row){
		$schedeProduzione = new SchedeProduzione();
		
		$schedeProduzione->idSchedaProduzione = $row['id_scheda_produzione'];
		$schedeProduzione->turno = $row['turno'];
		$schedeProduzione->tipoMacchina = $row['tipo_macchina'];
		$schedeProduzione->macchinista = $row['macchinista'];
		$schedeProduzione->idPartner = $row['id_partner'];
		$schedeProduzione->lavorazione = $row['lavorazione'];
		$schedeProduzione->data = $row['data'];
		$schedeProduzione->ora = $row['ora'];
		$schedeProduzione->linea = $row['linea'];

		return $schedeProduzione;
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
	 * @return SchedeProduzioneMySql 
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
<?php
/**
 * Class that operate on table 'schede_tecniche'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class SchedeTecnicheMySqlDAO implements SchedeTecnicheDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return SchedeTecnicheMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM schede_tecniche WHERE id_scheda_tecnica = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM schede_tecniche';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM schede_tecniche ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param schedeTecniche primary key
 	 */
	public function delete($id_scheda_tecnica){
		$sql = 'DELETE FROM schede_tecniche WHERE id_scheda_tecnica = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_scheda_tecnica);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param SchedeTecnicheMySql schedeTecniche
 	 */
	public function insert($schedeTecniche){
		$sql = 'INSERT INTO schede_tecniche (id_prodotto, descrizione, temp_forno, gr_umido, gr_secco, viscosita, velocita) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($schedeTecniche->idProdotto);
		$sqlQuery->set($schedeTecniche->descrizione);
		$sqlQuery->set($schedeTecniche->tempForno);
		$sqlQuery->set($schedeTecniche->grUmido);
		$sqlQuery->set($schedeTecniche->grSecco);
		$sqlQuery->set($schedeTecniche->viscosita);
		$sqlQuery->set($schedeTecniche->velocita);

		$id = $this->executeInsert($sqlQuery);	
		$schedeTecniche->idSchedaTecnica = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param SchedeTecnicheMySql schedeTecniche
 	 */
	public function update($schedeTecniche){
		$sql = 'UPDATE schede_tecniche SET id_prodotto = ?, descrizione = ?, temp_forno = ?, gr_umido = ?, gr_secco = ?, viscosita = ?, velocita = ? WHERE id_scheda_tecnica = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($schedeTecniche->idProdotto);
		$sqlQuery->set($schedeTecniche->descrizione);
		$sqlQuery->set($schedeTecniche->tempForno);
		$sqlQuery->set($schedeTecniche->grUmido);
		$sqlQuery->set($schedeTecniche->grSecco);
		$sqlQuery->set($schedeTecniche->viscosita);
		$sqlQuery->set($schedeTecniche->velocita);

		$sqlQuery->setNumber($schedeTecniche->idSchedaTecnica);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM schede_tecniche';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdProdotto($value){
		$sql = 'SELECT * FROM schede_tecniche WHERE id_prodotto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescrizione($value){
		$sql = 'SELECT * FROM schede_tecniche WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTempForno($value){
		$sql = 'SELECT * FROM schede_tecniche WHERE temp_forno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGrUmido($value){
		$sql = 'SELECT * FROM schede_tecniche WHERE gr_umido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGrSecco($value){
		$sql = 'SELECT * FROM schede_tecniche WHERE gr_secco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByViscosita($value){
		$sql = 'SELECT * FROM schede_tecniche WHERE viscosita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVelocita($value){
		$sql = 'SELECT * FROM schede_tecniche WHERE velocita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdProdotto($value){
		$sql = 'DELETE FROM schede_tecniche WHERE id_prodotto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescrizione($value){
		$sql = 'DELETE FROM schede_tecniche WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTempForno($value){
		$sql = 'DELETE FROM schede_tecniche WHERE temp_forno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGrUmido($value){
		$sql = 'DELETE FROM schede_tecniche WHERE gr_umido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGrSecco($value){
		$sql = 'DELETE FROM schede_tecniche WHERE gr_secco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByViscosita($value){
		$sql = 'DELETE FROM schede_tecniche WHERE viscosita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVelocita($value){
		$sql = 'DELETE FROM schede_tecniche WHERE velocita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return SchedeTecnicheMySql 
	 */
	protected function readRow($row){
		$schedeTecniche = new SchedeTecniche();
		
		$schedeTecniche->idSchedaTecnica = $row['id_scheda_tecnica'];
		$schedeTecniche->idProdotto = $row['id_prodotto'];
		$schedeTecniche->descrizione = $row['descrizione'];
		$schedeTecniche->tempForno = $row['temp_forno'];
		$schedeTecniche->grUmido = $row['gr_umido'];
		$schedeTecniche->grSecco = $row['gr_secco'];
		$schedeTecniche->viscosita = $row['viscosita'];
		$schedeTecniche->velocita = $row['velocita'];

		return $schedeTecniche;
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
	 * @return SchedeTecnicheMySql 
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
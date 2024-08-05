<?php
/**
 * Class that operate on table 'fermate_guasti'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class FermateGuastiMySqlDAO implements FermateGuastiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return FermateGuastiMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM fermate_guasti WHERE id_fermate_guasti = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM fermate_guasti';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM fermate_guasti ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param fermateGuasti primary key
 	 */
	public function delete($id_fermate_guasti){
		$sql = 'DELETE FROM fermate_guasti WHERE id_fermate_guasti = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_fermate_guasti);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param FermateGuastiMySql fermateGuasti
 	 */
	public function insert($fermateGuasti){
		$sql = 'INSERT INTO fermate_guasti (linea, data, standard, operatore, turno, altre_cause, r_produzione, r_assicurazione_qualita, r_manutenzione, data_verifica) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($fermateGuasti->linea);
		$sqlQuery->set($fermateGuasti->data);
		$sqlQuery->set($fermateGuasti->standard);
		$sqlQuery->set($fermateGuasti->operatore);
		$sqlQuery->set($fermateGuasti->turno);
		$sqlQuery->set($fermateGuasti->altreCause);
		$sqlQuery->set($fermateGuasti->rProduzione);
		$sqlQuery->set($fermateGuasti->rAssicurazioneQualita);
		$sqlQuery->set($fermateGuasti->rManutenzione);
		$sqlQuery->set($fermateGuasti->dataVerifica);

		$id = $this->executeInsert($sqlQuery);	
		$fermateGuasti->idFermateGuasti = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param FermateGuastiMySql fermateGuasti
 	 */
	public function update($fermateGuasti){
		$sql = 'UPDATE fermate_guasti SET linea = ?, data = ?, standard = ?, operatore = ?, turno = ?, altre_cause = ?, r_produzione = ?, r_assicurazione_qualita = ?, r_manutenzione = ?, data_verifica = ? WHERE id_fermate_guasti = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($fermateGuasti->linea);
		$sqlQuery->set($fermateGuasti->data);
		$sqlQuery->set($fermateGuasti->standard);
		$sqlQuery->set($fermateGuasti->operatore);
		$sqlQuery->set($fermateGuasti->turno);
		$sqlQuery->set($fermateGuasti->altreCause);
		$sqlQuery->set($fermateGuasti->rProduzione);
		$sqlQuery->set($fermateGuasti->rAssicurazioneQualita);
		$sqlQuery->set($fermateGuasti->rManutenzione);
		$sqlQuery->set($fermateGuasti->dataVerifica);

		$sqlQuery->setNumber($fermateGuasti->idFermateGuasti);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM fermate_guasti';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByLinea($value){
		$sql = 'SELECT * FROM fermate_guasti WHERE linea = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM fermate_guasti WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStandard($value){
		$sql = 'SELECT * FROM fermate_guasti WHERE standard = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOperatore($value){
		$sql = 'SELECT * FROM fermate_guasti WHERE operatore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTurno($value){
		$sql = 'SELECT * FROM fermate_guasti WHERE turno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAltreCause($value){
		$sql = 'SELECT * FROM fermate_guasti WHERE altre_cause = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRProduzione($value){
		$sql = 'SELECT * FROM fermate_guasti WHERE r_produzione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRAssicurazioneQualita($value){
		$sql = 'SELECT * FROM fermate_guasti WHERE r_assicurazione_qualita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRManutenzione($value){
		$sql = 'SELECT * FROM fermate_guasti WHERE r_manutenzione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataVerifica($value){
		$sql = 'SELECT * FROM fermate_guasti WHERE data_verifica = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByLinea($value){
		$sql = 'DELETE FROM fermate_guasti WHERE linea = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM fermate_guasti WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStandard($value){
		$sql = 'DELETE FROM fermate_guasti WHERE standard = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOperatore($value){
		$sql = 'DELETE FROM fermate_guasti WHERE operatore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTurno($value){
		$sql = 'DELETE FROM fermate_guasti WHERE turno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAltreCause($value){
		$sql = 'DELETE FROM fermate_guasti WHERE altre_cause = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRProduzione($value){
		$sql = 'DELETE FROM fermate_guasti WHERE r_produzione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRAssicurazioneQualita($value){
		$sql = 'DELETE FROM fermate_guasti WHERE r_assicurazione_qualita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRManutenzione($value){
		$sql = 'DELETE FROM fermate_guasti WHERE r_manutenzione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataVerifica($value){
		$sql = 'DELETE FROM fermate_guasti WHERE data_verifica = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return FermateGuastiMySql 
	 */
	protected function readRow($row){
		$fermateGuasti = new FermateGuasti();
		
		$fermateGuasti->idFermateGuasti = $row['id_fermate_guasti'];
		$fermateGuasti->linea = $row['linea'];
		$fermateGuasti->data = $row['data'];
		$fermateGuasti->standard = $row['standard'];
		$fermateGuasti->operatore = $row['operatore'];
		$fermateGuasti->turno = $row['turno'];
		$fermateGuasti->altreCause = $row['altre_cause'];
		$fermateGuasti->rProduzione = $row['r_produzione'];
		$fermateGuasti->rAssicurazioneQualita = $row['r_assicurazione_qualita'];
		$fermateGuasti->rManutenzione = $row['r_manutenzione'];
		$fermateGuasti->dataVerifica = $row['data_verifica'];

		return $fermateGuasti;
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
	 * @return FermateGuastiMySql 
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
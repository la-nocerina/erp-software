<?php
/**
 * Class that operate on table 'ricezione_materiali'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class RicezioneMaterialiMySqlDAO implements RicezioneMaterialiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RicezioneMaterialiMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM ricezione_materiali WHERE id_ricezione_materiali = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM ricezione_materiali';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM ricezione_materiali ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param ricezioneMateriali primary key
 	 */
	public function delete($id_ricezione_materiali){
		$sql = 'DELETE FROM ricezione_materiali WHERE id_ricezione_materiali = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_ricezione_materiali);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RicezioneMaterialiMySql ricezioneMateriali
 	 */
	public function insert($ricezioneMateriali){
		$sql = 'INSERT INTO ricezione_materiali (num_documento, id_partner, ddt_n, num_colli, ordine_n, kg, destinazione, tipo, tipo_note, id_partner_provenienza, controlli, n1, n2, n3, n4, n5, n6, n7, n8, n9, n10, n11, n12, data_ddt, data_scarico, compilatore) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($ricezioneMateriali->numDocumento);
		$sqlQuery->setNumber($ricezioneMateriali->idPartner);
		$sqlQuery->set($ricezioneMateriali->ddtN);
		$sqlQuery->setNumber($ricezioneMateriali->numColli);
		$sqlQuery->set($ricezioneMateriali->ordineN);
		$sqlQuery->set($ricezioneMateriali->kg);
		$sqlQuery->set($ricezioneMateriali->destinazione);
		$sqlQuery->setNumber($ricezioneMateriali->tipo);
		$sqlQuery->set($ricezioneMateriali->tipoNote);
		$sqlQuery->setNumber($ricezioneMateriali->idPartnerProvenienza);
		$sqlQuery->set($ricezioneMateriali->controlli);
		$sqlQuery->set($ricezioneMateriali->n1);
		$sqlQuery->set($ricezioneMateriali->n2);
		$sqlQuery->set($ricezioneMateriali->n3);
		$sqlQuery->set($ricezioneMateriali->n4);
		$sqlQuery->set($ricezioneMateriali->n5);
		$sqlQuery->set($ricezioneMateriali->n6);
		$sqlQuery->set($ricezioneMateriali->n7);
		$sqlQuery->set($ricezioneMateriali->n8);
		$sqlQuery->set($ricezioneMateriali->n9);
		$sqlQuery->set($ricezioneMateriali->n10);
		$sqlQuery->set($ricezioneMateriali->n11);
		$sqlQuery->set($ricezioneMateriali->n12);
		$sqlQuery->set($ricezioneMateriali->dataDdt);
		$sqlQuery->set($ricezioneMateriali->dataScarico);
		$sqlQuery->set($ricezioneMateriali->compilatore);

		$id = $this->executeInsert($sqlQuery);	
		$ricezioneMateriali->idRicezioneMateriali = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RicezioneMaterialiMySql ricezioneMateriali
 	 */
	public function update($ricezioneMateriali){
		$sql = 'UPDATE ricezione_materiali SET num_documento = ?, id_partner = ?, ddt_n = ?, num_colli = ?, ordine_n = ?, kg = ?, destinazione = ?, tipo = ?, tipo_note = ?, id_partner_provenienza = ?, controlli = ?, n1 = ?, n2 = ?, n3 = ?, n4 = ?, n5 = ?, n6 = ?, n7 = ?, n8 = ?, n9 = ?, n10 = ?, n11 = ?, n12 = ?, data_ddt = ?, data_scarico = ?, compilatore = ? WHERE id_ricezione_materiali = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($ricezioneMateriali->numDocumento);
		$sqlQuery->setNumber($ricezioneMateriali->idPartner);
		$sqlQuery->set($ricezioneMateriali->ddtN);
		$sqlQuery->setNumber($ricezioneMateriali->numColli);
		$sqlQuery->set($ricezioneMateriali->ordineN);
		$sqlQuery->set($ricezioneMateriali->kg);
		$sqlQuery->set($ricezioneMateriali->destinazione);
		$sqlQuery->setNumber($ricezioneMateriali->tipo);
		$sqlQuery->set($ricezioneMateriali->tipoNote);
		$sqlQuery->setNumber($ricezioneMateriali->idPartnerProvenienza);
		$sqlQuery->set($ricezioneMateriali->controlli);
		$sqlQuery->set($ricezioneMateriali->n1);
		$sqlQuery->set($ricezioneMateriali->n2);
		$sqlQuery->set($ricezioneMateriali->n3);
		$sqlQuery->set($ricezioneMateriali->n4);
		$sqlQuery->set($ricezioneMateriali->n5);
		$sqlQuery->set($ricezioneMateriali->n6);
		$sqlQuery->set($ricezioneMateriali->n7);
		$sqlQuery->set($ricezioneMateriali->n8);
		$sqlQuery->set($ricezioneMateriali->n9);
		$sqlQuery->set($ricezioneMateriali->n10);
		$sqlQuery->set($ricezioneMateriali->n11);
		$sqlQuery->set($ricezioneMateriali->n12);
		$sqlQuery->set($ricezioneMateriali->dataDdt);
		$sqlQuery->set($ricezioneMateriali->dataScarico);
		$sqlQuery->set($ricezioneMateriali->compilatore);

		$sqlQuery->setNumber($ricezioneMateriali->idRicezioneMateriali);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM ricezione_materiali';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNumDocumento($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE num_documento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdPartner($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE id_partner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDdtN($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE ddt_n = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumColli($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE num_colli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrdineN($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE ordine_n = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByKg($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE kg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDestinazione($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE destinazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipo($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoNote($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE tipo_note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdPartnerProvenienza($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE id_partner_provenienza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByControlli($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE controlli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByN1($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE n1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByN2($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE n2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByN3($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE n3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByN4($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE n4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByN5($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE n5 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByN6($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE n6 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByN7($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE n7 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByN8($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE n8 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByN9($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE n9 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByN10($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE n10 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByN11($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE n11 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByN12($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE n12 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataDdt($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE data_ddt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataScarico($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE data_scarico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCompilatore($value){
		$sql = 'SELECT * FROM ricezione_materiali WHERE compilatore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNumDocumento($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE num_documento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdPartner($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE id_partner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDdtN($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE ddt_n = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumColli($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE num_colli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrdineN($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE ordine_n = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKg($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE kg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDestinazione($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE destinazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipo($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoNote($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE tipo_note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdPartnerProvenienza($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE id_partner_provenienza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByControlli($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE controlli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByN1($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE n1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByN2($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE n2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByN3($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE n3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByN4($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE n4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByN5($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE n5 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByN6($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE n6 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByN7($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE n7 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByN8($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE n8 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByN9($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE n9 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByN10($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE n10 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByN11($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE n11 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByN12($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE n12 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataDdt($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE data_ddt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataScarico($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE data_scarico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCompilatore($value){
		$sql = 'DELETE FROM ricezione_materiali WHERE compilatore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RicezioneMaterialiMySql 
	 */
	protected function readRow($row){
		$ricezioneMateriali = new RicezioneMateriali();
		
		$ricezioneMateriali->idRicezioneMateriali = $row['id_ricezione_materiali'];
		$ricezioneMateriali->numDocumento = $row['num_documento'];
		$ricezioneMateriali->idPartner = $row['id_partner'];
		$ricezioneMateriali->ddtN = $row['ddt_n'];
		$ricezioneMateriali->numColli = $row['num_colli'];
		$ricezioneMateriali->ordineN = $row['ordine_n'];
		$ricezioneMateriali->kg = $row['kg'];
		$ricezioneMateriali->destinazione = $row['destinazione'];
		$ricezioneMateriali->tipo = $row['tipo'];
		$ricezioneMateriali->tipoNote = $row['tipo_note'];
		$ricezioneMateriali->idPartnerProvenienza = $row['id_partner_provenienza'];
		$ricezioneMateriali->controlli = $row['controlli'];
		$ricezioneMateriali->n1 = $row['n1'];
		$ricezioneMateriali->n2 = $row['n2'];
		$ricezioneMateriali->n3 = $row['n3'];
		$ricezioneMateriali->n4 = $row['n4'];
		$ricezioneMateriali->n5 = $row['n5'];
		$ricezioneMateriali->n6 = $row['n6'];
		$ricezioneMateriali->n7 = $row['n7'];
		$ricezioneMateriali->n8 = $row['n8'];
		$ricezioneMateriali->n9 = $row['n9'];
		$ricezioneMateriali->n10 = $row['n10'];
		$ricezioneMateriali->n11 = $row['n11'];
		$ricezioneMateriali->n12 = $row['n12'];
		$ricezioneMateriali->dataDdt = $row['data_ddt'];
		$ricezioneMateriali->dataScarico = $row['data_scarico'];
		$ricezioneMateriali->compilatore = $row['compilatore'];

		return $ricezioneMateriali;
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
	 * @return RicezioneMaterialiMySql 
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
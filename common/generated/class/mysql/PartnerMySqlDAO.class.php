<?php
/**
 * Class that operate on table 'partner'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class PartnerMySqlDAO implements PartnerDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PartnerMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM partner WHERE id_partner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM partner';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM partner ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param partner primary key
 	 */
	public function delete($id_partner){
		$sql = 'DELETE FROM partner WHERE id_partner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_partner);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PartnerMySql partner
 	 */
	public function insert($partner){
		$sql = 'INSERT INTO partner (ragione_sociale, partita_iva, codice_fiscale, is_attivo, indirizzo, provincia, comune, cap, id_nazione, sito_web, creato_il, aggiornato_il) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($partner->ragioneSociale);
		$sqlQuery->set($partner->partitaIva);
		$sqlQuery->set($partner->codiceFiscale);
		$sqlQuery->setNumber($partner->isAttivo);
		$sqlQuery->set($partner->indirizzo);
		$sqlQuery->set($partner->provincia);
		$sqlQuery->set($partner->comune);
		$sqlQuery->set($partner->cap);
		$sqlQuery->setNumber($partner->idNazione);
		$sqlQuery->set($partner->sitoWeb);
		$sqlQuery->set($partner->creatoIl);
		$sqlQuery->set($partner->aggiornatoIl);

		$id = $this->executeInsert($sqlQuery);	
		$partner->idPartner = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PartnerMySql partner
 	 */
	public function update($partner){
		$sql = 'UPDATE partner SET ragione_sociale = ?, partita_iva = ?, codice_fiscale = ?, is_attivo = ?, indirizzo = ?, provincia = ?, comune = ?, cap = ?, id_nazione = ?, sito_web = ?, creato_il = ?, aggiornato_il = ? WHERE id_partner = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($partner->ragioneSociale);
		$sqlQuery->set($partner->partitaIva);
		$sqlQuery->set($partner->codiceFiscale);
		$sqlQuery->setNumber($partner->isAttivo);
		$sqlQuery->set($partner->indirizzo);
		$sqlQuery->set($partner->provincia);
		$sqlQuery->set($partner->comune);
		$sqlQuery->set($partner->cap);
		$sqlQuery->setNumber($partner->idNazione);
		$sqlQuery->set($partner->sitoWeb);
		$sqlQuery->set($partner->creatoIl);
		$sqlQuery->set($partner->aggiornatoIl);

		$sqlQuery->setNumber($partner->idPartner);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM partner';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByRagioneSociale($value){
		$sql = 'SELECT * FROM partner WHERE ragione_sociale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPartitaIva($value){
		$sql = 'SELECT * FROM partner WHERE partita_iva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodiceFiscale($value){
		$sql = 'SELECT * FROM partner WHERE codice_fiscale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIsAttivo($value){
		$sql = 'SELECT * FROM partner WHERE is_attivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIndirizzo($value){
		$sql = 'SELECT * FROM partner WHERE indirizzo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProvincia($value){
		$sql = 'SELECT * FROM partner WHERE provincia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByComune($value){
		$sql = 'SELECT * FROM partner WHERE comune = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCap($value){
		$sql = 'SELECT * FROM partner WHERE cap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdNazione($value){
		$sql = 'SELECT * FROM partner WHERE id_nazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySitoWeb($value){
		$sql = 'SELECT * FROM partner WHERE sito_web = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatoIl($value){
		$sql = 'SELECT * FROM partner WHERE creato_il = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAggiornatoIl($value){
		$sql = 'SELECT * FROM partner WHERE aggiornato_il = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByRagioneSociale($value){
		$sql = 'DELETE FROM partner WHERE ragione_sociale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPartitaIva($value){
		$sql = 'DELETE FROM partner WHERE partita_iva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodiceFiscale($value){
		$sql = 'DELETE FROM partner WHERE codice_fiscale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsAttivo($value){
		$sql = 'DELETE FROM partner WHERE is_attivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIndirizzo($value){
		$sql = 'DELETE FROM partner WHERE indirizzo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProvincia($value){
		$sql = 'DELETE FROM partner WHERE provincia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByComune($value){
		$sql = 'DELETE FROM partner WHERE comune = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCap($value){
		$sql = 'DELETE FROM partner WHERE cap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdNazione($value){
		$sql = 'DELETE FROM partner WHERE id_nazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySitoWeb($value){
		$sql = 'DELETE FROM partner WHERE sito_web = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatoIl($value){
		$sql = 'DELETE FROM partner WHERE creato_il = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAggiornatoIl($value){
		$sql = 'DELETE FROM partner WHERE aggiornato_il = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PartnerMySql 
	 */
	protected function readRow($row){
		$partner = new Partner();
		
		$partner->idPartner = $row['id_partner'];
		$partner->ragioneSociale = $row['ragione_sociale'];
		$partner->partitaIva = $row['partita_iva'];
		$partner->codiceFiscale = $row['codice_fiscale'];
		$partner->isAttivo = $row['is_attivo'];
		$partner->indirizzo = $row['indirizzo'];
		$partner->provincia = $row['provincia'];
		$partner->comune = $row['comune'];
		$partner->cap = $row['cap'];
		$partner->idNazione = $row['id_nazione'];
		$partner->sitoWeb = $row['sito_web'];
		$partner->creatoIl = $row['creato_il'];
		$partner->aggiornatoIl = $row['aggiornato_il'];

		return $partner;
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
	 * @return PartnerMySql 
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
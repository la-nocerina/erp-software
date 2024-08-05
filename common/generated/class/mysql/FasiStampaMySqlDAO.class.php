<?php
/**
 * Class that operate on table 'fasi_stampa'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class FasiStampaMySqlDAO implements FasiStampaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return FasiStampaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM fasi_stampa WHERE id_fase_stampa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM fasi_stampa';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM fasi_stampa ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param fasiStampa primary key
 	 */
	public function delete($id_fase_stampa){
		$sql = 'DELETE FROM fasi_stampa WHERE id_fase_stampa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_fase_stampa);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param FasiStampaMySql fasiStampa
 	 */
	public function insert($fasiStampa){
		$sql = 'INSERT INTO fasi_stampa (descrizione, velocita, colore, temperatura, ris, fogli, lastre, corpi, cop_fon, caps, tappi, altro, operatore, codice_interno_ptodotto, id_commessa, num_fase, num_linea, ora_inizio, ora_fine) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($fasiStampa->descrizione);
		$sqlQuery->set($fasiStampa->velocita);
		$sqlQuery->set($fasiStampa->colore);
		$sqlQuery->set($fasiStampa->temperatura);
		$sqlQuery->set($fasiStampa->ris);
		$sqlQuery->setNumber($fasiStampa->fogli);
		$sqlQuery->set($fasiStampa->lastre);
		$sqlQuery->setNumber($fasiStampa->corpi);
		$sqlQuery->setNumber($fasiStampa->copFon);
		$sqlQuery->setNumber($fasiStampa->caps);
		$sqlQuery->setNumber($fasiStampa->tappi);
		$sqlQuery->set($fasiStampa->altro);
		$sqlQuery->set($fasiStampa->operatore);
		$sqlQuery->set($fasiStampa->codiceInternoPtodotto);
		$sqlQuery->setNumber($fasiStampa->idCommessa);
		$sqlQuery->setNumber($fasiStampa->numFase);
		$sqlQuery->setNumber($fasiStampa->numLinea);
		$sqlQuery->set($fasiStampa->oraInizio);
		$sqlQuery->set($fasiStampa->oraFine);

		$id = $this->executeInsert($sqlQuery);	
		$fasiStampa->idFaseStampa = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param FasiStampaMySql fasiStampa
 	 */
	public function update($fasiStampa){
		$sql = 'UPDATE fasi_stampa SET descrizione = ?, velocita = ?, colore = ?, temperatura = ?, ris = ?, fogli = ?, lastre = ?, corpi = ?, cop_fon = ?, caps = ?, tappi = ?, altro = ?, operatore = ?, codice_interno_ptodotto = ?, id_commessa = ?, num_fase = ?, num_linea = ?, ora_inizio = ?, ora_fine = ? WHERE id_fase_stampa = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($fasiStampa->descrizione);
		$sqlQuery->set($fasiStampa->velocita);
		$sqlQuery->set($fasiStampa->colore);
		$sqlQuery->set($fasiStampa->temperatura);
		$sqlQuery->set($fasiStampa->ris);
		$sqlQuery->setNumber($fasiStampa->fogli);
		$sqlQuery->set($fasiStampa->lastre);
		$sqlQuery->setNumber($fasiStampa->corpi);
		$sqlQuery->setNumber($fasiStampa->copFon);
		$sqlQuery->setNumber($fasiStampa->caps);
		$sqlQuery->setNumber($fasiStampa->tappi);
		$sqlQuery->set($fasiStampa->altro);
		$sqlQuery->set($fasiStampa->operatore);
		$sqlQuery->set($fasiStampa->codiceInternoPtodotto);
		$sqlQuery->setNumber($fasiStampa->idCommessa);
		$sqlQuery->setNumber($fasiStampa->numFase);
		$sqlQuery->setNumber($fasiStampa->numLinea);
		$sqlQuery->set($fasiStampa->oraInizio);
		$sqlQuery->set($fasiStampa->oraFine);

		$sqlQuery->setNumber($fasiStampa->idFaseStampa);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM fasi_stampa';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescrizione($value){
		$sql = 'SELECT * FROM fasi_stampa WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVelocita($value){
		$sql = 'SELECT * FROM fasi_stampa WHERE velocita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByColore($value){
		$sql = 'SELECT * FROM fasi_stampa WHERE colore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTemperatura($value){
		$sql = 'SELECT * FROM fasi_stampa WHERE temperatura = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRis($value){
		$sql = 'SELECT * FROM fasi_stampa WHERE ris = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFogli($value){
		$sql = 'SELECT * FROM fasi_stampa WHERE fogli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLastre($value){
		$sql = 'SELECT * FROM fasi_stampa WHERE lastre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCorpi($value){
		$sql = 'SELECT * FROM fasi_stampa WHERE corpi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCopFon($value){
		$sql = 'SELECT * FROM fasi_stampa WHERE cop_fon = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCaps($value){
		$sql = 'SELECT * FROM fasi_stampa WHERE caps = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTappi($value){
		$sql = 'SELECT * FROM fasi_stampa WHERE tappi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAltro($value){
		$sql = 'SELECT * FROM fasi_stampa WHERE altro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOperatore($value){
		$sql = 'SELECT * FROM fasi_stampa WHERE operatore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodiceInternoPtodotto($value){
		$sql = 'SELECT * FROM fasi_stampa WHERE codice_interno_ptodotto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdCommessa($value){
		$sql = 'SELECT * FROM fasi_stampa WHERE id_commessa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumFase($value){
		$sql = 'SELECT * FROM fasi_stampa WHERE num_fase = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumLinea($value){
		$sql = 'SELECT * FROM fasi_stampa WHERE num_linea = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOraInizio($value){
		$sql = 'SELECT * FROM fasi_stampa WHERE ora_inizio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOraFine($value){
		$sql = 'SELECT * FROM fasi_stampa WHERE ora_fine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescrizione($value){
		$sql = 'DELETE FROM fasi_stampa WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVelocita($value){
		$sql = 'DELETE FROM fasi_stampa WHERE velocita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByColore($value){
		$sql = 'DELETE FROM fasi_stampa WHERE colore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTemperatura($value){
		$sql = 'DELETE FROM fasi_stampa WHERE temperatura = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRis($value){
		$sql = 'DELETE FROM fasi_stampa WHERE ris = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFogli($value){
		$sql = 'DELETE FROM fasi_stampa WHERE fogli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLastre($value){
		$sql = 'DELETE FROM fasi_stampa WHERE lastre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCorpi($value){
		$sql = 'DELETE FROM fasi_stampa WHERE corpi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCopFon($value){
		$sql = 'DELETE FROM fasi_stampa WHERE cop_fon = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCaps($value){
		$sql = 'DELETE FROM fasi_stampa WHERE caps = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTappi($value){
		$sql = 'DELETE FROM fasi_stampa WHERE tappi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAltro($value){
		$sql = 'DELETE FROM fasi_stampa WHERE altro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOperatore($value){
		$sql = 'DELETE FROM fasi_stampa WHERE operatore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodiceInternoPtodotto($value){
		$sql = 'DELETE FROM fasi_stampa WHERE codice_interno_ptodotto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdCommessa($value){
		$sql = 'DELETE FROM fasi_stampa WHERE id_commessa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumFase($value){
		$sql = 'DELETE FROM fasi_stampa WHERE num_fase = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumLinea($value){
		$sql = 'DELETE FROM fasi_stampa WHERE num_linea = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOraInizio($value){
		$sql = 'DELETE FROM fasi_stampa WHERE ora_inizio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOraFine($value){
		$sql = 'DELETE FROM fasi_stampa WHERE ora_fine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return FasiStampaMySql 
	 */
	protected function readRow($row){
		$fasiStampa = new FasiStampa();
		
		$fasiStampa->idFaseStampa = $row['id_fase_stampa'];
		$fasiStampa->descrizione = $row['descrizione'];
		$fasiStampa->velocita = $row['velocita'];
		$fasiStampa->colore = $row['colore'];
		$fasiStampa->temperatura = $row['temperatura'];
		$fasiStampa->ris = $row['ris'];
		$fasiStampa->fogli = $row['fogli'];
		$fasiStampa->lastre = $row['lastre'];
		$fasiStampa->corpi = $row['corpi'];
		$fasiStampa->copFon = $row['cop_fon'];
		$fasiStampa->caps = $row['caps'];
		$fasiStampa->tappi = $row['tappi'];
		$fasiStampa->altro = $row['altro'];
		$fasiStampa->operatore = $row['operatore'];
		$fasiStampa->codiceInternoPtodotto = $row['codice_interno_ptodotto'];
		$fasiStampa->idCommessa = $row['id_commessa'];
		$fasiStampa->numFase = $row['num_fase'];
		$fasiStampa->numLinea = $row['num_linea'];
		$fasiStampa->oraInizio = $row['ora_inizio'];
		$fasiStampa->oraFine = $row['ora_fine'];

		return $fasiStampa;
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
	 * @return FasiStampaMySql 
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
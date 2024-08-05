<?php
/**
 * Class that operate on table 'fasi'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class FasiMySqlDAO implements FasiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return FasiMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM fasi WHERE id_fase = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM fasi';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM fasi ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param fasi primary key
 	 */
	public function delete($id_fase){
		$sql = 'DELETE FROM fasi WHERE id_fase = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_fase);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param FasiMySql fasi
 	 */
	public function insert($fasi){
		$sql = 'INSERT INTO fasi (descrizione, codice_interno_prodotto, gr_um, gr_sec, velocita, temp_forno, viscosita, fogli, corpi, cop_fon, caps, tappi, altro, operatore, id_commessa, num_fase, num_linea, ora_inizio, ora_fine) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($fasi->descrizione);
		$sqlQuery->set($fasi->codiceInternoProdotto);
		$sqlQuery->set($fasi->grUm);
		$sqlQuery->set($fasi->grSec);
		$sqlQuery->set($fasi->velocita);
		$sqlQuery->set($fasi->tempForno);
		$sqlQuery->set($fasi->viscosita);
		$sqlQuery->setNumber($fasi->fogli);
		$sqlQuery->setNumber($fasi->corpi);
		$sqlQuery->setNumber($fasi->copFon);
		$sqlQuery->setNumber($fasi->caps);
		$sqlQuery->setNumber($fasi->tappi);
		$sqlQuery->set($fasi->altro);
		$sqlQuery->set($fasi->operatore);
		$sqlQuery->setNumber($fasi->idCommessa);
		$sqlQuery->setNumber($fasi->numFase);
		$sqlQuery->setNumber($fasi->numLinea);
		$sqlQuery->set($fasi->oraInizio);
		$sqlQuery->set($fasi->oraFine);

		$id = $this->executeInsert($sqlQuery);	
		$fasi->idFase = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param FasiMySql fasi
 	 */
	public function update($fasi){
		$sql = 'UPDATE fasi SET descrizione = ?, codice_interno_prodotto = ?, gr_um = ?, gr_sec = ?, velocita = ?, temp_forno = ?, viscosita = ?, fogli = ?, corpi = ?, cop_fon = ?, caps = ?, tappi = ?, altro = ?, operatore = ?, id_commessa = ?, num_fase = ?, num_linea = ?, ora_inizio = ?, ora_fine = ? WHERE id_fase = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($fasi->descrizione);
		$sqlQuery->set($fasi->codiceInternoProdotto);
		$sqlQuery->set($fasi->grUm);
		$sqlQuery->set($fasi->grSec);
		$sqlQuery->set($fasi->velocita);
		$sqlQuery->set($fasi->tempForno);
		$sqlQuery->set($fasi->viscosita);
		$sqlQuery->setNumber($fasi->fogli);
		$sqlQuery->setNumber($fasi->corpi);
		$sqlQuery->setNumber($fasi->copFon);
		$sqlQuery->setNumber($fasi->caps);
		$sqlQuery->setNumber($fasi->tappi);
		$sqlQuery->set($fasi->altro);
		$sqlQuery->set($fasi->operatore);
		$sqlQuery->setNumber($fasi->idCommessa);
		$sqlQuery->setNumber($fasi->numFase);
		$sqlQuery->setNumber($fasi->numLinea);
		$sqlQuery->set($fasi->oraInizio);
		$sqlQuery->set($fasi->oraFine);

		$sqlQuery->setNumber($fasi->idFase);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM fasi';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescrizione($value){
		$sql = 'SELECT * FROM fasi WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodiceInternoProdotto($value){
		$sql = 'SELECT * FROM fasi WHERE codice_interno_prodotto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGrUm($value){
		$sql = 'SELECT * FROM fasi WHERE gr_um = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGrSec($value){
		$sql = 'SELECT * FROM fasi WHERE gr_sec = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVelocita($value){
		$sql = 'SELECT * FROM fasi WHERE velocita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTempForno($value){
		$sql = 'SELECT * FROM fasi WHERE temp_forno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByViscosita($value){
		$sql = 'SELECT * FROM fasi WHERE viscosita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFogli($value){
		$sql = 'SELECT * FROM fasi WHERE fogli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCorpi($value){
		$sql = 'SELECT * FROM fasi WHERE corpi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCopFon($value){
		$sql = 'SELECT * FROM fasi WHERE cop_fon = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCaps($value){
		$sql = 'SELECT * FROM fasi WHERE caps = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTappi($value){
		$sql = 'SELECT * FROM fasi WHERE tappi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAltro($value){
		$sql = 'SELECT * FROM fasi WHERE altro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOperatore($value){
		$sql = 'SELECT * FROM fasi WHERE operatore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdCommessa($value){
		$sql = 'SELECT * FROM fasi WHERE id_commessa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumFase($value){
		$sql = 'SELECT * FROM fasi WHERE num_fase = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumLinea($value){
		$sql = 'SELECT * FROM fasi WHERE num_linea = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOraInizio($value){
		$sql = 'SELECT * FROM fasi WHERE ora_inizio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOraFine($value){
		$sql = 'SELECT * FROM fasi WHERE ora_fine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescrizione($value){
		$sql = 'DELETE FROM fasi WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodiceInternoProdotto($value){
		$sql = 'DELETE FROM fasi WHERE codice_interno_prodotto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGrUm($value){
		$sql = 'DELETE FROM fasi WHERE gr_um = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGrSec($value){
		$sql = 'DELETE FROM fasi WHERE gr_sec = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVelocita($value){
		$sql = 'DELETE FROM fasi WHERE velocita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTempForno($value){
		$sql = 'DELETE FROM fasi WHERE temp_forno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByViscosita($value){
		$sql = 'DELETE FROM fasi WHERE viscosita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFogli($value){
		$sql = 'DELETE FROM fasi WHERE fogli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCorpi($value){
		$sql = 'DELETE FROM fasi WHERE corpi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCopFon($value){
		$sql = 'DELETE FROM fasi WHERE cop_fon = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCaps($value){
		$sql = 'DELETE FROM fasi WHERE caps = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTappi($value){
		$sql = 'DELETE FROM fasi WHERE tappi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAltro($value){
		$sql = 'DELETE FROM fasi WHERE altro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOperatore($value){
		$sql = 'DELETE FROM fasi WHERE operatore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdCommessa($value){
		$sql = 'DELETE FROM fasi WHERE id_commessa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumFase($value){
		$sql = 'DELETE FROM fasi WHERE num_fase = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumLinea($value){
		$sql = 'DELETE FROM fasi WHERE num_linea = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOraInizio($value){
		$sql = 'DELETE FROM fasi WHERE ora_inizio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOraFine($value){
		$sql = 'DELETE FROM fasi WHERE ora_fine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return FasiMySql 
	 */
	protected function readRow($row){
		$fasi = new Fasi();
		
		$fasi->idFase = $row['id_fase'];
		$fasi->descrizione = $row['descrizione'];
		$fasi->codiceInternoProdotto = $row['codice_interno_prodotto'];
		$fasi->grUm = $row['gr_um'];
		$fasi->grSec = $row['gr_sec'];
		$fasi->velocita = $row['velocita'];
		$fasi->tempForno = $row['temp_forno'];
		$fasi->viscosita = $row['viscosita'];
		$fasi->fogli = $row['fogli'];
		$fasi->corpi = $row['corpi'];
		$fasi->copFon = $row['cop_fon'];
		$fasi->caps = $row['caps'];
		$fasi->tappi = $row['tappi'];
		$fasi->altro = $row['altro'];
		$fasi->operatore = $row['operatore'];
		$fasi->idCommessa = $row['id_commessa'];
		$fasi->numFase = $row['num_fase'];
		$fasi->numLinea = $row['num_linea'];
		$fasi->oraInizio = $row['ora_inizio'];
		$fasi->oraFine = $row['ora_fine'];

		return $fasi;
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
	 * @return FasiMySql 
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
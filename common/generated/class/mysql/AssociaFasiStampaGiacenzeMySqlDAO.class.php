<?php
/**
 * Class that operate on table 'associa_fasi_stampa_giacenze'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class AssociaFasiStampaGiacenzeMySqlDAO implements AssociaFasiStampaGiacenzeDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AssociaFasiStampaGiacenzeMySql 
	 */
	public function load($idProdottoInGiacenza, $idFaseStampa){
		$sql = 'SELECT * FROM associa_fasi_stampa_giacenze WHERE id_prodotto_in_giacenza = ?  AND id_fase_stampa = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idProdottoInGiacenza);
		$sqlQuery->setNumber($idFaseStampa);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM associa_fasi_stampa_giacenze';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM associa_fasi_stampa_giacenze ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param associaFasiStampaGiacenze primary key
 	 */
	public function delete($idProdottoInGiacenza, $idFaseStampa){
		$sql = 'DELETE FROM associa_fasi_stampa_giacenze WHERE id_prodotto_in_giacenza = ?  AND id_fase_stampa = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idProdottoInGiacenza);
		$sqlQuery->setNumber($idFaseStampa);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AssociaFasiStampaGiacenzeMySql associaFasiStampaGiacenze
 	 */
	public function insert($associaFasiStampaGiacenze){
		$sql = 'INSERT INTO associa_fasi_stampa_giacenze (num_fogli, controllo_1, controllo_2, note, verificatore, data_ora, id_scheda_produzione, num_fogli_ingresso, id_prodotto_in_giacenza, id_fase_stampa) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($associaFasiStampaGiacenze->numFogli);
		$sqlQuery->set($associaFasiStampaGiacenze->controllo1);
		$sqlQuery->set($associaFasiStampaGiacenze->controllo2);
		$sqlQuery->set($associaFasiStampaGiacenze->note);
		$sqlQuery->set($associaFasiStampaGiacenze->verificatore);
		$sqlQuery->set($associaFasiStampaGiacenze->dataOra);
		$sqlQuery->setNumber($associaFasiStampaGiacenze->idSchedaProduzione);
		$sqlQuery->setNumber($associaFasiStampaGiacenze->numFogliIngresso);

		
		$sqlQuery->setNumber($associaFasiStampaGiacenze->idProdottoInGiacenza);

		$sqlQuery->setNumber($associaFasiStampaGiacenze->idFaseStampa);

		$this->executeInsert($sqlQuery);	
		//$associaFasiStampaGiacenze->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AssociaFasiStampaGiacenzeMySql associaFasiStampaGiacenze
 	 */
	public function update($associaFasiStampaGiacenze){
		$sql = 'UPDATE associa_fasi_stampa_giacenze SET num_fogli = ?, controllo_1 = ?, controllo_2 = ?, note = ?, verificatore = ?, data_ora = ?, id_scheda_produzione = ?, num_fogli_ingresso = ? WHERE id_prodotto_in_giacenza = ?  AND id_fase_stampa = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($associaFasiStampaGiacenze->numFogli);
		$sqlQuery->set($associaFasiStampaGiacenze->controllo1);
		$sqlQuery->set($associaFasiStampaGiacenze->controllo2);
		$sqlQuery->set($associaFasiStampaGiacenze->note);
		$sqlQuery->set($associaFasiStampaGiacenze->verificatore);
		$sqlQuery->set($associaFasiStampaGiacenze->dataOra);
		$sqlQuery->setNumber($associaFasiStampaGiacenze->idSchedaProduzione);
		$sqlQuery->setNumber($associaFasiStampaGiacenze->numFogliIngresso);

		
		$sqlQuery->setNumber($associaFasiStampaGiacenze->idProdottoInGiacenza);

		$sqlQuery->setNumber($associaFasiStampaGiacenze->idFaseStampa);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM associa_fasi_stampa_giacenze';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNumFogli($value){
		$sql = 'SELECT * FROM associa_fasi_stampa_giacenze WHERE num_fogli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByControllo1($value){
		$sql = 'SELECT * FROM associa_fasi_stampa_giacenze WHERE controllo_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByControllo2($value){
		$sql = 'SELECT * FROM associa_fasi_stampa_giacenze WHERE controllo_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM associa_fasi_stampa_giacenze WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVerificatore($value){
		$sql = 'SELECT * FROM associa_fasi_stampa_giacenze WHERE verificatore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataOra($value){
		$sql = 'SELECT * FROM associa_fasi_stampa_giacenze WHERE data_ora = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdSchedaProduzione($value){
		$sql = 'SELECT * FROM associa_fasi_stampa_giacenze WHERE id_scheda_produzione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumFogliIngresso($value){
		$sql = 'SELECT * FROM associa_fasi_stampa_giacenze WHERE num_fogli_ingresso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNumFogli($value){
		$sql = 'DELETE FROM associa_fasi_stampa_giacenze WHERE num_fogli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByControllo1($value){
		$sql = 'DELETE FROM associa_fasi_stampa_giacenze WHERE controllo_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByControllo2($value){
		$sql = 'DELETE FROM associa_fasi_stampa_giacenze WHERE controllo_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM associa_fasi_stampa_giacenze WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVerificatore($value){
		$sql = 'DELETE FROM associa_fasi_stampa_giacenze WHERE verificatore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataOra($value){
		$sql = 'DELETE FROM associa_fasi_stampa_giacenze WHERE data_ora = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSchedaProduzione($value){
		$sql = 'DELETE FROM associa_fasi_stampa_giacenze WHERE id_scheda_produzione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumFogliIngresso($value){
		$sql = 'DELETE FROM associa_fasi_stampa_giacenze WHERE num_fogli_ingresso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AssociaFasiStampaGiacenzeMySql 
	 */
	protected function readRow($row){
		$associaFasiStampaGiacenze = new AssociaFasiStampaGiacenze();
		
		$associaFasiStampaGiacenze->idProdottoInGiacenza = $row['id_prodotto_in_giacenza'];
		$associaFasiStampaGiacenze->idFaseStampa = $row['id_fase_stampa'];
		$associaFasiStampaGiacenze->numFogli = $row['num_fogli'];
		$associaFasiStampaGiacenze->controllo1 = $row['controllo_1'];
		$associaFasiStampaGiacenze->controllo2 = $row['controllo_2'];
		$associaFasiStampaGiacenze->note = $row['note'];
		$associaFasiStampaGiacenze->verificatore = $row['verificatore'];
		$associaFasiStampaGiacenze->dataOra = $row['data_ora'];
		$associaFasiStampaGiacenze->idSchedaProduzione = $row['id_scheda_produzione'];
		$associaFasiStampaGiacenze->numFogliIngresso = $row['num_fogli_ingresso'];

		return $associaFasiStampaGiacenze;
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
	 * @return AssociaFasiStampaGiacenzeMySql 
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
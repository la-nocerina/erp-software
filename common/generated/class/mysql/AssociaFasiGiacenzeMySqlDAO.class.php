<?php
/**
 * Class that operate on table 'associa_fasi_giacenze'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class AssociaFasiGiacenzeMySqlDAO implements AssociaFasiGiacenzeDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AssociaFasiGiacenzeMySql 
	 */
	public function load($idProdottoInGiacenza, $idFase){
		$sql = 'SELECT * FROM associa_fasi_giacenze WHERE id_prodotto_in_giacenza = ?  AND id_fase = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idProdottoInGiacenza);
		$sqlQuery->setNumber($idFase);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM associa_fasi_giacenze';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM associa_fasi_giacenze ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param associaFasiGiacenze primary key
 	 */
	public function delete($idProdottoInGiacenza, $idFase){
		$sql = 'DELETE FROM associa_fasi_giacenze WHERE id_prodotto_in_giacenza = ?  AND id_fase = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idProdottoInGiacenza);
		$sqlQuery->setNumber($idFase);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AssociaFasiGiacenzeMySql associaFasiGiacenze
 	 */
	public function insert($associaFasiGiacenze){
		$sql = 'INSERT INTO associa_fasi_giacenze (num_fogli, controllo_1, controllo_2, note, verificatore, data_ora, id_scheda_produzione, num_fogli_ingresso, id_prodotto_in_giacenza, id_fase) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($associaFasiGiacenze->numFogli);
		$sqlQuery->set($associaFasiGiacenze->controllo1);
		$sqlQuery->set($associaFasiGiacenze->controllo2);
		$sqlQuery->set($associaFasiGiacenze->note);
		$sqlQuery->set($associaFasiGiacenze->verificatore);
		$sqlQuery->set($associaFasiGiacenze->dataOra);
		$sqlQuery->setNumber($associaFasiGiacenze->idSchedaProduzione);
		$sqlQuery->setNumber($associaFasiGiacenze->numFogliIngresso);

		
		$sqlQuery->setNumber($associaFasiGiacenze->idProdottoInGiacenza);

		$sqlQuery->setNumber($associaFasiGiacenze->idFase);

		$this->executeInsert($sqlQuery);	
		//$associaFasiGiacenze->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AssociaFasiGiacenzeMySql associaFasiGiacenze
 	 */
	public function update($associaFasiGiacenze){
		$sql = 'UPDATE associa_fasi_giacenze SET num_fogli = ?, controllo_1 = ?, controllo_2 = ?, note = ?, verificatore = ?, data_ora = ?, id_scheda_produzione = ?, num_fogli_ingresso = ? WHERE id_prodotto_in_giacenza = ?  AND id_fase = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($associaFasiGiacenze->numFogli);
		$sqlQuery->set($associaFasiGiacenze->controllo1);
		$sqlQuery->set($associaFasiGiacenze->controllo2);
		$sqlQuery->set($associaFasiGiacenze->note);
		$sqlQuery->set($associaFasiGiacenze->verificatore);
		$sqlQuery->set($associaFasiGiacenze->dataOra);
		$sqlQuery->setNumber($associaFasiGiacenze->idSchedaProduzione);
		$sqlQuery->setNumber($associaFasiGiacenze->numFogliIngresso);

		
		$sqlQuery->setNumber($associaFasiGiacenze->idProdottoInGiacenza);

		$sqlQuery->setNumber($associaFasiGiacenze->idFase);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM associa_fasi_giacenze';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNumFogli($value){
		$sql = 'SELECT * FROM associa_fasi_giacenze WHERE num_fogli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByControllo1($value){
		$sql = 'SELECT * FROM associa_fasi_giacenze WHERE controllo_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByControllo2($value){
		$sql = 'SELECT * FROM associa_fasi_giacenze WHERE controllo_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM associa_fasi_giacenze WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVerificatore($value){
		$sql = 'SELECT * FROM associa_fasi_giacenze WHERE verificatore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataOra($value){
		$sql = 'SELECT * FROM associa_fasi_giacenze WHERE data_ora = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdSchedaProduzione($value){
		$sql = 'SELECT * FROM associa_fasi_giacenze WHERE id_scheda_produzione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumFogliIngresso($value){
		$sql = 'SELECT * FROM associa_fasi_giacenze WHERE num_fogli_ingresso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNumFogli($value){
		$sql = 'DELETE FROM associa_fasi_giacenze WHERE num_fogli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByControllo1($value){
		$sql = 'DELETE FROM associa_fasi_giacenze WHERE controllo_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByControllo2($value){
		$sql = 'DELETE FROM associa_fasi_giacenze WHERE controllo_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM associa_fasi_giacenze WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVerificatore($value){
		$sql = 'DELETE FROM associa_fasi_giacenze WHERE verificatore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataOra($value){
		$sql = 'DELETE FROM associa_fasi_giacenze WHERE data_ora = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSchedaProduzione($value){
		$sql = 'DELETE FROM associa_fasi_giacenze WHERE id_scheda_produzione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumFogliIngresso($value){
		$sql = 'DELETE FROM associa_fasi_giacenze WHERE num_fogli_ingresso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AssociaFasiGiacenzeMySql 
	 */
	protected function readRow($row){
		$associaFasiGiacenze = new AssociaFasiGiacenze();
		
		$associaFasiGiacenze->idProdottoInGiacenza = $row['id_prodotto_in_giacenza'];
		$associaFasiGiacenze->idFase = $row['id_fase'];
		$associaFasiGiacenze->numFogli = $row['num_fogli'];
		$associaFasiGiacenze->controllo1 = $row['controllo_1'];
		$associaFasiGiacenze->controllo2 = $row['controllo_2'];
		$associaFasiGiacenze->note = $row['note'];
		$associaFasiGiacenze->verificatore = $row['verificatore'];
		$associaFasiGiacenze->dataOra = $row['data_ora'];
		$associaFasiGiacenze->idSchedaProduzione = $row['id_scheda_produzione'];
		$associaFasiGiacenze->numFogliIngresso = $row['num_fogli_ingresso'];

		return $associaFasiGiacenze;
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
	 * @return AssociaFasiGiacenzeMySql 
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
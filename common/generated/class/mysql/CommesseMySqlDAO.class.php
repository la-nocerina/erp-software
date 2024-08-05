<?php
/**
 * Class that operate on table 'commesse'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class CommesseMySqlDAO implements CommesseDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CommesseMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM commesse WHERE id_commessa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM commesse';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM commesse ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param commesse primary key
 	 */
	public function delete($id_commessa){
		$sql = 'DELETE FROM commesse WHERE id_commessa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_commessa);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CommesseMySql commesse
 	 */
	public function insert($commesse){
		$sql = 'INSERT INTO commesse (id_partner, marca, ddt_n, data_ddt, colli, kg, num_fogli, resa, rif_conf_num, data_conf, num_fasi_lavoro, formato, totale, note) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($commesse->idPartner);
		$sqlQuery->set($commesse->marca);
		$sqlQuery->set($commesse->ddtN);
		$sqlQuery->set($commesse->dataDdt);
		$sqlQuery->setNumber($commesse->colli);
		$sqlQuery->setNumber($commesse->kg);
		$sqlQuery->setNumber($commesse->numFogli);
		$sqlQuery->set($commesse->resa);
		$sqlQuery->set($commesse->rifConfNum);
		$sqlQuery->set($commesse->dataConf);
		$sqlQuery->setNumber($commesse->numFasiLavoro);
		$sqlQuery->set($commesse->formato);
		$sqlQuery->set($commesse->totale);
		$sqlQuery->set($commesse->note);

		$id = $this->executeInsert($sqlQuery);	
		$commesse->idCommessa = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CommesseMySql commesse
 	 */
	public function update($commesse){
		$sql = 'UPDATE commesse SET id_partner = ?, marca = ?, ddt_n = ?, data_ddt = ?, colli = ?, kg = ?, num_fogli = ?, resa = ?, rif_conf_num = ?, data_conf = ?, num_fasi_lavoro = ?, formato = ?, totale = ?, note = ? WHERE id_commessa = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($commesse->idPartner);
		$sqlQuery->set($commesse->marca);
		$sqlQuery->set($commesse->ddtN);
		$sqlQuery->set($commesse->dataDdt);
		$sqlQuery->setNumber($commesse->colli);
		$sqlQuery->setNumber($commesse->kg);
		$sqlQuery->setNumber($commesse->numFogli);
		$sqlQuery->set($commesse->resa);
		$sqlQuery->set($commesse->rifConfNum);
		$sqlQuery->set($commesse->dataConf);
		$sqlQuery->setNumber($commesse->numFasiLavoro);
		$sqlQuery->set($commesse->formato);
		$sqlQuery->set($commesse->totale);
		$sqlQuery->set($commesse->note);

		$sqlQuery->setNumber($commesse->idCommessa);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM commesse';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdPartner($value){
		$sql = 'SELECT * FROM commesse WHERE id_partner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMarca($value){
		$sql = 'SELECT * FROM commesse WHERE marca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDdtN($value){
		$sql = 'SELECT * FROM commesse WHERE ddt_n = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataDdt($value){
		$sql = 'SELECT * FROM commesse WHERE data_ddt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByColli($value){
		$sql = 'SELECT * FROM commesse WHERE colli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByKg($value){
		$sql = 'SELECT * FROM commesse WHERE kg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumFogli($value){
		$sql = 'SELECT * FROM commesse WHERE num_fogli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByResa($value){
		$sql = 'SELECT * FROM commesse WHERE resa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRifConfNum($value){
		$sql = 'SELECT * FROM commesse WHERE rif_conf_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataConf($value){
		$sql = 'SELECT * FROM commesse WHERE data_conf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumFasiLavoro($value){
		$sql = 'SELECT * FROM commesse WHERE num_fasi_lavoro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFormato($value){
		$sql = 'SELECT * FROM commesse WHERE formato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotale($value){
		$sql = 'SELECT * FROM commesse WHERE totale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM commesse WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdPartner($value){
		$sql = 'DELETE FROM commesse WHERE id_partner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMarca($value){
		$sql = 'DELETE FROM commesse WHERE marca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDdtN($value){
		$sql = 'DELETE FROM commesse WHERE ddt_n = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataDdt($value){
		$sql = 'DELETE FROM commesse WHERE data_ddt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByColli($value){
		$sql = 'DELETE FROM commesse WHERE colli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKg($value){
		$sql = 'DELETE FROM commesse WHERE kg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumFogli($value){
		$sql = 'DELETE FROM commesse WHERE num_fogli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByResa($value){
		$sql = 'DELETE FROM commesse WHERE resa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRifConfNum($value){
		$sql = 'DELETE FROM commesse WHERE rif_conf_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataConf($value){
		$sql = 'DELETE FROM commesse WHERE data_conf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumFasiLavoro($value){
		$sql = 'DELETE FROM commesse WHERE num_fasi_lavoro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFormato($value){
		$sql = 'DELETE FROM commesse WHERE formato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotale($value){
		$sql = 'DELETE FROM commesse WHERE totale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM commesse WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CommesseMySql 
	 */
	protected function readRow($row){
		$commesse = new Commesse();
		
		$commesse->idCommessa = $row['id_commessa'];
		$commesse->idPartner = $row['id_partner'];
		$commesse->marca = $row['marca'];
		$commesse->ddtN = $row['ddt_n'];
		$commesse->dataDdt = $row['data_ddt'];
		$commesse->colli = $row['colli'];
		$commesse->kg = $row['kg'];
		$commesse->numFogli = $row['num_fogli'];
		$commesse->resa = $row['resa'];
		$commesse->rifConfNum = $row['rif_conf_num'];
		$commesse->dataConf = $row['data_conf'];
		$commesse->numFasiLavoro = $row['num_fasi_lavoro'];
		$commesse->formato = $row['formato'];
		$commesse->totale = $row['totale'];
		$commesse->note = $row['note'];

		return $commesse;
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
	 * @return CommesseMySql 
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
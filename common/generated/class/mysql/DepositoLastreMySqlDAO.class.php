<?php
/**
 * Class that operate on table 'deposito_lastre'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class DepositoLastreMySqlDAO implements DepositoLastreDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DepositoLastreMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM deposito_lastre WHERE id_deposito_lastre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM deposito_lastre';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM deposito_lastre ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param depositoLastre primary key
 	 */
	public function delete($id_deposito_lastre){
		$sql = 'DELETE FROM deposito_lastre WHERE id_deposito_lastre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_deposito_lastre);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DepositoLastreMySql depositoLastre
 	 */
	public function insert($depositoLastre){
		$sql = 'INSERT INTO deposito_lastre (id_partner, nome_lavoro, num_lastre, colori, firma, da_rifare, data) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($depositoLastre->idPartner);
		$sqlQuery->set($depositoLastre->nomeLavoro);
		$sqlQuery->setNumber($depositoLastre->numLastre);
		$sqlQuery->set($depositoLastre->colori);
		$sqlQuery->set($depositoLastre->firma);
		$sqlQuery->set($depositoLastre->daRifare);
		$sqlQuery->set($depositoLastre->data);

		$id = $this->executeInsert($sqlQuery);	
		$depositoLastre->idDepositoLastre = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DepositoLastreMySql depositoLastre
 	 */
	public function update($depositoLastre){
		$sql = 'UPDATE deposito_lastre SET id_partner = ?, nome_lavoro = ?, num_lastre = ?, colori = ?, firma = ?, da_rifare = ?, data = ? WHERE id_deposito_lastre = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($depositoLastre->idPartner);
		$sqlQuery->set($depositoLastre->nomeLavoro);
		$sqlQuery->setNumber($depositoLastre->numLastre);
		$sqlQuery->set($depositoLastre->colori);
		$sqlQuery->set($depositoLastre->firma);
		$sqlQuery->set($depositoLastre->daRifare);
		$sqlQuery->set($depositoLastre->data);

		$sqlQuery->setNumber($depositoLastre->idDepositoLastre);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM deposito_lastre';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdPartner($value){
		$sql = 'SELECT * FROM deposito_lastre WHERE id_partner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNomeLavoro($value){
		$sql = 'SELECT * FROM deposito_lastre WHERE nome_lavoro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumLastre($value){
		$sql = 'SELECT * FROM deposito_lastre WHERE num_lastre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByColori($value){
		$sql = 'SELECT * FROM deposito_lastre WHERE colori = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFirma($value){
		$sql = 'SELECT * FROM deposito_lastre WHERE firma = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDaRifare($value){
		$sql = 'SELECT * FROM deposito_lastre WHERE da_rifare = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM deposito_lastre WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdPartner($value){
		$sql = 'DELETE FROM deposito_lastre WHERE id_partner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNomeLavoro($value){
		$sql = 'DELETE FROM deposito_lastre WHERE nome_lavoro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumLastre($value){
		$sql = 'DELETE FROM deposito_lastre WHERE num_lastre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByColori($value){
		$sql = 'DELETE FROM deposito_lastre WHERE colori = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFirma($value){
		$sql = 'DELETE FROM deposito_lastre WHERE firma = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDaRifare($value){
		$sql = 'DELETE FROM deposito_lastre WHERE da_rifare = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM deposito_lastre WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DepositoLastreMySql 
	 */
	protected function readRow($row){
		$depositoLastre = new DepositoLastre();
		
		$depositoLastre->idDepositoLastre = $row['id_deposito_lastre'];
		$depositoLastre->idPartner = $row['id_partner'];
		$depositoLastre->nomeLavoro = $row['nome_lavoro'];
		$depositoLastre->numLastre = $row['num_lastre'];
		$depositoLastre->colori = $row['colori'];
		$depositoLastre->firma = $row['firma'];
		$depositoLastre->daRifare = $row['da_rifare'];
		$depositoLastre->data = $row['data'];

		return $depositoLastre;
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
	 * @return DepositoLastreMySql 
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
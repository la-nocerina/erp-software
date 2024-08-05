<?php
/**
 * Class that operate on table 'gruppi_partner'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class GruppiPartnerMySqlDAO implements GruppiPartnerDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return GruppiPartnerMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM gruppi_partner WHERE id_gruppo_partner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM gruppi_partner';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM gruppi_partner ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param gruppiPartner primary key
 	 */
	public function delete($id_gruppo_partner){
		$sql = 'DELETE FROM gruppi_partner WHERE id_gruppo_partner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_gruppo_partner);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param GruppiPartnerMySql gruppiPartner
 	 */
	public function insert($gruppiPartner){
		$sql = 'INSERT INTO gruppi_partner (nome) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($gruppiPartner->nome);

		$id = $this->executeInsert($sqlQuery);	
		$gruppiPartner->idGruppoPartner = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param GruppiPartnerMySql gruppiPartner
 	 */
	public function update($gruppiPartner){
		$sql = 'UPDATE gruppi_partner SET nome = ? WHERE id_gruppo_partner = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($gruppiPartner->nome);

		$sqlQuery->setNumber($gruppiPartner->idGruppoPartner);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM gruppi_partner';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM gruppi_partner WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM gruppi_partner WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return GruppiPartnerMySql 
	 */
	protected function readRow($row){
		$gruppiPartner = new GruppiPartner();
		
		$gruppiPartner->idGruppoPartner = $row['id_gruppo_partner'];
		$gruppiPartner->nome = $row['nome'];

		return $gruppiPartner;
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
	 * @return GruppiPartnerMySql 
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
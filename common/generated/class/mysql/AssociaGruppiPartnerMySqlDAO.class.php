<?php
/**
 * Class that operate on table 'associa_gruppi_partner'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class AssociaGruppiPartnerMySqlDAO implements AssociaGruppiPartnerDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AssociaGruppiPartnerMySql 
	 */
	public function load($idPartner, $idGruppoPartner){
		$sql = 'SELECT * FROM associa_gruppi_partner WHERE id_partner = ?  AND id_gruppo_partner = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idPartner);
		$sqlQuery->setNumber($idGruppoPartner);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM associa_gruppi_partner';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM associa_gruppi_partner ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param associaGruppiPartner primary key
 	 */
	public function delete($idPartner, $idGruppoPartner){
		$sql = 'DELETE FROM associa_gruppi_partner WHERE id_partner = ?  AND id_gruppo_partner = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idPartner);
		$sqlQuery->setNumber($idGruppoPartner);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AssociaGruppiPartnerMySql associaGruppiPartner
 	 */
	public function insert($associaGruppiPartner){
		$sql = 'INSERT INTO associa_gruppi_partner ( id_partner, id_gruppo_partner) VALUES ( ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($associaGruppiPartner->idPartner);

		$sqlQuery->setNumber($associaGruppiPartner->idGruppoPartner);

		$this->executeInsert($sqlQuery);	
		//$associaGruppiPartner->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AssociaGruppiPartnerMySql associaGruppiPartner
 	 */
	public function update($associaGruppiPartner){
		$sql = 'UPDATE associa_gruppi_partner SET  WHERE id_partner = ?  AND id_gruppo_partner = ? ';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($associaGruppiPartner->idPartner);

		$sqlQuery->setNumber($associaGruppiPartner->idGruppoPartner);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM associa_gruppi_partner';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}



	
	/**
	 * Read row
	 *
	 * @return AssociaGruppiPartnerMySql 
	 */
	protected function readRow($row){
		$associaGruppiPartner = new AssociaGruppiPartner();
		
		$associaGruppiPartner->idPartner = $row['id_partner'];
		$associaGruppiPartner->idGruppoPartner = $row['id_gruppo_partner'];

		return $associaGruppiPartner;
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
	 * @return AssociaGruppiPartnerMySql 
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
<?php
/**
 * Class that operate on table 'partner_reference'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class PartnerReferenceMySqlDAO implements PartnerReferenceDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PartnerReferenceMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM partner_reference WHERE id_partner_reference = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM partner_reference';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM partner_reference ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param partnerReference primary key
 	 */
	public function delete($id_partner_reference){
		$sql = 'DELETE FROM partner_reference WHERE id_partner_reference = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_partner_reference);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PartnerReferenceMySql partnerReference
 	 */
	public function insert($partnerReference){
		$sql = 'INSERT INTO partner_reference (nome, cognome, telefono, mobile, email, id_partner) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($partnerReference->nome);
		$sqlQuery->set($partnerReference->cognome);
		$sqlQuery->set($partnerReference->telefono);
		$sqlQuery->set($partnerReference->mobile);
		$sqlQuery->set($partnerReference->email);
		$sqlQuery->setNumber($partnerReference->idPartner);

		$id = $this->executeInsert($sqlQuery);	
		$partnerReference->idPartnerReference = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PartnerReferenceMySql partnerReference
 	 */
	public function update($partnerReference){
		$sql = 'UPDATE partner_reference SET nome = ?, cognome = ?, telefono = ?, mobile = ?, email = ?, id_partner = ? WHERE id_partner_reference = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($partnerReference->nome);
		$sqlQuery->set($partnerReference->cognome);
		$sqlQuery->set($partnerReference->telefono);
		$sqlQuery->set($partnerReference->mobile);
		$sqlQuery->set($partnerReference->email);
		$sqlQuery->setNumber($partnerReference->idPartner);

		$sqlQuery->setNumber($partnerReference->idPartnerReference);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM partner_reference';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM partner_reference WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCognome($value){
		$sql = 'SELECT * FROM partner_reference WHERE cognome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefono($value){
		$sql = 'SELECT * FROM partner_reference WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMobile($value){
		$sql = 'SELECT * FROM partner_reference WHERE mobile = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM partner_reference WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdPartner($value){
		$sql = 'SELECT * FROM partner_reference WHERE id_partner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM partner_reference WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCognome($value){
		$sql = 'DELETE FROM partner_reference WHERE cognome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefono($value){
		$sql = 'DELETE FROM partner_reference WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMobile($value){
		$sql = 'DELETE FROM partner_reference WHERE mobile = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM partner_reference WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdPartner($value){
		$sql = 'DELETE FROM partner_reference WHERE id_partner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PartnerReferenceMySql 
	 */
	protected function readRow($row){
		$partnerReference = new PartnerReference();
		
		$partnerReference->idPartnerReference = $row['id_partner_reference'];
		$partnerReference->nome = $row['nome'];
		$partnerReference->cognome = $row['cognome'];
		$partnerReference->telefono = $row['telefono'];
		$partnerReference->mobile = $row['mobile'];
		$partnerReference->email = $row['email'];
		$partnerReference->idPartner = $row['id_partner'];

		return $partnerReference;
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
	 * @return PartnerReferenceMySql 
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
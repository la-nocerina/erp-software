<?php
/**
 * Class that operate on table 'prelievo_lastre'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class PrelievoLastreMySqlDAO implements PrelievoLastreDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PrelievoLastreMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM prelievo_lastre WHERE id_prelievo_lastre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM prelievo_lastre';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM prelievo_lastre ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param prelievoLastre primary key
 	 */
	public function delete($id_prelievo_lastre){
		$sql = 'DELETE FROM prelievo_lastre WHERE id_prelievo_lastre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_prelievo_lastre);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PrelievoLastreMySql prelievoLastre
 	 */
	public function insert($prelievoLastre){
		$sql = 'INSERT INTO prelievo_lastre (id_partner, nome_lavoro, num_lastre, colori, firma, data) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($prelievoLastre->idPartner);
		$sqlQuery->set($prelievoLastre->nomeLavoro);
		$sqlQuery->setNumber($prelievoLastre->numLastre);
		$sqlQuery->set($prelievoLastre->colori);
		$sqlQuery->set($prelievoLastre->firma);
		$sqlQuery->set($prelievoLastre->data);

		$id = $this->executeInsert($sqlQuery);	
		$prelievoLastre->idPrelievoLastre = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PrelievoLastreMySql prelievoLastre
 	 */
	public function update($prelievoLastre){
		$sql = 'UPDATE prelievo_lastre SET id_partner = ?, nome_lavoro = ?, num_lastre = ?, colori = ?, firma = ?, data = ? WHERE id_prelievo_lastre = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($prelievoLastre->idPartner);
		$sqlQuery->set($prelievoLastre->nomeLavoro);
		$sqlQuery->setNumber($prelievoLastre->numLastre);
		$sqlQuery->set($prelievoLastre->colori);
		$sqlQuery->set($prelievoLastre->firma);
		$sqlQuery->set($prelievoLastre->data);

		$sqlQuery->setNumber($prelievoLastre->idPrelievoLastre);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM prelievo_lastre';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdPartner($value){
		$sql = 'SELECT * FROM prelievo_lastre WHERE id_partner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNomeLavoro($value){
		$sql = 'SELECT * FROM prelievo_lastre WHERE nome_lavoro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumLastre($value){
		$sql = 'SELECT * FROM prelievo_lastre WHERE num_lastre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByColori($value){
		$sql = 'SELECT * FROM prelievo_lastre WHERE colori = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFirma($value){
		$sql = 'SELECT * FROM prelievo_lastre WHERE firma = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM prelievo_lastre WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdPartner($value){
		$sql = 'DELETE FROM prelievo_lastre WHERE id_partner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNomeLavoro($value){
		$sql = 'DELETE FROM prelievo_lastre WHERE nome_lavoro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumLastre($value){
		$sql = 'DELETE FROM prelievo_lastre WHERE num_lastre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByColori($value){
		$sql = 'DELETE FROM prelievo_lastre WHERE colori = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFirma($value){
		$sql = 'DELETE FROM prelievo_lastre WHERE firma = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM prelievo_lastre WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PrelievoLastreMySql 
	 */
	protected function readRow($row){
		$prelievoLastre = new PrelievoLastre();
		
		$prelievoLastre->idPrelievoLastre = $row['id_prelievo_lastre'];
		$prelievoLastre->idPartner = $row['id_partner'];
		$prelievoLastre->nomeLavoro = $row['nome_lavoro'];
		$prelievoLastre->numLastre = $row['num_lastre'];
		$prelievoLastre->colori = $row['colori'];
		$prelievoLastre->firma = $row['firma'];
		$prelievoLastre->data = $row['data'];

		return $prelievoLastre;
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
	 * @return PrelievoLastreMySql 
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
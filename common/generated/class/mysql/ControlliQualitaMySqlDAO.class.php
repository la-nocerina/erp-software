<?php
/**
 * Class that operate on table 'controlli_qualita'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class ControlliQualitaMySqlDAO implements ControlliQualitaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ControlliQualitaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM controlli_qualita WHERE id_controlli_qualita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM controlli_qualita';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM controlli_qualita ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param controlliQualita primary key
 	 */
	public function delete($id_controlli_qualita){
		$sql = 'DELETE FROM controlli_qualita WHERE id_controlli_qualita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_controlli_qualita);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ControlliQualitaMySql controlliQualita
 	 */
	public function insert($controlliQualita){
		$sql = 'INSERT INTO controlli_qualita (id_partner, ddt_n, data_ddt, num_colli, kg, num_ferriera, tipo, txt_corpi, operatore, r_laboratorio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($controlliQualita->idPartner);
		$sqlQuery->set($controlliQualita->ddtN);
		$sqlQuery->set($controlliQualita->dataDdt);
		$sqlQuery->setNumber($controlliQualita->numColli);
		$sqlQuery->set($controlliQualita->kg);
		$sqlQuery->set($controlliQualita->numFerriera);
		$sqlQuery->set($controlliQualita->tipo);
		$sqlQuery->set($controlliQualita->txtCorpi);
		$sqlQuery->set($controlliQualita->operatore);
		$sqlQuery->set($controlliQualita->rLaboratorio);

		$id = $this->executeInsert($sqlQuery);	
		$controlliQualita->idControlliQualita = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ControlliQualitaMySql controlliQualita
 	 */
	public function update($controlliQualita){
		$sql = 'UPDATE controlli_qualita SET id_partner = ?, ddt_n = ?, data_ddt = ?, num_colli = ?, kg = ?, num_ferriera = ?, tipo = ?, txt_corpi = ?, operatore = ?, r_laboratorio = ? WHERE id_controlli_qualita = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($controlliQualita->idPartner);
		$sqlQuery->set($controlliQualita->ddtN);
		$sqlQuery->set($controlliQualita->dataDdt);
		$sqlQuery->setNumber($controlliQualita->numColli);
		$sqlQuery->set($controlliQualita->kg);
		$sqlQuery->set($controlliQualita->numFerriera);
		$sqlQuery->set($controlliQualita->tipo);
		$sqlQuery->set($controlliQualita->txtCorpi);
		$sqlQuery->set($controlliQualita->operatore);
		$sqlQuery->set($controlliQualita->rLaboratorio);

		$sqlQuery->setNumber($controlliQualita->idControlliQualita);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM controlli_qualita';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdPartner($value){
		$sql = 'SELECT * FROM controlli_qualita WHERE id_partner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDdtN($value){
		$sql = 'SELECT * FROM controlli_qualita WHERE ddt_n = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataDdt($value){
		$sql = 'SELECT * FROM controlli_qualita WHERE data_ddt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumColli($value){
		$sql = 'SELECT * FROM controlli_qualita WHERE num_colli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByKg($value){
		$sql = 'SELECT * FROM controlli_qualita WHERE kg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumFerriera($value){
		$sql = 'SELECT * FROM controlli_qualita WHERE num_ferriera = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipo($value){
		$sql = 'SELECT * FROM controlli_qualita WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTxtCorpi($value){
		$sql = 'SELECT * FROM controlli_qualita WHERE txt_corpi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOperatore($value){
		$sql = 'SELECT * FROM controlli_qualita WHERE operatore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRLaboratorio($value){
		$sql = 'SELECT * FROM controlli_qualita WHERE r_laboratorio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdPartner($value){
		$sql = 'DELETE FROM controlli_qualita WHERE id_partner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDdtN($value){
		$sql = 'DELETE FROM controlli_qualita WHERE ddt_n = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataDdt($value){
		$sql = 'DELETE FROM controlli_qualita WHERE data_ddt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumColli($value){
		$sql = 'DELETE FROM controlli_qualita WHERE num_colli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKg($value){
		$sql = 'DELETE FROM controlli_qualita WHERE kg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumFerriera($value){
		$sql = 'DELETE FROM controlli_qualita WHERE num_ferriera = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipo($value){
		$sql = 'DELETE FROM controlli_qualita WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTxtCorpi($value){
		$sql = 'DELETE FROM controlli_qualita WHERE txt_corpi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOperatore($value){
		$sql = 'DELETE FROM controlli_qualita WHERE operatore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRLaboratorio($value){
		$sql = 'DELETE FROM controlli_qualita WHERE r_laboratorio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ControlliQualitaMySql 
	 */
	protected function readRow($row){
		$controlliQualita = new ControlliQualita();
		
		$controlliQualita->idControlliQualita = $row['id_controlli_qualita'];
		$controlliQualita->idPartner = $row['id_partner'];
		$controlliQualita->ddtN = $row['ddt_n'];
		$controlliQualita->dataDdt = $row['data_ddt'];
		$controlliQualita->numColli = $row['num_colli'];
		$controlliQualita->kg = $row['kg'];
		$controlliQualita->numFerriera = $row['num_ferriera'];
		$controlliQualita->tipo = $row['tipo'];
		$controlliQualita->txtCorpi = $row['txt_corpi'];
		$controlliQualita->operatore = $row['operatore'];
		$controlliQualita->rLaboratorio = $row['r_laboratorio'];

		return $controlliQualita;
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
	 * @return ControlliQualitaMySql 
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
<?php
/**
 * Class that operate on table 'associa_giacenza_controllo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class AssociaGiacenzaControlloMySqlDAO implements AssociaGiacenzaControlloDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AssociaGiacenzaControlloMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM associa_giacenza_controllo WHERE id_associa_giacenza_controllo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM associa_giacenza_controllo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM associa_giacenza_controllo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param associaGiacenzaControllo primary key
 	 */
	public function delete($id_associa_giacenza_controllo){
		$sql = 'DELETE FROM associa_giacenza_controllo WHERE id_associa_giacenza_controllo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_associa_giacenza_controllo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AssociaGiacenzaControlloMySql associaGiacenzaControllo
 	 */
	public function insert($associaGiacenzaControllo){
		$sql = 'INSERT INTO associa_giacenza_controllo (id_controlli_qualita, id_prodotto_in_giacenza, copertura, peso, pacco, controllo_visivo, controllo_visivo_txt, note) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($associaGiacenzaControllo->idControlliQualita);
		$sqlQuery->setNumber($associaGiacenzaControllo->idProdottoInGiacenza);
		$sqlQuery->set($associaGiacenzaControllo->copertura);
		$sqlQuery->set($associaGiacenzaControllo->peso);
		$sqlQuery->set($associaGiacenzaControllo->pacco);
		$sqlQuery->set($associaGiacenzaControllo->controlloVisivo);
		$sqlQuery->set($associaGiacenzaControllo->controlloVisivoTxt);
		$sqlQuery->set($associaGiacenzaControllo->note);

		$id = $this->executeInsert($sqlQuery);	
		$associaGiacenzaControllo->idAssociaGiacenzaControllo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AssociaGiacenzaControlloMySql associaGiacenzaControllo
 	 */
	public function update($associaGiacenzaControllo){
		$sql = 'UPDATE associa_giacenza_controllo SET id_controlli_qualita = ?, id_prodotto_in_giacenza = ?, copertura = ?, peso = ?, pacco = ?, controllo_visivo = ?, controllo_visivo_txt = ?, note = ? WHERE id_associa_giacenza_controllo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($associaGiacenzaControllo->idControlliQualita);
		$sqlQuery->setNumber($associaGiacenzaControllo->idProdottoInGiacenza);
		$sqlQuery->set($associaGiacenzaControllo->copertura);
		$sqlQuery->set($associaGiacenzaControllo->peso);
		$sqlQuery->set($associaGiacenzaControllo->pacco);
		$sqlQuery->set($associaGiacenzaControllo->controlloVisivo);
		$sqlQuery->set($associaGiacenzaControllo->controlloVisivoTxt);
		$sqlQuery->set($associaGiacenzaControllo->note);

		$sqlQuery->setNumber($associaGiacenzaControllo->idAssociaGiacenzaControllo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM associa_giacenza_controllo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdControlliQualita($value){
		$sql = 'SELECT * FROM associa_giacenza_controllo WHERE id_controlli_qualita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdProdottoInGiacenza($value){
		$sql = 'SELECT * FROM associa_giacenza_controllo WHERE id_prodotto_in_giacenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCopertura($value){
		$sql = 'SELECT * FROM associa_giacenza_controllo WHERE copertura = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPeso($value){
		$sql = 'SELECT * FROM associa_giacenza_controllo WHERE peso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPacco($value){
		$sql = 'SELECT * FROM associa_giacenza_controllo WHERE pacco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByControlloVisivo($value){
		$sql = 'SELECT * FROM associa_giacenza_controllo WHERE controllo_visivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByControlloVisivoTxt($value){
		$sql = 'SELECT * FROM associa_giacenza_controllo WHERE controllo_visivo_txt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM associa_giacenza_controllo WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdControlliQualita($value){
		$sql = 'DELETE FROM associa_giacenza_controllo WHERE id_controlli_qualita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdProdottoInGiacenza($value){
		$sql = 'DELETE FROM associa_giacenza_controllo WHERE id_prodotto_in_giacenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCopertura($value){
		$sql = 'DELETE FROM associa_giacenza_controllo WHERE copertura = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPeso($value){
		$sql = 'DELETE FROM associa_giacenza_controllo WHERE peso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPacco($value){
		$sql = 'DELETE FROM associa_giacenza_controllo WHERE pacco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByControlloVisivo($value){
		$sql = 'DELETE FROM associa_giacenza_controllo WHERE controllo_visivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByControlloVisivoTxt($value){
		$sql = 'DELETE FROM associa_giacenza_controllo WHERE controllo_visivo_txt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM associa_giacenza_controllo WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AssociaGiacenzaControlloMySql 
	 */
	protected function readRow($row){
		$associaGiacenzaControllo = new AssociaGiacenzaControllo();
		
		$associaGiacenzaControllo->idAssociaGiacenzaControllo = $row['id_associa_giacenza_controllo'];
		$associaGiacenzaControllo->idControlliQualita = $row['id_controlli_qualita'];
		$associaGiacenzaControllo->idProdottoInGiacenza = $row['id_prodotto_in_giacenza'];
		$associaGiacenzaControllo->copertura = $row['copertura'];
		$associaGiacenzaControllo->peso = $row['peso'];
		$associaGiacenzaControllo->pacco = $row['pacco'];
		$associaGiacenzaControllo->controlloVisivo = $row['controllo_visivo'];
		$associaGiacenzaControllo->controlloVisivoTxt = $row['controllo_visivo_txt'];
		$associaGiacenzaControllo->note = $row['note'];

		return $associaGiacenzaControllo;
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
	 * @return AssociaGiacenzaControlloMySql 
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
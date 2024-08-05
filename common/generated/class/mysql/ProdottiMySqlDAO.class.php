<?php
/**
 * Class that operate on table 'prodotti'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class ProdottiMySqlDAO implements ProdottiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ProdottiMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM prodotti WHERE id_prodotto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM prodotti';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM prodotti ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param prodotti primary key
 	 */
	public function delete($id_prodotto){
		$sql = 'DELETE FROM prodotti WHERE id_prodotto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_prodotto);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProdottiMySql prodotti
 	 */
	public function insert($prodotti){
		$sql = 'INSERT INTO prodotti (codice_interno, descrizione, dettagli, id_unita_misura, id_categorie_prod, creato_il, aggiornato_il, is_attivo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($prodotti->codiceInterno);
		$sqlQuery->set($prodotti->descrizione);
		$sqlQuery->set($prodotti->dettagli);
		$sqlQuery->setNumber($prodotti->idUnitaMisura);
		$sqlQuery->setNumber($prodotti->idCategorieProd);
		$sqlQuery->set($prodotti->creatoIl);
		$sqlQuery->set($prodotti->aggiornatoIl);
		$sqlQuery->setNumber($prodotti->isAttivo);

		$id = $this->executeInsert($sqlQuery);	
		$prodotti->idProdotto = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProdottiMySql prodotti
 	 */
	public function update($prodotti){
		$sql = 'UPDATE prodotti SET codice_interno = ?, descrizione = ?, dettagli = ?, id_unita_misura = ?, id_categorie_prod = ?, creato_il = ?, aggiornato_il = ?, is_attivo = ? WHERE id_prodotto = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($prodotti->codiceInterno);
		$sqlQuery->set($prodotti->descrizione);
		$sqlQuery->set($prodotti->dettagli);
		$sqlQuery->setNumber($prodotti->idUnitaMisura);
		$sqlQuery->setNumber($prodotti->idCategorieProd);
		$sqlQuery->set($prodotti->creatoIl);
		$sqlQuery->set($prodotti->aggiornatoIl);
		$sqlQuery->setNumber($prodotti->isAttivo);

		$sqlQuery->setNumber($prodotti->idProdotto);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM prodotti';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodiceInterno($value){
		$sql = 'SELECT * FROM prodotti WHERE codice_interno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescrizione($value){
		$sql = 'SELECT * FROM prodotti WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDettagli($value){
		$sql = 'SELECT * FROM prodotti WHERE dettagli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdUnitaMisura($value){
		$sql = 'SELECT * FROM prodotti WHERE id_unita_misura = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdCategorieProd($value){
		$sql = 'SELECT * FROM prodotti WHERE id_categorie_prod = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatoIl($value){
		$sql = 'SELECT * FROM prodotti WHERE creato_il = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAggiornatoIl($value){
		$sql = 'SELECT * FROM prodotti WHERE aggiornato_il = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIsAttivo($value){
		$sql = 'SELECT * FROM prodotti WHERE is_attivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodiceInterno($value){
		$sql = 'DELETE FROM prodotti WHERE codice_interno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescrizione($value){
		$sql = 'DELETE FROM prodotti WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDettagli($value){
		$sql = 'DELETE FROM prodotti WHERE dettagli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdUnitaMisura($value){
		$sql = 'DELETE FROM prodotti WHERE id_unita_misura = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdCategorieProd($value){
		$sql = 'DELETE FROM prodotti WHERE id_categorie_prod = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatoIl($value){
		$sql = 'DELETE FROM prodotti WHERE creato_il = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAggiornatoIl($value){
		$sql = 'DELETE FROM prodotti WHERE aggiornato_il = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsAttivo($value){
		$sql = 'DELETE FROM prodotti WHERE is_attivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ProdottiMySql 
	 */
	protected function readRow($row){
		$prodotti = new Prodotti();
		
		$prodotti->idProdotto = $row['id_prodotto'];
		$prodotti->codiceInterno = $row['codice_interno'];
		$prodotti->descrizione = $row['descrizione'];
		$prodotti->dettagli = $row['dettagli'];
		$prodotti->idUnitaMisura = $row['id_unita_misura'];
		$prodotti->idCategorieProd = $row['id_categorie_prod'];
		$prodotti->creatoIl = $row['creato_il'];
		$prodotti->aggiornatoIl = $row['aggiornato_il'];
		$prodotti->isAttivo = $row['is_attivo'];

		return $prodotti;
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
	 * @return ProdottiMySql 
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
<?php
/**
 * Class that operate on table 'prodotti_in_giacenza'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class ProdottiInGiacenzaMySqlDAO implements ProdottiInGiacenzaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ProdottiInGiacenzaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM prodotti_in_giacenza WHERE id_prodotto_in_giacenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM prodotti_in_giacenza';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM prodotti_in_giacenza ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param prodottiInGiacenza primary key
 	 */
	public function delete($id_prodotto_in_giacenza){
		$sql = 'DELETE FROM prodotti_in_giacenza WHERE id_prodotto_in_giacenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_prodotto_in_giacenza);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProdottiInGiacenzaMySql prodottiInGiacenza
 	 */
	public function insert($prodottiInGiacenza){
		$sql = 'INSERT INTO prodotti_in_giacenza (id_prodotto, quantita, id_magazzino, id_prodotto_in_giacenza_padre, batch, uscita_ddt_n, uscita_data_ddt) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($prodottiInGiacenza->idProdotto);
		$sqlQuery->set($prodottiInGiacenza->quantita);
		$sqlQuery->setNumber($prodottiInGiacenza->idMagazzino);
		$sqlQuery->setNumber($prodottiInGiacenza->idProdottoInGiacenzaPadre);
		$sqlQuery->set($prodottiInGiacenza->batch);
		$sqlQuery->set($prodottiInGiacenza->uscitaDdtN);
		$sqlQuery->set($prodottiInGiacenza->uscitaDataDdt);

		$id = $this->executeInsert($sqlQuery);	
		$prodottiInGiacenza->idProdottoInGiacenza = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProdottiInGiacenzaMySql prodottiInGiacenza
 	 */
	public function update($prodottiInGiacenza){
		$sql = 'UPDATE prodotti_in_giacenza SET id_prodotto = ?, quantita = ?, id_magazzino = ?, id_prodotto_in_giacenza_padre = ?, batch = ?, uscita_ddt_n = ?, uscita_data_ddt = ? WHERE id_prodotto_in_giacenza = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($prodottiInGiacenza->idProdotto);
		$sqlQuery->set($prodottiInGiacenza->quantita);
		$sqlQuery->setNumber($prodottiInGiacenza->idMagazzino);
		$sqlQuery->setNumber($prodottiInGiacenza->idProdottoInGiacenzaPadre);
		$sqlQuery->set($prodottiInGiacenza->batch);
		$sqlQuery->set($prodottiInGiacenza->uscitaDdtN);
		$sqlQuery->set($prodottiInGiacenza->uscitaDataDdt);

		$sqlQuery->setNumber($prodottiInGiacenza->idProdottoInGiacenza);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM prodotti_in_giacenza';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdProdotto($value){
		$sql = 'SELECT * FROM prodotti_in_giacenza WHERE id_prodotto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQuantita($value){
		$sql = 'SELECT * FROM prodotti_in_giacenza WHERE quantita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdMagazzino($value){
		$sql = 'SELECT * FROM prodotti_in_giacenza WHERE id_magazzino = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdProdottoInGiacenzaPadre($value){
		$sql = 'SELECT * FROM prodotti_in_giacenza WHERE id_prodotto_in_giacenza_padre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBatch($value){
		$sql = 'SELECT * FROM prodotti_in_giacenza WHERE batch = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUscitaDdtN($value){
		$sql = 'SELECT * FROM prodotti_in_giacenza WHERE uscita_ddt_n = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUscitaDataDdt($value){
		$sql = 'SELECT * FROM prodotti_in_giacenza WHERE uscita_data_ddt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdProdotto($value){
		$sql = 'DELETE FROM prodotti_in_giacenza WHERE id_prodotto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQuantita($value){
		$sql = 'DELETE FROM prodotti_in_giacenza WHERE quantita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdMagazzino($value){
		$sql = 'DELETE FROM prodotti_in_giacenza WHERE id_magazzino = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdProdottoInGiacenzaPadre($value){
		$sql = 'DELETE FROM prodotti_in_giacenza WHERE id_prodotto_in_giacenza_padre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBatch($value){
		$sql = 'DELETE FROM prodotti_in_giacenza WHERE batch = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUscitaDdtN($value){
		$sql = 'DELETE FROM prodotti_in_giacenza WHERE uscita_ddt_n = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUscitaDataDdt($value){
		$sql = 'DELETE FROM prodotti_in_giacenza WHERE uscita_data_ddt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ProdottiInGiacenzaMySql 
	 */
	protected function readRow($row){
		$prodottiInGiacenza = new ProdottiInGiacenza();
		
		$prodottiInGiacenza->idProdottoInGiacenza = $row['id_prodotto_in_giacenza'];
		$prodottiInGiacenza->idProdotto = $row['id_prodotto'];
		$prodottiInGiacenza->quantita = $row['quantita'];
		$prodottiInGiacenza->idMagazzino = $row['id_magazzino'];
		$prodottiInGiacenza->idProdottoInGiacenzaPadre = $row['id_prodotto_in_giacenza_padre'];
		$prodottiInGiacenza->batch = $row['batch'];
		$prodottiInGiacenza->uscitaDdtN = $row['uscita_ddt_n'];
		$prodottiInGiacenza->uscitaDataDdt = $row['uscita_data_ddt'];

		return $prodottiInGiacenza;
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
	 * @return ProdottiInGiacenzaMySql 
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
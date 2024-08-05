<?php
/**
 * Class that operate on table 'categorie_prod'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class CategorieProdMySqlDAO implements CategorieProdDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CategorieProdMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM categorie_prod WHERE id_categorie_prod = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM categorie_prod';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM categorie_prod ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param categorieProd primary key
 	 */
	public function delete($id_categorie_prod){
		$sql = 'DELETE FROM categorie_prod WHERE id_categorie_prod = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_categorie_prod);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CategorieProdMySql categorieProd
 	 */
	public function insert($categorieProd){
		$sql = 'INSERT INTO categorie_prod (nome_categoria) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($categorieProd->nomeCategoria);

		$id = $this->executeInsert($sqlQuery);	
		$categorieProd->idCategorieProd = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CategorieProdMySql categorieProd
 	 */
	public function update($categorieProd){
		$sql = 'UPDATE categorie_prod SET nome_categoria = ? WHERE id_categorie_prod = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($categorieProd->nomeCategoria);

		$sqlQuery->setNumber($categorieProd->idCategorieProd);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM categorie_prod';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNomeCategoria($value){
		$sql = 'SELECT * FROM categorie_prod WHERE nome_categoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNomeCategoria($value){
		$sql = 'DELETE FROM categorie_prod WHERE nome_categoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CategorieProdMySql 
	 */
	protected function readRow($row){
		$categorieProd = new CategorieProd();
		
		$categorieProd->idCategorieProd = $row['id_categorie_prod'];
		$categorieProd->nomeCategoria = $row['nome_categoria'];

		return $categorieProd;
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
	 * @return CategorieProdMySql 
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
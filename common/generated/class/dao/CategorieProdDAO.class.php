<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface CategorieProdDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CategorieProd 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param categorieProd primary key
 	 */
	public function delete($id_categorie_prod);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CategorieProd categorieProd
 	 */
	public function insert($categorieProd);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CategorieProd categorieProd
 	 */
	public function update($categorieProd);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNomeCategoria($value);


	public function deleteByNomeCategoria($value);


}
?>
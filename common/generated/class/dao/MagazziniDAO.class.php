<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface MagazziniDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Magazzini 
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
 	 * @param magazzini primary key
 	 */
	public function delete($id_magazzino);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Magazzini magazzini
 	 */
	public function insert($magazzini);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Magazzini magazzini
 	 */
	public function update($magazzini);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescrizione($value);


	public function deleteByDescrizione($value);


}
?>
<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface NazioniDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Nazioni 
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
 	 * @param nazioni primary key
 	 */
	public function delete($id_nazione);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Nazioni nazioni
 	 */
	public function insert($nazioni);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Nazioni nazioni
 	 */
	public function update($nazioni);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNomeNazione($value);


	public function deleteByNomeNazione($value);


}
?>
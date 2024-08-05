<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface MacchinariDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Macchinari 
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
 	 * @param macchinari primary key
 	 */
	public function delete($id_macchinario);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Macchinari macchinari
 	 */
	public function insert($macchinari);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Macchinari macchinari
 	 */
	public function update($macchinari);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescrizione($value);


	public function deleteByDescrizione($value);


}
?>
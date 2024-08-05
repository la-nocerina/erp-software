<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface DateControlliQualitaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return DateControlliQualita 
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
 	 * @param dateControlliQualita primary key
 	 */
	public function delete($id_date_controlli_qualita);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DateControlliQualita dateControlliQualita
 	 */
	public function insert($dateControlliQualita);
	
	/**
 	 * Update record in table
 	 *
 	 * @param DateControlliQualita dateControlliQualita
 	 */
	public function update($dateControlliQualita);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdControlliQualita($value);

	public function queryByData($value);


	public function deleteByIdControlliQualita($value);

	public function deleteByData($value);


}
?>
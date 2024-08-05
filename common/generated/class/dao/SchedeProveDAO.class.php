<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface SchedeProveDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return SchedeProve 
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
 	 * @param schedeProve primary key
 	 */
	public function delete($id_scheda_prove);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param SchedeProve schedeProve
 	 */
	public function insert($schedeProve);
	
	/**
 	 * Update record in table
 	 *
 	 * @param SchedeProve schedeProve
 	 */
	public function update($schedeProve);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByData($value);

	public function queryByRLaboratorio($value);

	public function queryByNote($value);


	public function deleteByData($value);

	public function deleteByRLaboratorio($value);

	public function deleteByNote($value);


}
?>
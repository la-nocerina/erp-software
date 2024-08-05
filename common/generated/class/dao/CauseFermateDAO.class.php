<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface CauseFermateDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CauseFermate 
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
 	 * @param causeFermate primary key
 	 */
	public function delete($id_causa_fermata);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CauseFermate causeFermate
 	 */
	public function insert($causeFermate);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CauseFermate causeFermate
 	 */
	public function update($causeFermate);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdFermateGuasti($value);

	public function queryByNumCausa($value);

	public function queryByDaOra($value);

	public function queryByAOra($value);


	public function deleteByIdFermateGuasti($value);

	public function deleteByNumCausa($value);

	public function deleteByDaOra($value);

	public function deleteByAOra($value);


}
?>
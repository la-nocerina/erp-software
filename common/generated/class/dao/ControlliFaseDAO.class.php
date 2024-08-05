<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface ControlliFaseDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ControlliFase 
	 */
	public function load($idFase, $ora);

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
 	 * @param controlliFase primary key
 	 */
	public function delete($idFase, $ora);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ControlliFase controlliFase
 	 */
	public function insert($controlliFase);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ControlliFase controlliFase
 	 */
	public function update($controlliFase);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByC1($value);

	public function queryByC2($value);

	public function queryByC3($value);

	public function queryByC4($value);

	public function queryByC5($value);

	public function queryByC6($value);

	public function queryByC7($value);

	public function queryByC8($value);

	public function queryByC9($value);

	public function queryByC10($value);

	public function queryByC11($value);

	public function queryByC12($value);

	public function queryByC13($value);

	public function queryByC14($value);

	public function queryByC15($value);

	public function queryByC16($value);


	public function deleteByC1($value);

	public function deleteByC2($value);

	public function deleteByC3($value);

	public function deleteByC4($value);

	public function deleteByC5($value);

	public function deleteByC6($value);

	public function deleteByC7($value);

	public function deleteByC8($value);

	public function deleteByC9($value);

	public function deleteByC10($value);

	public function deleteByC11($value);

	public function deleteByC12($value);

	public function deleteByC13($value);

	public function deleteByC14($value);

	public function deleteByC15($value);

	public function deleteByC16($value);


}
?>
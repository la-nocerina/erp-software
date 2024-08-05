<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface NoteProveDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return NoteProve 
	 */
	public function load($idSchedaProve, $linea);

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
 	 * @param noteProve primary key
 	 */
	public function delete($idSchedaProve, $linea);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param NoteProve noteProve
 	 */
	public function insert($noteProve);
	
	/**
 	 * Update record in table
 	 *
 	 * @param NoteProve noteProve
 	 */
	public function update($noteProve);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByN1($value);

	public function queryByN2($value);

	public function queryByN3($value);

	public function queryByN4($value);

	public function queryByN5($value);

	public function queryByN6($value);

	public function queryByN7($value);

	public function queryByN8($value);

	public function queryByN9($value);

	public function queryByN10($value);

	public function queryByN11($value);


	public function deleteByN1($value);

	public function deleteByN2($value);

	public function deleteByN3($value);

	public function deleteByN4($value);

	public function deleteByN5($value);

	public function deleteByN6($value);

	public function deleteByN7($value);

	public function deleteByN8($value);

	public function deleteByN9($value);

	public function deleteByN10($value);

	public function deleteByN11($value);


}
?>
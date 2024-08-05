<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface UnitaMisuraDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UnitaMisura 
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
 	 * @param unitaMisura primary key
 	 */
	public function delete($id_unita_misura);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UnitaMisura unitaMisura
 	 */
	public function insert($unitaMisura);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UnitaMisura unitaMisura
 	 */
	public function update($unitaMisura);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescrizioneUm($value);


	public function deleteByDescrizioneUm($value);


}
?>
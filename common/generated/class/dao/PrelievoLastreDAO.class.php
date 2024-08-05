<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface PrelievoLastreDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PrelievoLastre 
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
 	 * @param prelievoLastre primary key
 	 */
	public function delete($id_prelievo_lastre);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PrelievoLastre prelievoLastre
 	 */
	public function insert($prelievoLastre);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PrelievoLastre prelievoLastre
 	 */
	public function update($prelievoLastre);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdPartner($value);

	public function queryByNomeLavoro($value);

	public function queryByNumLastre($value);

	public function queryByColori($value);

	public function queryByFirma($value);

	public function queryByData($value);


	public function deleteByIdPartner($value);

	public function deleteByNomeLavoro($value);

	public function deleteByNumLastre($value);

	public function deleteByColori($value);

	public function deleteByFirma($value);

	public function deleteByData($value);


}
?>
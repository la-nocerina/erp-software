<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface ControlliQualitaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ControlliQualita 
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
 	 * @param controlliQualita primary key
 	 */
	public function delete($id_controlli_qualita);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ControlliQualita controlliQualita
 	 */
	public function insert($controlliQualita);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ControlliQualita controlliQualita
 	 */
	public function update($controlliQualita);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdPartner($value);

	public function queryByDdtN($value);

	public function queryByDataDdt($value);

	public function queryByNumColli($value);

	public function queryByKg($value);

	public function queryByNumFerriera($value);

	public function queryByTipo($value);

	public function queryByTxtCorpi($value);

	public function queryByOperatore($value);

	public function queryByRLaboratorio($value);


	public function deleteByIdPartner($value);

	public function deleteByDdtN($value);

	public function deleteByDataDdt($value);

	public function deleteByNumColli($value);

	public function deleteByKg($value);

	public function deleteByNumFerriera($value);

	public function deleteByTipo($value);

	public function deleteByTxtCorpi($value);

	public function deleteByOperatore($value);

	public function deleteByRLaboratorio($value);


}
?>
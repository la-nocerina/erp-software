<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface PartnerDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Partner 
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
 	 * @param partner primary key
 	 */
	public function delete($id_partner);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Partner partner
 	 */
	public function insert($partner);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Partner partner
 	 */
	public function update($partner);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByRagioneSociale($value);

	public function queryByPartitaIva($value);

	public function queryByCodiceFiscale($value);

	public function queryByIsAttivo($value);

	public function queryByIndirizzo($value);

	public function queryByProvincia($value);

	public function queryByComune($value);

	public function queryByCap($value);

	public function queryByIdNazione($value);

	public function queryBySitoWeb($value);

	public function queryByCreatoIl($value);

	public function queryByAggiornatoIl($value);


	public function deleteByRagioneSociale($value);

	public function deleteByPartitaIva($value);

	public function deleteByCodiceFiscale($value);

	public function deleteByIsAttivo($value);

	public function deleteByIndirizzo($value);

	public function deleteByProvincia($value);

	public function deleteByComune($value);

	public function deleteByCap($value);

	public function deleteByIdNazione($value);

	public function deleteBySitoWeb($value);

	public function deleteByCreatoIl($value);

	public function deleteByAggiornatoIl($value);


}
?>
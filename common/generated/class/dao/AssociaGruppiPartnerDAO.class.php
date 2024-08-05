<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface AssociaGruppiPartnerDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return AssociaGruppiPartner 
	 */
	public function load($idPartner, $idGruppoPartner);

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
 	 * @param associaGruppiPartner primary key
 	 */
	public function delete($idPartner, $idGruppoPartner);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AssociaGruppiPartner associaGruppiPartner
 	 */
	public function insert($associaGruppiPartner);
	
	/**
 	 * Update record in table
 	 *
 	 * @param AssociaGruppiPartner associaGruppiPartner
 	 */
	public function update($associaGruppiPartner);	

	/**
	 * Delete all rows
	 */
	public function clean();



}
?>
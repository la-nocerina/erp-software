<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface GruppiPartnerDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return GruppiPartner 
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
 	 * @param gruppiPartner primary key
 	 */
	public function delete($id_gruppo_partner);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param GruppiPartner gruppiPartner
 	 */
	public function insert($gruppiPartner);
	
	/**
 	 * Update record in table
 	 *
 	 * @param GruppiPartner gruppiPartner
 	 */
	public function update($gruppiPartner);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);


	public function deleteByNome($value);


}
?>
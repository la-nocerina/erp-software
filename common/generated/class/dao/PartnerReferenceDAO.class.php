<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface PartnerReferenceDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PartnerReference 
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
 	 * @param partnerReference primary key
 	 */
	public function delete($id_partner_reference);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PartnerReference partnerReference
 	 */
	public function insert($partnerReference);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PartnerReference partnerReference
 	 */
	public function update($partnerReference);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);

	public function queryByCognome($value);

	public function queryByTelefono($value);

	public function queryByMobile($value);

	public function queryByEmail($value);

	public function queryByIdPartner($value);


	public function deleteByNome($value);

	public function deleteByCognome($value);

	public function deleteByTelefono($value);

	public function deleteByMobile($value);

	public function deleteByEmail($value);

	public function deleteByIdPartner($value);


}
?>
<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface DepositoLastreDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return DepositoLastre 
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
 	 * @param depositoLastre primary key
 	 */
	public function delete($id_deposito_lastre);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DepositoLastre depositoLastre
 	 */
	public function insert($depositoLastre);
	
	/**
 	 * Update record in table
 	 *
 	 * @param DepositoLastre depositoLastre
 	 */
	public function update($depositoLastre);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdPartner($value);

	public function queryByNomeLavoro($value);

	public function queryByNumLastre($value);

	public function queryByColori($value);

	public function queryByFirma($value);

	public function queryByDaRifare($value);

	public function queryByData($value);


	public function deleteByIdPartner($value);

	public function deleteByNomeLavoro($value);

	public function deleteByNumLastre($value);

	public function deleteByColori($value);

	public function deleteByFirma($value);

	public function deleteByDaRifare($value);

	public function deleteByData($value);


}
?>
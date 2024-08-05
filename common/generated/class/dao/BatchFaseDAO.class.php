<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface BatchFaseDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return BatchFase 
	 */
	public function load($idProdottoInGiacenza, $idFase);

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
 	 * @param batchFase primary key
 	 */
	public function delete($idProdottoInGiacenza, $idFase);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param BatchFase batchFase
 	 */
	public function insert($batchFase);
	
	/**
 	 * Update record in table
 	 *
 	 * @param BatchFase batchFase
 	 */
	public function update($batchFase);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByConsumo($value);


	public function deleteByConsumo($value);


}
?>
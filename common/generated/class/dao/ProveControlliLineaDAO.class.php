<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface ProveControlliLineaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ProveControlliLinea 
	 */
	public function load($idSchedaProve, $linea, $ora);

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
 	 * @param proveControlliLinea primary key
 	 */
	public function delete($idSchedaProve, $linea, $ora);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProveControlliLinea proveControlliLinea
 	 */
	public function insert($proveControlliLinea);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProveControlliLinea proveControlliLinea
 	 */
	public function update($proveControlliLinea);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByC1($value);

	public function queryByC2($value);

	public function queryByC3($value);

	public function queryByC4($value);

	public function queryByC5($value);

	public function queryByC6($value);

	public function queryByC7($value);

	public function queryByC8($value);

	public function queryByIdProdottoInGiacenza($value);

	public function queryByIdFase($value);

	public function queryByIdFaseStampa($value);


	public function deleteByC1($value);

	public function deleteByC2($value);

	public function deleteByC3($value);

	public function deleteByC4($value);

	public function deleteByC5($value);

	public function deleteByC6($value);

	public function deleteByC7($value);

	public function deleteByC8($value);

	public function deleteByIdProdottoInGiacenza($value);

	public function deleteByIdFase($value);

	public function deleteByIdFaseStampa($value);


}
?>
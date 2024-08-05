<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface CommesseDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Commesse 
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
 	 * @param commesse primary key
 	 */
	public function delete($id_commessa);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Commesse commesse
 	 */
	public function insert($commesse);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Commesse commesse
 	 */
	public function update($commesse);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdPartner($value);

	public function queryByMarca($value);

	public function queryByDdtN($value);

	public function queryByDataDdt($value);

	public function queryByColli($value);

	public function queryByKg($value);

	public function queryByNumFogli($value);

	public function queryByResa($value);

	public function queryByRifConfNum($value);

	public function queryByDataConf($value);

	public function queryByNumFasiLavoro($value);

	public function queryByFormato($value);

	public function queryByTotale($value);

	public function queryByNote($value);


	public function deleteByIdPartner($value);

	public function deleteByMarca($value);

	public function deleteByDdtN($value);

	public function deleteByDataDdt($value);

	public function deleteByColli($value);

	public function deleteByKg($value);

	public function deleteByNumFogli($value);

	public function deleteByResa($value);

	public function deleteByRifConfNum($value);

	public function deleteByDataConf($value);

	public function deleteByNumFasiLavoro($value);

	public function deleteByFormato($value);

	public function deleteByTotale($value);

	public function deleteByNote($value);


}
?>
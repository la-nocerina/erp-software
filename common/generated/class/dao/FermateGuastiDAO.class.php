<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface FermateGuastiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return FermateGuasti 
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
 	 * @param fermateGuasti primary key
 	 */
	public function delete($id_fermate_guasti);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param FermateGuasti fermateGuasti
 	 */
	public function insert($fermateGuasti);
	
	/**
 	 * Update record in table
 	 *
 	 * @param FermateGuasti fermateGuasti
 	 */
	public function update($fermateGuasti);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByLinea($value);

	public function queryByData($value);

	public function queryByStandard($value);

	public function queryByOperatore($value);

	public function queryByTurno($value);

	public function queryByAltreCause($value);

	public function queryByRProduzione($value);

	public function queryByRAssicurazioneQualita($value);

	public function queryByRManutenzione($value);

	public function queryByDataVerifica($value);


	public function deleteByLinea($value);

	public function deleteByData($value);

	public function deleteByStandard($value);

	public function deleteByOperatore($value);

	public function deleteByTurno($value);

	public function deleteByAltreCause($value);

	public function deleteByRProduzione($value);

	public function deleteByRAssicurazioneQualita($value);

	public function deleteByRManutenzione($value);

	public function deleteByDataVerifica($value);


}
?>
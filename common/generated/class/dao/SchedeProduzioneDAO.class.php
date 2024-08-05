<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface SchedeProduzioneDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return SchedeProduzione 
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
 	 * @param schedeProduzione primary key
 	 */
	public function delete($id_scheda_produzione);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param SchedeProduzione schedeProduzione
 	 */
	public function insert($schedeProduzione);
	
	/**
 	 * Update record in table
 	 *
 	 * @param SchedeProduzione schedeProduzione
 	 */
	public function update($schedeProduzione);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTurno($value);

	public function queryByTipoMacchina($value);

	public function queryByMacchinista($value);

	public function queryByIdPartner($value);

	public function queryByLavorazione($value);

	public function queryByData($value);

	public function queryByOra($value);

	public function queryByLinea($value);


	public function deleteByTurno($value);

	public function deleteByTipoMacchina($value);

	public function deleteByMacchinista($value);

	public function deleteByIdPartner($value);

	public function deleteByLavorazione($value);

	public function deleteByData($value);

	public function deleteByOra($value);

	public function deleteByLinea($value);


}
?>
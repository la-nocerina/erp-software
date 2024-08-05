<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface ControlliAggiuntiviDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ControlliAggiuntivi 
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
 	 * @param controlliAggiuntivi primary key
 	 */
	public function delete($id_controllo_aggiuntivo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ControlliAggiuntivi controlliAggiuntivi
 	 */
	public function insert($controlliAggiuntivi);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ControlliAggiuntivi controlliAggiuntivi
 	 */
	public function update($controlliAggiuntivi);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdSchedaProve($value);

	public function queryByLinea($value);

	public function queryByControllo($value);

	public function queryByValore($value);


	public function deleteByIdSchedaProve($value);

	public function deleteByLinea($value);

	public function deleteByControllo($value);

	public function deleteByValore($value);


}
?>
<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface AssociaGiacenzaControlloDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return AssociaGiacenzaControllo 
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
 	 * @param associaGiacenzaControllo primary key
 	 */
	public function delete($id_associa_giacenza_controllo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AssociaGiacenzaControllo associaGiacenzaControllo
 	 */
	public function insert($associaGiacenzaControllo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param AssociaGiacenzaControllo associaGiacenzaControllo
 	 */
	public function update($associaGiacenzaControllo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdControlliQualita($value);

	public function queryByIdProdottoInGiacenza($value);

	public function queryByCopertura($value);

	public function queryByPeso($value);

	public function queryByPacco($value);

	public function queryByControlloVisivo($value);

	public function queryByControlloVisivoTxt($value);

	public function queryByNote($value);


	public function deleteByIdControlliQualita($value);

	public function deleteByIdProdottoInGiacenza($value);

	public function deleteByCopertura($value);

	public function deleteByPeso($value);

	public function deleteByPacco($value);

	public function deleteByControlloVisivo($value);

	public function deleteByControlloVisivoTxt($value);

	public function deleteByNote($value);


}
?>
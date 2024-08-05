<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface AssociaFasiStampaGiacenzeDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return AssociaFasiStampaGiacenze 
	 */
	public function load($idProdottoInGiacenza, $idFaseStampa);

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
 	 * @param associaFasiStampaGiacenze primary key
 	 */
	public function delete($idProdottoInGiacenza, $idFaseStampa);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AssociaFasiStampaGiacenze associaFasiStampaGiacenze
 	 */
	public function insert($associaFasiStampaGiacenze);
	
	/**
 	 * Update record in table
 	 *
 	 * @param AssociaFasiStampaGiacenze associaFasiStampaGiacenze
 	 */
	public function update($associaFasiStampaGiacenze);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNumFogli($value);

	public function queryByControllo1($value);

	public function queryByControllo2($value);

	public function queryByNote($value);

	public function queryByVerificatore($value);

	public function queryByDataOra($value);

	public function queryByIdSchedaProduzione($value);

	public function queryByNumFogliIngresso($value);


	public function deleteByNumFogli($value);

	public function deleteByControllo1($value);

	public function deleteByControllo2($value);

	public function deleteByNote($value);

	public function deleteByVerificatore($value);

	public function deleteByDataOra($value);

	public function deleteByIdSchedaProduzione($value);

	public function deleteByNumFogliIngresso($value);


}
?>
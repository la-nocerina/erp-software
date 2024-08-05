<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface AssociaFasiGiacenzeDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return AssociaFasiGiacenze 
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
 	 * @param associaFasiGiacenze primary key
 	 */
	public function delete($idProdottoInGiacenza, $idFase);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AssociaFasiGiacenze associaFasiGiacenze
 	 */
	public function insert($associaFasiGiacenze);
	
	/**
 	 * Update record in table
 	 *
 	 * @param AssociaFasiGiacenze associaFasiGiacenze
 	 */
	public function update($associaFasiGiacenze);	

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
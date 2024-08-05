<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface CertificatiCollaudoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CertificatiCollaudo 
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
 	 * @param certificatiCollaudo primary key
 	 */
	public function delete($id_certificato_collaudo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CertificatiCollaudo certificatiCollaudo
 	 */
	public function insert($certificatiCollaudo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CertificatiCollaudo certificatiCollaudo
 	 */
	public function update($certificatiCollaudo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdPartner($value);

	public function queryByDdtN($value);

	public function queryByDel($value);

	public function queryByNumColli($value);

	public function queryByKg($value);

	public function queryByFormato($value);

	public function queryByTempra($value);

	public function queryBySpessore($value);

	public function queryByCommN($value);

	public function queryByCollN($value);

	public function queryByPaccoN($value);

	public function queryByIdProdottoInGiacenza($value);

	public function queryByBozzetto($value);

	public function queryByVerificatore($value);

	public function queryByContestazione($value);

	public function queryByData($value);

	public function queryByNumPaccoFerriera($value);

	public function queryByNote($value);

	public function queryByLavorazioni($value);

	public function queryByNumStampe($value);

	public function queryByClassificazione($value);

	public function queryByMateriale($value);


	public function deleteByIdPartner($value);

	public function deleteByDdtN($value);

	public function deleteByDel($value);

	public function deleteByNumColli($value);

	public function deleteByKg($value);

	public function deleteByFormato($value);

	public function deleteByTempra($value);

	public function deleteBySpessore($value);

	public function deleteByCommN($value);

	public function deleteByCollN($value);

	public function deleteByPaccoN($value);

	public function deleteByIdProdottoInGiacenza($value);

	public function deleteByBozzetto($value);

	public function deleteByVerificatore($value);

	public function deleteByContestazione($value);

	public function deleteByData($value);

	public function deleteByNumPaccoFerriera($value);

	public function deleteByNote($value);

	public function deleteByLavorazioni($value);

	public function deleteByNumStampe($value);

	public function deleteByClassificazione($value);

	public function deleteByMateriale($value);


}
?>
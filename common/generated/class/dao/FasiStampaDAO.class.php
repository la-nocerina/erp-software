<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface FasiStampaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return FasiStampa 
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
 	 * @param fasiStampa primary key
 	 */
	public function delete($id_fase_stampa);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param FasiStampa fasiStampa
 	 */
	public function insert($fasiStampa);
	
	/**
 	 * Update record in table
 	 *
 	 * @param FasiStampa fasiStampa
 	 */
	public function update($fasiStampa);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescrizione($value);

	public function queryByVelocita($value);

	public function queryByColore($value);

	public function queryByTemperatura($value);

	public function queryByRis($value);

	public function queryByFogli($value);

	public function queryByLastre($value);

	public function queryByCorpi($value);

	public function queryByCopFon($value);

	public function queryByCaps($value);

	public function queryByTappi($value);

	public function queryByAltro($value);

	public function queryByOperatore($value);

	public function queryByCodiceInternoPtodotto($value);

	public function queryByIdCommessa($value);

	public function queryByNumFase($value);

	public function queryByNumLinea($value);

	public function queryByOraInizio($value);

	public function queryByOraFine($value);


	public function deleteByDescrizione($value);

	public function deleteByVelocita($value);

	public function deleteByColore($value);

	public function deleteByTemperatura($value);

	public function deleteByRis($value);

	public function deleteByFogli($value);

	public function deleteByLastre($value);

	public function deleteByCorpi($value);

	public function deleteByCopFon($value);

	public function deleteByCaps($value);

	public function deleteByTappi($value);

	public function deleteByAltro($value);

	public function deleteByOperatore($value);

	public function deleteByCodiceInternoPtodotto($value);

	public function deleteByIdCommessa($value);

	public function deleteByNumFase($value);

	public function deleteByNumLinea($value);

	public function deleteByOraInizio($value);

	public function deleteByOraFine($value);


}
?>
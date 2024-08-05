<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface FasiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Fasi 
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
 	 * @param fasi primary key
 	 */
	public function delete($id_fase);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Fasi fasi
 	 */
	public function insert($fasi);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Fasi fasi
 	 */
	public function update($fasi);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescrizione($value);

	public function queryByCodiceInternoProdotto($value);

	public function queryByGrUm($value);

	public function queryByGrSec($value);

	public function queryByVelocita($value);

	public function queryByTempForno($value);

	public function queryByViscosita($value);

	public function queryByFogli($value);

	public function queryByCorpi($value);

	public function queryByCopFon($value);

	public function queryByCaps($value);

	public function queryByTappi($value);

	public function queryByAltro($value);

	public function queryByOperatore($value);

	public function queryByIdCommessa($value);

	public function queryByNumFase($value);

	public function queryByNumLinea($value);

	public function queryByOraInizio($value);

	public function queryByOraFine($value);


	public function deleteByDescrizione($value);

	public function deleteByCodiceInternoProdotto($value);

	public function deleteByGrUm($value);

	public function deleteByGrSec($value);

	public function deleteByVelocita($value);

	public function deleteByTempForno($value);

	public function deleteByViscosita($value);

	public function deleteByFogli($value);

	public function deleteByCorpi($value);

	public function deleteByCopFon($value);

	public function deleteByCaps($value);

	public function deleteByTappi($value);

	public function deleteByAltro($value);

	public function deleteByOperatore($value);

	public function deleteByIdCommessa($value);

	public function deleteByNumFase($value);

	public function deleteByNumLinea($value);

	public function deleteByOraInizio($value);

	public function deleteByOraFine($value);


}
?>
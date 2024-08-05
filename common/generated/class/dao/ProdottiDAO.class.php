<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface ProdottiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Prodotti 
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
 	 * @param prodotti primary key
 	 */
	public function delete($id_prodotto);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Prodotti prodotti
 	 */
	public function insert($prodotti);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Prodotti prodotti
 	 */
	public function update($prodotti);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCodiceInterno($value);

	public function queryByDescrizione($value);

	public function queryByDettagli($value);

	public function queryByIdUnitaMisura($value);

	public function queryByIdCategorieProd($value);

	public function queryByCreatoIl($value);

	public function queryByAggiornatoIl($value);

	public function queryByIsAttivo($value);


	public function deleteByCodiceInterno($value);

	public function deleteByDescrizione($value);

	public function deleteByDettagli($value);

	public function deleteByIdUnitaMisura($value);

	public function deleteByIdCategorieProd($value);

	public function deleteByCreatoIl($value);

	public function deleteByAggiornatoIl($value);

	public function deleteByIsAttivo($value);


}
?>
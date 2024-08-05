<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface ProdottiInGiacenzaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ProdottiInGiacenza 
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
 	 * @param prodottiInGiacenza primary key
 	 */
	public function delete($id_prodotto_in_giacenza);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProdottiInGiacenza prodottiInGiacenza
 	 */
	public function insert($prodottiInGiacenza);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProdottiInGiacenza prodottiInGiacenza
 	 */
	public function update($prodottiInGiacenza);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdProdotto($value);

	public function queryByQuantita($value);

	public function queryByIdMagazzino($value);

	public function queryByIdProdottoInGiacenzaPadre($value);

	public function queryByBatch($value);

	public function queryByUscitaDdtN($value);

	public function queryByUscitaDataDdt($value);


	public function deleteByIdProdotto($value);

	public function deleteByQuantita($value);

	public function deleteByIdMagazzino($value);

	public function deleteByIdProdottoInGiacenzaPadre($value);

	public function deleteByBatch($value);

	public function deleteByUscitaDdtN($value);

	public function deleteByUscitaDataDdt($value);


}
?>
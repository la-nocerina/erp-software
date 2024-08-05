<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface RicezioneMaterialiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RicezioneMateriali 
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
 	 * @param ricezioneMateriali primary key
 	 */
	public function delete($id_ricezione_materiali);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RicezioneMateriali ricezioneMateriali
 	 */
	public function insert($ricezioneMateriali);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RicezioneMateriali ricezioneMateriali
 	 */
	public function update($ricezioneMateriali);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNumDocumento($value);

	public function queryByIdPartner($value);

	public function queryByDdtN($value);

	public function queryByNumColli($value);

	public function queryByOrdineN($value);

	public function queryByKg($value);

	public function queryByDestinazione($value);

	public function queryByTipo($value);

	public function queryByTipoNote($value);

	public function queryByIdPartnerProvenienza($value);

	public function queryByControlli($value);

	public function queryByN1($value);

	public function queryByN2($value);

	public function queryByN3($value);

	public function queryByN4($value);

	public function queryByN5($value);

	public function queryByN6($value);

	public function queryByN7($value);

	public function queryByN8($value);

	public function queryByN9($value);

	public function queryByN10($value);

	public function queryByN11($value);

	public function queryByN12($value);

	public function queryByDataDdt($value);

	public function queryByDataScarico($value);

	public function queryByCompilatore($value);


	public function deleteByNumDocumento($value);

	public function deleteByIdPartner($value);

	public function deleteByDdtN($value);

	public function deleteByNumColli($value);

	public function deleteByOrdineN($value);

	public function deleteByKg($value);

	public function deleteByDestinazione($value);

	public function deleteByTipo($value);

	public function deleteByTipoNote($value);

	public function deleteByIdPartnerProvenienza($value);

	public function deleteByControlli($value);

	public function deleteByN1($value);

	public function deleteByN2($value);

	public function deleteByN3($value);

	public function deleteByN4($value);

	public function deleteByN5($value);

	public function deleteByN6($value);

	public function deleteByN7($value);

	public function deleteByN8($value);

	public function deleteByN9($value);

	public function deleteByN10($value);

	public function deleteByN11($value);

	public function deleteByN12($value);

	public function deleteByDataDdt($value);

	public function deleteByDataScarico($value);

	public function deleteByCompilatore($value);


}
?>
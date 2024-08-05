<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
interface SchedeTecnicheDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return SchedeTecniche 
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
 	 * @param schedeTecniche primary key
 	 */
	public function delete($id_scheda_tecnica);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param SchedeTecniche schedeTecniche
 	 */
	public function insert($schedeTecniche);
	
	/**
 	 * Update record in table
 	 *
 	 * @param SchedeTecniche schedeTecniche
 	 */
	public function update($schedeTecniche);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdProdotto($value);

	public function queryByDescrizione($value);

	public function queryByTempForno($value);

	public function queryByGrUmido($value);

	public function queryByGrSecco($value);

	public function queryByViscosita($value);

	public function queryByVelocita($value);


	public function deleteByIdProdotto($value);

	public function deleteByDescrizione($value);

	public function deleteByTempForno($value);

	public function deleteByGrUmido($value);

	public function deleteByGrSecco($value);

	public function deleteByViscosita($value);

	public function deleteByVelocita($value);


}
?>
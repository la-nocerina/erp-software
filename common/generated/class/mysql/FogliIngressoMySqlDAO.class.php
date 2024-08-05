<?php
/**
 * Class that operate on view 'fogliIngresso'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class FogliIngressoMySqlDAO implements FogliIngressoDAO{

	/**
	 * Get all records from table
	 */
	public function queryAll($linea){
		$sql = "SELECT DATE_FORMAT(data_ora,'%Y-%m-%d')as data, id_commessa, num_fogli_ingresso  FROM 
                `associa_fasi_giacenze` INNER JOIN fasi ON associa_fasi_giacenze.id_fase = fasi.id_fase WHERE
                fasi.num_linea= $linea

                UNION

                SELECT DATE_FORMAT(data_ora,'%Y-%m-%d')as data, id_commessa, num_fogli_ingresso  FROM
                associa_fasi_stampa_giacenze INNER JOIN fasi_stampa ON
                associa_fasi_stampa_giacenze.id_fase_stampa = fasi_stampa.id_fase_stampa WHERE
                fasi_stampa.num_linea= $linea

                ORDER BY data";

		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Read row
	 *
	 * @return FogliIngressoMySql 
	 */
	protected function readRow($row){
		$fogli_ingresso = new FogliIngresso();
		
		$fogli_ingresso->data = $row['data'];
		$fogli_ingresso->id_commessa = $row['id_commessa'];
                $fogli_ingresso->num_fogli_ingresso = $row['num_fogli_ingresso'];
                
		return $fogli_ingresso;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return FasiMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>
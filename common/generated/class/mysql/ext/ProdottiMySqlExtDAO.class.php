<?php
/**
 * Class that operate on table 'prodotti'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-01-20 13:55
 */
class ProdottiMySqlExtDAO extends ProdottiMySqlDAO{

        public function loadByCodiceInterno($value){
		$sql = 'SELECT * FROM prodotti WHERE codice_interno = ? LIMIT 1';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getRow($sqlQuery);
	}
	
}
?>
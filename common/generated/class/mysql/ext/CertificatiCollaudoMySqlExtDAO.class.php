<?php
/**
 * Class that operate on table 'certificati_collaudo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-01-20 13:55
 */
class CertificatiCollaudoMySqlExtDAO extends CertificatiCollaudoMySqlDAO{
    
        public function loadByIdGiacenza($id){
		$sql = 'SELECT * FROM certificati_collaudo WHERE id_prodotto_in_giacenza = ? LIMIT 1';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}
	
}
?>
<?php
/**
 * Class that operate on table 'date_controlli_qualita'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-03-06 16:02
 */
class DateControlliQualitaMySqlExtDAO extends DateControlliQualitaMySqlDAO{


        public function loadLastByIdControlliQualita($value){
		$sql = 'SELECT * FROM date_controlli_qualita WHERE id_date_controlli_qualita IN (SELECT MAX(id_date_controlli_qualita) FROM date_controlli_qualita WHERE id_controlli_qualita = ? )';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getRow($sqlQuery);
	}
	
}
?>
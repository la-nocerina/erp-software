<?php
/**
 * Class that operate on table 'schede_produzione'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-02-09 15:59
 */
class SchedeProduzioneMySqlExtDAO extends SchedeProduzioneMySqlDAO{

	public function loadLastByLinea($linea){
		$sql = 'SELECT * FROM schede_produzione WHERE id_scheda_produzione IN (SELECT max(`id_scheda_produzione`) FROM `schede_produzione` WHERE `linea`= ?  )';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($linea);
		return $this->getRow($sqlQuery);
	}
}
?>
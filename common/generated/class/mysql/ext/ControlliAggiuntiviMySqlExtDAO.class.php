<?php
/**
 * Class that operate on table 'controlli_aggiuntivi'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-02-23 15:03
 */
class ControlliAggiuntiviMySqlExtDAO extends ControlliAggiuntiviMySqlDAO{


        public function queryByIdSchedaProveAndLineaAndControllo($scheda, $linea, $controllo){
		$sql = 'SELECT * FROM controlli_aggiuntivi WHERE id_scheda_prove = ? AND linea = ? AND controllo = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($scheda);
                $sqlQuery->setNumber($linea);
                $sqlQuery->setNumber($controllo);
		return $this->getList($sqlQuery);
	}

	
}
?>
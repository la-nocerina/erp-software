<?php
/**
 * Class that operate on table 'cause_fermate'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-02-18 14:52
 */
class CauseFermateMySqlExtDAO extends CauseFermateMySqlDAO{

        public function queryByIdFermateGuastiAndCausa($IdModulo, $causa){
		$sql = 'SELECT * FROM cause_fermate WHERE id_fermate_guasti = ? and num_causa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($IdModulo);
                $sqlQuery->setNumber($causa);
		return $this->getList($sqlQuery);
	}

        public function customInsert($causeFermate){
		$sql = 'INSERT INTO cause_fermate (id_fermate_guasti, num_causa, da_ora, a_ora) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->setNumber($causeFermate->idFermateGuasti);
		$sqlQuery->setNumber($causeFermate->numCausa);
		$sqlQuery->set($causeFermate->daOra);
		$sqlQuery->setDate($causeFermate->aOra);
                
		$id = $this->executeInsert($sqlQuery);
		$causeFermate->idCausaFermata = $id;
		return $id;
	}

        public function customUpdate($causeFermate){
		$sql = 'UPDATE cause_fermate SET id_fermate_guasti = ?, num_causa = ?, da_ora = ?, a_ora = ? WHERE id_causa_fermata = ?';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->setNumber($causeFermate->idFermateGuasti);
		$sqlQuery->setNumber($causeFermate->numCausa);
		$sqlQuery->setDate($causeFermate->daOra);
		$sqlQuery->setDate($causeFermate->aOra);

		$sqlQuery->setNumber($causeFermate->idCausaFermata);
		return $this->executeUpdate($sqlQuery);
	}
}
?>
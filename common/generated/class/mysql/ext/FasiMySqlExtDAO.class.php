<?php
/**
 * Class that operate on table 'fasi'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-01-26 10:32
 */
class FasiMySqlExtDAO extends FasiMySqlDAO{

        public function queryByIdCommessaAndDescrizione($idCommessa, $descrizione){
            $sql = 'SELECT * FROM fasi WHERE id_commessa = ? and descrizione = ?';
            $sqlQuery = new SqlQuery($sql);
            $sqlQuery->setNumber($idCommessa);
            $sqlQuery->setNumber($descrizione);
            return $this->getList($sqlQuery);
        }

    
        public function customUpdate($fasi){
		$sql = 'UPDATE fasi SET  descrizione = ?, codice_interno_prodotto = ?, gr_um = ?, gr_sec = ?, velocita = ?, temp_forno = ?, viscosita = ?, fogli = ?, corpi = ?, cop_fon = ?, caps = ?, tappi = ?, altro = ?, operatore = ?, id_commessa = ?, num_fase = ?, num_linea = ?, ora_inizio = ?, ora_fine = ? WHERE id_fase = ?';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->setNumber($fasi->descrizione);
		$sqlQuery->set($fasi->codiceInternoProdotto);
		$sqlQuery->set($fasi->grUm);
		$sqlQuery->set($fasi->grSec);
		$sqlQuery->set($fasi->velocita);
		$sqlQuery->set($fasi->tempForno);
		$sqlQuery->set($fasi->viscosita);
		$sqlQuery->setNumber($fasi->fogli);
		$sqlQuery->setNumber($fasi->corpi);
		$sqlQuery->setNumber($fasi->copFon);
		$sqlQuery->setNumber($fasi->caps);
		$sqlQuery->setNumber($fasi->tappi);
		$sqlQuery->set($fasi->altro);
		$sqlQuery->set($fasi->operatore);
		$sqlQuery->setNumber($fasi->idCommessa);
		$sqlQuery->setNumber($fasi->numFase);
		$sqlQuery->setNumber($fasi->numLinea);
		$sqlQuery->setDate($fasi->oraInizio);
		$sqlQuery->setDate($fasi->oraFine);

		$sqlQuery->setNumber($fasi->idFase);
		return $this->executeUpdate($sqlQuery);
	}

        public function customInsert($fasi){
		$sql = 'INSERT INTO fasi ( descrizione, codice_interno_prodotto, gr_um, gr_sec, velocita, temp_forno, viscosita, fogli, corpi, cop_fon, caps, tappi, altro, operatore, id_commessa, num_fase, num_linea, ora_inizio, ora_fine) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->setNumber($fasi->descrizione);
		$sqlQuery->set($fasi->codiceInternoProdotto);
		$sqlQuery->set($fasi->grUm);
		$sqlQuery->set($fasi->grSec);
		$sqlQuery->set($fasi->velocita);
		$sqlQuery->set($fasi->tempForno);
		$sqlQuery->set($fasi->viscosita);
		$sqlQuery->setNumber($fasi->fogli);
		$sqlQuery->setNumber($fasi->corpi);
		$sqlQuery->setNumber($fasi->copFon);
		$sqlQuery->setNumber($fasi->caps);
		$sqlQuery->setNumber($fasi->tappi);
		$sqlQuery->set($fasi->altro);
		$sqlQuery->set($fasi->operatore);
		$sqlQuery->setNumber($fasi->idCommessa);
		$sqlQuery->setNumber($fasi->numFase);
		$sqlQuery->setNumber($fasi->numLinea);
		$sqlQuery->setDate($fasi->oraInizio);
		$sqlQuery->setDate($fasi->oraFine);

		$id = $this->executeInsert($sqlQuery);
		$fasi->idFase = $id;
		return $id;
	}


        public function loadFaseApertaByLinea($linea){
            $sql = 'SELECT * FROM fasi WHERE num_linea = ? AND ora_inizio IS NOT NULL AND ora_fine IS NULL LIMIT 1';
            $sqlQuery = new SqlQuery($sql);
            $sqlQuery->setNumber($linea);
            return $this->getRow($sqlQuery);
        }
}
?>
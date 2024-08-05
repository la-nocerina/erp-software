<?php
/**
 * Class that operate on table 'fasi_stampa'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-01-27 19:07
 */
class FasiStampaMySqlExtDAO extends FasiStampaMySqlDAO{

        public function queryByIdCommessaAndDescrizione($idCommessa, $descrizione){
		$sql = 'SELECT * FROM fasi_stampa WHERE id_commessa = ? and descrizione = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idCommessa);
                $sqlQuery->setNumber($descrizione);
		return $this->getList($sqlQuery);
	}

        public function customUpdate($fasiStampa){
		$sql = 'UPDATE fasi_stampa SET descrizione = ?, velocita = ?, colore = ?, temperatura = ?, ris = ?, fogli = ?, lastre = ?, corpi = ?, cop_fon = ?, caps = ?, tappi = ?, altro = ?, operatore = ?, codice_interno_ptodotto = ?, id_commessa = ?, num_fase = ?, num_linea = ?, ora_inizio = ?, ora_fine = ? WHERE id_fase_stampa = ?';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($fasiStampa->descrizione);
		$sqlQuery->set($fasiStampa->velocita);
		$sqlQuery->set($fasiStampa->colore);
		$sqlQuery->set($fasiStampa->temperatura);
		$sqlQuery->set($fasiStampa->ris);
		$sqlQuery->setNumber($fasiStampa->fogli);
		$sqlQuery->set($fasiStampa->lastre);
		$sqlQuery->setNumber($fasiStampa->corpi);
		$sqlQuery->setNumber($fasiStampa->copFon);
		$sqlQuery->setNumber($fasiStampa->caps);
		$sqlQuery->setNumber($fasiStampa->tappi);
		$sqlQuery->set($fasiStampa->altro);
		$sqlQuery->set($fasiStampa->operatore);
		$sqlQuery->set($fasiStampa->codiceInternoPtodotto);
		$sqlQuery->setNumber($fasiStampa->idCommessa);
		$sqlQuery->setNumber($fasiStampa->numFase);
		$sqlQuery->setNumber($fasiStampa->numLinea);
		$sqlQuery->setDate($fasiStampa->oraInizio);
		$sqlQuery->setDate($fasiStampa->oraFine);

		$sqlQuery->setNumber($fasiStampa->idFaseStampa);
		return $this->executeUpdate($sqlQuery);
	}

        public function customInsert($fasiStampa){
		$sql = 'INSERT INTO fasi_stampa (descrizione, velocita, colore, temperatura, ris, fogli, lastre, corpi, cop_fon, caps, tappi, altro, operatore, codice_interno_ptodotto, id_commessa, num_fase, num_linea, ora_inizio, ora_fine) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->set($fasiStampa->descrizione);
		$sqlQuery->set($fasiStampa->velocita);
		$sqlQuery->set($fasiStampa->colore);
		$sqlQuery->set($fasiStampa->temperatura);
		$sqlQuery->set($fasiStampa->ris);
		$sqlQuery->setNumber($fasiStampa->fogli);
		$sqlQuery->set($fasiStampa->lastre);
		$sqlQuery->setNumber($fasiStampa->corpi);
		$sqlQuery->setNumber($fasiStampa->copFon);
		$sqlQuery->setNumber($fasiStampa->caps);
		$sqlQuery->setNumber($fasiStampa->tappi);
		$sqlQuery->set($fasiStampa->altro);
		$sqlQuery->set($fasiStampa->operatore);
		$sqlQuery->set($fasiStampa->codiceInternoPtodotto);
		$sqlQuery->setNumber($fasiStampa->idCommessa);
		$sqlQuery->setNumber($fasiStampa->numFase);
		$sqlQuery->setNumber($fasiStampa->numLinea);
		$sqlQuery->setDate($fasiStampa->oraInizio);
		$sqlQuery->setDate($fasiStampa->oraFine);

		$id = $this->executeInsert($sqlQuery);
		$fasiStampa->idFaseStampa = $id;
		return $id;
	}
	
}
?>
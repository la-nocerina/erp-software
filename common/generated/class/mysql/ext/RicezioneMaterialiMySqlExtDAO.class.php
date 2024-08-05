<?php
/**
 * Class that operate on table 'ricezione_materiali'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-03-18 15:01
 */
class RicezioneMaterialiMySqlExtDAO extends RicezioneMaterialiMySqlDAO{

	public function customInsert($ricezioneMateriali){
		$sql = 'INSERT INTO ricezione_materiali (num_documento, id_partner, ddt_n, num_colli, ordine_n, kg, destinazione, tipo, tipo_note, id_partner_provenienza, controlli, n1, n2, n3, n4, n5, n6, n7, n8, n9, n10, n11, n12, data_ddt, data_scarico, compilatore) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->setString($ricezioneMateriali->numDocumento);
		$sqlQuery->setNumber($ricezioneMateriali->idPartner);
		$sqlQuery->set($ricezioneMateriali->ddtN);
		$sqlQuery->setNumber($ricezioneMateriali->numColli);
		$sqlQuery->set($ricezioneMateriali->ordineN);
		$sqlQuery->set($ricezioneMateriali->kg);
		$sqlQuery->set($ricezioneMateriali->destinazione);
		$sqlQuery->setNumber($ricezioneMateriali->tipo);
		$sqlQuery->set($ricezioneMateriali->tipoNote);
		$sqlQuery->setNumber($ricezioneMateriali->idPartnerProvenienza);
		$sqlQuery->set($ricezioneMateriali->controlli);
		$sqlQuery->set($ricezioneMateriali->n1);
		$sqlQuery->set($ricezioneMateriali->n2);
		$sqlQuery->set($ricezioneMateriali->n3);
		$sqlQuery->set($ricezioneMateriali->n4);
		$sqlQuery->set($ricezioneMateriali->n5);
		$sqlQuery->set($ricezioneMateriali->n6);
		$sqlQuery->set($ricezioneMateriali->n7);
		$sqlQuery->set($ricezioneMateriali->n8);
		$sqlQuery->set($ricezioneMateriali->n9);
		$sqlQuery->set($ricezioneMateriali->n10);
		$sqlQuery->set($ricezioneMateriali->n11);
		$sqlQuery->set($ricezioneMateriali->n12);
		$sqlQuery->setDate($ricezioneMateriali->dataDdt);
		$sqlQuery->setDate($ricezioneMateriali->dataScarico);
		$sqlQuery->set($ricezioneMateriali->compilatore);

		$id = $this->executeInsert($sqlQuery);
		$ricezioneMateriali->idRicezioneMateriali = $id;
		return $id;
	}

        public function customUpdate($ricezioneMateriali){
		$sql = 'UPDATE ricezione_materiali SET num_documento = ?, id_partner = ?, ddt_n = ?, num_colli = ?, ordine_n = ?, kg = ?, destinazione = ?, tipo = ?, tipo_note = ?, id_partner_provenienza = ?, controlli = ?, n1 = ?, n2 = ?, n3 = ?, n4 = ?, n5 = ?, n6 = ?, n7 = ?, n8 = ?, n9 = ?, n10 = ?, n11 = ?, n12 = ?, data_ddt = ?, data_scarico = ?, compilatore = ? WHERE id_ricezione_materiali = ?';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->setString($ricezioneMateriali->numDocumento);
		$sqlQuery->setNumber($ricezioneMateriali->idPartner);
		$sqlQuery->set($ricezioneMateriali->ddtN);
		$sqlQuery->setNumber($ricezioneMateriali->numColli);
		$sqlQuery->set($ricezioneMateriali->ordineN);
		$sqlQuery->set($ricezioneMateriali->kg);
		$sqlQuery->set($ricezioneMateriali->destinazione);
		$sqlQuery->setNumber($ricezioneMateriali->tipo);
		$sqlQuery->set($ricezioneMateriali->tipoNote);
		$sqlQuery->setNumber($ricezioneMateriali->idPartnerProvenienza);
		$sqlQuery->set($ricezioneMateriali->controlli);
		$sqlQuery->set($ricezioneMateriali->n1);
		$sqlQuery->set($ricezioneMateriali->n2);
		$sqlQuery->set($ricezioneMateriali->n3);
		$sqlQuery->set($ricezioneMateriali->n4);
		$sqlQuery->set($ricezioneMateriali->n5);
		$sqlQuery->set($ricezioneMateriali->n6);
		$sqlQuery->set($ricezioneMateriali->n7);
		$sqlQuery->set($ricezioneMateriali->n8);
		$sqlQuery->set($ricezioneMateriali->n9);
		$sqlQuery->set($ricezioneMateriali->n10);
		$sqlQuery->set($ricezioneMateriali->n11);
		$sqlQuery->set($ricezioneMateriali->n12);
		$sqlQuery->set($ricezioneMateriali->dataDdt);
		$sqlQuery->setDate($ricezioneMateriali->dataScarico);
		$sqlQuery->setDate($ricezioneMateriali->compilatore);

		$sqlQuery->setNumber($ricezioneMateriali->idRicezioneMateriali);
		return $this->executeUpdate($sqlQuery);
	}

        public function loadLastByAnno($anno){
		$sql = "SELECT * FROM ricezione_materiali WHERE num_documento LIKE '%/$anno' ORDER BY id_ricezione_materiali DESC LIMIT 1";
		$sqlQuery = new SqlQuery($sql);
		return $this->getRow($sqlQuery);
	}
}
?>
<?php
/**
 * Class that operate on table 'prodotti_in_giacenza'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-01-20 13:55
 */
class ProdottiInGiacenzaMySqlExtDAO extends ProdottiInGiacenzaMySqlDAO{

	public function queryByCodice( $codice){
		$sql = 'SELECT prodotti_in_giacenza.* FROM prodotti_in_giacenza INNER JOIN prodotti ON prodotti_in_giacenza.id_prodotto=prodotti.id_prodotto WHERE prodotti.codice_interno = ? ' ;
		$sqlQuery = new SqlQuery($sql);
                $sqlQuery->setString($codice);
		return $this->getList($sqlQuery);
	}

        public function customInsert($prodottiInGiacenza){
		$sql = 'INSERT INTO prodotti_in_giacenza (id_prodotto, quantita, id_magazzino, id_prodotto_in_giacenza_padre, batch, uscita_ddt_n, uscita_data_ddt) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->setNumber($prodottiInGiacenza->idProdotto);
		$sqlQuery->set($prodottiInGiacenza->quantita);
		$sqlQuery->setNumber($prodottiInGiacenza->idMagazzino);
		$sqlQuery->setNumber($prodottiInGiacenza->idProdottoInGiacenzaPadre);
		$sqlQuery->set($prodottiInGiacenza->batch);
		$sqlQuery->set($prodottiInGiacenza->uscitaDdtN);
		$sqlQuery->setDate($prodottiInGiacenza->uscitaDataDdt);

		$id = $this->executeInsert($sqlQuery);
		$prodottiInGiacenza->idProdottoInGiacenza = $id;
		return $id;
	}

        public function customUpdate($prodottiInGiacenza){
		$sql = 'UPDATE prodotti_in_giacenza SET id_prodotto = ?, quantita = ?, id_magazzino = ?, id_prodotto_in_giacenza_padre = ?, batch = ?, uscita_ddt_n = ?, uscita_data_ddt = ? WHERE id_prodotto_in_giacenza = ?';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->setNumber($prodottiInGiacenza->idProdotto);
		$sqlQuery->set($prodottiInGiacenza->quantita);
		$sqlQuery->setNumber($prodottiInGiacenza->idMagazzino);
		$sqlQuery->setNumber($prodottiInGiacenza->idProdottoInGiacenzaPadre);
		$sqlQuery->set($prodottiInGiacenza->batch);
		$sqlQuery->set($prodottiInGiacenza->uscitaDdtN);
		$sqlQuery->setDate($prodottiInGiacenza->uscitaDataDdt);

		$sqlQuery->setNumber($prodottiInGiacenza->idProdottoInGiacenza);
		return $this->executeUpdate($sqlQuery);
	}

}
?>
<?php
/**
 * Class that operate on table 'associa_fasi_stampa_giacenze'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-02-26 15:56
 */
class AssociaFasiStampaGiacenzeMySqlExtDAO extends AssociaFasiStampaGiacenzeMySqlDAO{
    
        public function queryByIdFase($value){
		$sql = 'SELECT * FROM associa_fasi_stampa_giacenze WHERE id_fase_stampa = ? ORDER BY data_ora';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

        public function queryByIdFaseAndTurno($IDFase, $turno){
                if($turno=="M" || $turno=="P" || $turno=="N" ){
                    $sql = 'SELECT associa_fasi_stampa_giacenze.* FROM associa_fasi_stampa_giacenze INNER JOIN schede_produzione ON associa_fasi_stampa_giacenze.id_scheda_produzione= schede_produzione.id_scheda_produzione WHERE id_fase_stampa = ? AND schede_produzione.turno = ? ORDER BY data_ora';
                    $sqlQuery = new SqlQuery($sql);
                    $sqlQuery->setNumber($IDFase);
                    $sqlQuery->setString($turno);
                }
                if($turno=='I' ){
                    $sql = 'SELECT associa_fasi_stampa_giacenze.* FROM associa_fasi_stampa_giacenze INNER JOIN schede_produzione ON associa_fasi_stampa_giacenze.id_scheda_produzione= schede_produzione.id_scheda_produzione WHERE id_fase_stampa = ? AND schede_produzione.turno != "M" AND schede_produzione.turno != "P" AND schede_produzione.turno != "N" ORDER BY data_ora';
                    $sqlQuery = new SqlQuery($sql);
                    $sqlQuery->setNumber($IDFase);
                }
		return $this->getList($sqlQuery);
	}

        public function loadLastByLinea($linea){
		$sql = 'SELECT associa_fasi_stampa_giacenze.* FROM associa_fasi_stampa_giacenze INNER JOIN fasi_stampa ON associa_fasi_stampa_giacenze.id_fase_stampa=fasi_stampa.id_fase_stampa  WHERE fasi_stampa.num_linea= ? AND associa_fasi_stampa_giacenze.num_fogli IS NULL LIMIT 1';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($linea);
		return $this->getRow($sqlQuery);
	}

        public function queryByIdProdottoInGiacenza($idProdottoInGiacenza){
		$sql = 'SELECT * FROM associa_fasi_stampa_giacenze WHERE id_prodotto_in_giacenza = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idProdottoInGiacenza);

		return $this->getList($sqlQuery);
	}
}
?>
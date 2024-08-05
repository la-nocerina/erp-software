<?php
/**
 * Class that operate on table 'associa_fasi_giacenze'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-02-10 16:54
 */
class AssociaFasiGiacenzeMySqlExtDAO extends AssociaFasiGiacenzeMySqlDAO{
        public function queryByIdFase($value){
		$sql = 'SELECT * FROM associa_fasi_giacenze WHERE id_fase = ? ORDER BY data_ora';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

        public function queryByLinea($value){
		$sql = 'SELECT associa_fasi_giacenze.* FROM associa_fasi_giacenze INNER JOIN fasi ON associa_fasi_giacenze.id_fase=fasi.id_fase  WHERE fasi.num_linea= ? ORDER BY data_ora';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

        public function queryPreviousByIDGiacenzaAndData($idGiacenza, $data){
            $sql = 'SELECT * FROM `associa_fasi_giacenze` WHERE `id_prodotto_in_giacenza`= ? and `data_ora`< ? ';
            $sqlQuery = new SqlQuery($sql);
            $sqlQuery->setNumber($idGiacenza);
            $sqlQuery->set($data);
            return $this->getList($sqlQuery);
        }

        public function queryByIdFaseAndTurno($IDFase, $turno){
                if($turno=="M" || $turno=="P" || $turno=="N" ){
                    $sql = 'SELECT associa_fasi_giacenze.* FROM associa_fasi_giacenze INNER JOIN schede_produzione ON associa_fasi_giacenze.id_scheda_produzione= schede_produzione.id_scheda_produzione WHERE id_fase = ? AND schede_produzione.turno = ? ORDER BY data_ora';
                    $sqlQuery = new SqlQuery($sql);
                    $sqlQuery->setNumber($IDFase);
                    $sqlQuery->setString($turno);
                }
                if($turno=='I' ){
                    $sql = 'SELECT associa_fasi_giacenze.* FROM associa_fasi_giacenze INNER JOIN schede_produzione ON associa_fasi_giacenze.id_scheda_produzione= schede_produzione.id_scheda_produzione WHERE id_fase = ? AND schede_produzione.turno != "M" AND schede_produzione.turno != "P" AND schede_produzione.turno != "N" ORDER BY data_ora';
                    $sqlQuery = new SqlQuery($sql);
                    $sqlQuery->setNumber($IDFase);
                }
		return $this->getList($sqlQuery);
	}

        public function loadLastByLinea($linea){
		$sql = 'SELECT associa_fasi_giacenze.* FROM associa_fasi_giacenze INNER JOIN fasi ON associa_fasi_giacenze.id_fase=fasi.id_fase  WHERE fasi.num_linea= ? AND associa_fasi_giacenze.num_fogli IS NULL LIMIT 1';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($linea);
		return $this->getRow($sqlQuery);
	}

        public function queryByIdProdottoInGiacenza($idProdottoInGiacenza){
		$sql = 'SELECT * FROM associa_fasi_giacenze WHERE id_prodotto_in_giacenza = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idProdottoInGiacenza);

		return $this->getList($sqlQuery);
	}
	
}
?>
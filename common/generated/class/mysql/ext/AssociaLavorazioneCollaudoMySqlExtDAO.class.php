<?php
/**
 * Class that operate on table 'associa_lavorazione_collaudo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-01-20 13:55
 */
class AssociaLavorazioneCollaudoMySqlExtDAO extends AssociaLavorazioneCollaudoMySqlDAO{

        public function queryByIdCollaudoAndTipo($idCertificatoCollaudo, $tipo){
            $sql = 'SELECT associa_lavorazione_collaudo.* FROM associa_lavorazione_collaudo INNER JOIN lavorazioni ON associa_lavorazione_collaudo.lavorazioni_id_lavorazione=lavorazioni.id_lavorazione  WHERE certificati_collaudo_id_certificato_collaudo = ? and lavorazioni.tipo_lavorazione= ? ';
            $sqlQuery = new SqlQuery($sql);
            $sqlQuery->setNumber($idCertificatoCollaudo);
            $sqlQuery->setString($tipo);
            return $this->getList($sqlQuery);
	}

        public function queryByIdCollaudo($idCertificatoCollaudo){
            $sql = 'SELECT * FROM associa_lavorazione_collaudo  WHERE certificati_collaudo_id_certificato_collaudo = ? ';
            $sqlQuery = new SqlQuery($sql);
            $sqlQuery->setNumber($idCertificatoCollaudo);
            return $this->getList($sqlQuery);
	}

        public function deleteByIdCollaudo( $certificatiCollaudoIdCertificatoCollaudo){
		$sql = 'DELETE FROM associa_lavorazione_collaudo WHERE certificati_collaudo_id_certificato_collaudo = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($certificatiCollaudoIdCertificatoCollaudo);
		return $this->executeUpdate($sqlQuery);
	}
}
?>
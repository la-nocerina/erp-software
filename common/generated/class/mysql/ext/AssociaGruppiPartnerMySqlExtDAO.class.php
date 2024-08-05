<?php
/**
 * Class that operate on table 'associa_gruppi_partner'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-01-15 14:04
 */
class AssociaGruppiPartnerMySqlExtDAO extends AssociaGruppiPartnerMySqlDAO{

    public function load_by_partner($idPartner){
        $sql = 'SELECT * FROM associa_gruppi_partner WHERE id_partner = ?  ';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($idPartner);
        return $this->getList($sqlQuery);
    }
	
}
?>
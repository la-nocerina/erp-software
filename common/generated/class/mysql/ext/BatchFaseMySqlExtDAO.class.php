<?php
/**
 * Class that operate on table 'batch_fase'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-03-09 08:49
 */
class BatchFaseMySqlExtDAO extends BatchFaseMySqlDAO{
    
    
    public function queryByFase( $idFase ) {
        $sql = 'SELECT * FROM batch_fase WHERE id_fase = ? ';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($idFase);
        return $this->getList($sqlQuery);
    }


    public function queryByIdProdottoGiacenza( $idProdottoGiacenza ) {
        $sql = 'SELECT * FROM batch_fase WHERE id_prodotto_in_giacenza = ? ';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($idProdottoGiacenza);
        return $this->getList($sqlQuery);
    }
	
}
?>
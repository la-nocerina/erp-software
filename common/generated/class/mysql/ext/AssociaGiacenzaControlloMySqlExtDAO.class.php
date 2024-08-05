<?php
/**
 * Class that operate on table 'associa_giacenza_controllo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-03-04 16:43
 */
class AssociaGiacenzaControlloMySqlExtDAO extends AssociaGiacenzaControlloMySqlDAO{

	public function loadByIdProdottoInGiacenzaANDIdControlliQualita($id_controllo, $id_giac){
		$sql = 'SELECT * FROM associa_giacenza_controllo WHERE id_controlli_qualita = ? AND id_prodotto_in_giacenza = ? LIMIT 1';
		$sqlQuery = new SqlQuery($sql);
                $sqlQuery->setNumber($id_controllo);
		$sqlQuery->setNumber($id_giac);
		return $this->getRow($sqlQuery);
	}


	public function loadByIdControlliQualitaANDNumPacco($id_controllo, $num_pacco){
		//$sql = 'SELECT * FROM associa_giacenza_controllo WHERE id_controlli_qualita = ? AND id_prodotto_in_giacenza = ? LIMIT 1';
                $sql = "SELECT associa_giacenza_controllo.* FROM associa_giacenza_controllo INNER JOIN certificati_collaudo ON associa_giacenza_controllo.id_prodotto_in_giacenza = certificati_collaudo.id_prodotto_in_giacenza WHERE associa_giacenza_controllo.id_controlli_qualita= $id_controllo and ( (pacco_n='$num_pacco') OR (pacco_n LIKE '$num_pacco/%' ) ) LIMIT 1";
		$sqlQuery = new SqlQuery($sql);
                //$sqlQuery->setNumber($id_controllo);
		//$sqlQuery->setNumber($id_giac);
		return $this->getRow($sqlQuery);
	}
        
}
?>
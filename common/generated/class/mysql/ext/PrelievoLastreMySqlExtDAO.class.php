<?php
/**
 * Class that operate on table 'prelievo_lastre'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-03-30 13:16
 */
class PrelievoLastreMySqlExtDAO extends PrelievoLastreMySqlDAO{

	function queryLastData($numMax){
            $sql = "SELECT * FROM `prelievo_lastre` GROUP BY `data` ORDER BY `data` DESC LIMIT $numMax";
            $sqlQuery = new SqlQuery($sql);
            return $this->getList($sqlQuery);
        }
}
?>
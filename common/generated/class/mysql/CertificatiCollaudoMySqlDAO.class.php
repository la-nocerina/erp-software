<?php
/**
 * Class that operate on table 'certificati_collaudo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2011-04-02 23:01
 */
class CertificatiCollaudoMySqlDAO implements CertificatiCollaudoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CertificatiCollaudoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM certificati_collaudo WHERE id_certificato_collaudo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM certificati_collaudo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM certificati_collaudo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param certificatiCollaudo primary key
 	 */
	public function delete($id_certificato_collaudo){
		$sql = 'DELETE FROM certificati_collaudo WHERE id_certificato_collaudo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_certificato_collaudo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CertificatiCollaudoMySql certificatiCollaudo
 	 */
	public function insert($certificatiCollaudo){
		$sql = 'INSERT INTO certificati_collaudo (id_partner, ddt_n, del, num_colli, kg, formato, tempra, spessore, comm_n, coll_n, pacco_n, id_prodotto_in_giacenza, bozzetto, verificatore, contestazione, data, num_pacco_ferriera, note, lavorazioni, num_stampe, classificazione, materiale) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($certificatiCollaudo->idPartner);
		$sqlQuery->set($certificatiCollaudo->ddtN);
		$sqlQuery->set($certificatiCollaudo->del);
		$sqlQuery->setNumber($certificatiCollaudo->numColli);
		$sqlQuery->set($certificatiCollaudo->kg);
		$sqlQuery->set($certificatiCollaudo->formato);
		$sqlQuery->set($certificatiCollaudo->tempra);
		$sqlQuery->set($certificatiCollaudo->spessore);
		$sqlQuery->set($certificatiCollaudo->commN);
		$sqlQuery->set($certificatiCollaudo->collN);
		$sqlQuery->set($certificatiCollaudo->paccoN);
		$sqlQuery->setNumber($certificatiCollaudo->idProdottoInGiacenza);
		$sqlQuery->set($certificatiCollaudo->bozzetto);
		$sqlQuery->set($certificatiCollaudo->verificatore);
		$sqlQuery->set($certificatiCollaudo->contestazione);
		$sqlQuery->set($certificatiCollaudo->data);
		$sqlQuery->set($certificatiCollaudo->numPaccoFerriera);
		$sqlQuery->set($certificatiCollaudo->note);
		$sqlQuery->set($certificatiCollaudo->lavorazioni);
		$sqlQuery->setNumber($certificatiCollaudo->numStampe);
		$sqlQuery->set($certificatiCollaudo->classificazione);
		$sqlQuery->setNumber($certificatiCollaudo->materiale);

		$id = $this->executeInsert($sqlQuery);	
		$certificatiCollaudo->idCertificatoCollaudo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CertificatiCollaudoMySql certificatiCollaudo
 	 */
	public function update($certificatiCollaudo){
		$sql = 'UPDATE certificati_collaudo SET id_partner = ?, ddt_n = ?, del = ?, num_colli = ?, kg = ?, formato = ?, tempra = ?, spessore = ?, comm_n = ?, coll_n = ?, pacco_n = ?, id_prodotto_in_giacenza = ?, bozzetto = ?, verificatore = ?, contestazione = ?, data = ?, num_pacco_ferriera = ?, note = ?, lavorazioni = ?, num_stampe = ?, classificazione = ?, materiale = ? WHERE id_certificato_collaudo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($certificatiCollaudo->idPartner);
		$sqlQuery->set($certificatiCollaudo->ddtN);
		$sqlQuery->set($certificatiCollaudo->del);
		$sqlQuery->setNumber($certificatiCollaudo->numColli);
		$sqlQuery->set($certificatiCollaudo->kg);
		$sqlQuery->set($certificatiCollaudo->formato);
		$sqlQuery->set($certificatiCollaudo->tempra);
		$sqlQuery->set($certificatiCollaudo->spessore);
		$sqlQuery->set($certificatiCollaudo->commN);
		$sqlQuery->set($certificatiCollaudo->collN);
		$sqlQuery->set($certificatiCollaudo->paccoN);
		$sqlQuery->setNumber($certificatiCollaudo->idProdottoInGiacenza);
		$sqlQuery->set($certificatiCollaudo->bozzetto);
		$sqlQuery->set($certificatiCollaudo->verificatore);
		$sqlQuery->set($certificatiCollaudo->contestazione);
		$sqlQuery->set($certificatiCollaudo->data);
		$sqlQuery->set($certificatiCollaudo->numPaccoFerriera);
		$sqlQuery->set($certificatiCollaudo->note);
		$sqlQuery->set($certificatiCollaudo->lavorazioni);
		$sqlQuery->setNumber($certificatiCollaudo->numStampe);
		$sqlQuery->set($certificatiCollaudo->classificazione);
		$sqlQuery->setNumber($certificatiCollaudo->materiale);

		$sqlQuery->setNumber($certificatiCollaudo->idCertificatoCollaudo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM certificati_collaudo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdPartner($value){
		$sql = 'SELECT * FROM certificati_collaudo WHERE id_partner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDdtN($value){
		$sql = 'SELECT * FROM certificati_collaudo WHERE ddt_n = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDel($value){
		$sql = 'SELECT * FROM certificati_collaudo WHERE del = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumColli($value){
		$sql = 'SELECT * FROM certificati_collaudo WHERE num_colli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByKg($value){
		$sql = 'SELECT * FROM certificati_collaudo WHERE kg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFormato($value){
		$sql = 'SELECT * FROM certificati_collaudo WHERE formato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTempra($value){
		$sql = 'SELECT * FROM certificati_collaudo WHERE tempra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySpessore($value){
		$sql = 'SELECT * FROM certificati_collaudo WHERE spessore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCommN($value){
		$sql = 'SELECT * FROM certificati_collaudo WHERE comm_n = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCollN($value){
		$sql = 'SELECT * FROM certificati_collaudo WHERE coll_n = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaccoN($value){
		$sql = 'SELECT * FROM certificati_collaudo WHERE pacco_n = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdProdottoInGiacenza($value){
		$sql = 'SELECT * FROM certificati_collaudo WHERE id_prodotto_in_giacenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBozzetto($value){
		$sql = 'SELECT * FROM certificati_collaudo WHERE bozzetto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVerificatore($value){
		$sql = 'SELECT * FROM certificati_collaudo WHERE verificatore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContestazione($value){
		$sql = 'SELECT * FROM certificati_collaudo WHERE contestazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM certificati_collaudo WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumPaccoFerriera($value){
		$sql = 'SELECT * FROM certificati_collaudo WHERE num_pacco_ferriera = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM certificati_collaudo WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLavorazioni($value){
		$sql = 'SELECT * FROM certificati_collaudo WHERE lavorazioni = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumStampe($value){
		$sql = 'SELECT * FROM certificati_collaudo WHERE num_stampe = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByClassificazione($value){
		$sql = 'SELECT * FROM certificati_collaudo WHERE classificazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMateriale($value){
		$sql = 'SELECT * FROM certificati_collaudo WHERE materiale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdPartner($value){
		$sql = 'DELETE FROM certificati_collaudo WHERE id_partner = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDdtN($value){
		$sql = 'DELETE FROM certificati_collaudo WHERE ddt_n = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDel($value){
		$sql = 'DELETE FROM certificati_collaudo WHERE del = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumColli($value){
		$sql = 'DELETE FROM certificati_collaudo WHERE num_colli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKg($value){
		$sql = 'DELETE FROM certificati_collaudo WHERE kg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFormato($value){
		$sql = 'DELETE FROM certificati_collaudo WHERE formato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTempra($value){
		$sql = 'DELETE FROM certificati_collaudo WHERE tempra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySpessore($value){
		$sql = 'DELETE FROM certificati_collaudo WHERE spessore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCommN($value){
		$sql = 'DELETE FROM certificati_collaudo WHERE comm_n = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCollN($value){
		$sql = 'DELETE FROM certificati_collaudo WHERE coll_n = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaccoN($value){
		$sql = 'DELETE FROM certificati_collaudo WHERE pacco_n = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdProdottoInGiacenza($value){
		$sql = 'DELETE FROM certificati_collaudo WHERE id_prodotto_in_giacenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBozzetto($value){
		$sql = 'DELETE FROM certificati_collaudo WHERE bozzetto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVerificatore($value){
		$sql = 'DELETE FROM certificati_collaudo WHERE verificatore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContestazione($value){
		$sql = 'DELETE FROM certificati_collaudo WHERE contestazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM certificati_collaudo WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumPaccoFerriera($value){
		$sql = 'DELETE FROM certificati_collaudo WHERE num_pacco_ferriera = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM certificati_collaudo WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLavorazioni($value){
		$sql = 'DELETE FROM certificati_collaudo WHERE lavorazioni = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumStampe($value){
		$sql = 'DELETE FROM certificati_collaudo WHERE num_stampe = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByClassificazione($value){
		$sql = 'DELETE FROM certificati_collaudo WHERE classificazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMateriale($value){
		$sql = 'DELETE FROM certificati_collaudo WHERE materiale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CertificatiCollaudoMySql 
	 */
	protected function readRow($row){
		$certificatiCollaudo = new CertificatiCollaudo();
		
		$certificatiCollaudo->idCertificatoCollaudo = $row['id_certificato_collaudo'];
		$certificatiCollaudo->idPartner = $row['id_partner'];
		$certificatiCollaudo->ddtN = $row['ddt_n'];
		$certificatiCollaudo->del = $row['del'];
		$certificatiCollaudo->numColli = $row['num_colli'];
		$certificatiCollaudo->kg = $row['kg'];
		$certificatiCollaudo->formato = $row['formato'];
		$certificatiCollaudo->tempra = $row['tempra'];
		$certificatiCollaudo->spessore = $row['spessore'];
		$certificatiCollaudo->commN = $row['comm_n'];
		$certificatiCollaudo->collN = $row['coll_n'];
		$certificatiCollaudo->paccoN = $row['pacco_n'];
		$certificatiCollaudo->idProdottoInGiacenza = $row['id_prodotto_in_giacenza'];
		$certificatiCollaudo->bozzetto = $row['bozzetto'];
		$certificatiCollaudo->verificatore = $row['verificatore'];
		$certificatiCollaudo->contestazione = $row['contestazione'];
		$certificatiCollaudo->data = $row['data'];
		$certificatiCollaudo->numPaccoFerriera = $row['num_pacco_ferriera'];
		$certificatiCollaudo->note = $row['note'];
		$certificatiCollaudo->lavorazioni = $row['lavorazioni'];
		$certificatiCollaudo->numStampe = $row['num_stampe'];
		$certificatiCollaudo->classificazione = $row['classificazione'];
		$certificatiCollaudo->materiale = $row['materiale'];

		return $certificatiCollaudo;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return CertificatiCollaudoMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>
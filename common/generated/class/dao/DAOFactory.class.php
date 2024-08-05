<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return AssociaFasiGiacenzeDAO
	 */
	public static function getAssociaFasiGiacenzeDAO(){
		return new AssociaFasiGiacenzeMySqlExtDAO();
	}

	/**
	 * @return AssociaFasiStampaGiacenzeDAO
	 */
	public static function getAssociaFasiStampaGiacenzeDAO(){
		return new AssociaFasiStampaGiacenzeMySqlExtDAO();
	}

	/**
	 * @return AssociaGiacenzaControlloDAO
	 */
	public static function getAssociaGiacenzaControlloDAO(){
		return new AssociaGiacenzaControlloMySqlExtDAO();
	}

	/**
	 * @return AssociaGruppiPartnerDAO
	 */
	public static function getAssociaGruppiPartnerDAO(){
		return new AssociaGruppiPartnerMySqlExtDAO();
	}

	/**
	 * @return BatchFaseDAO
	 */
	public static function getBatchFaseDAO(){
		return new BatchFaseMySqlExtDAO();
	}

	/**
	 * @return CategorieProdDAO
	 */
	public static function getCategorieProdDAO(){
		return new CategorieProdMySqlExtDAO();
	}

	/**
	 * @return CauseFermateDAO
	 */
	public static function getCauseFermateDAO(){
		return new CauseFermateMySqlExtDAO();
	}

	/**
	 * @return CertificatiCollaudoDAO
	 */
	public static function getCertificatiCollaudoDAO(){
		return new CertificatiCollaudoMySqlExtDAO();
	}

	/**
	 * @return CommesseDAO
	 */
	public static function getCommesseDAO(){
		return new CommesseMySqlExtDAO();
	}

	/**
	 * @return ControlliAggiuntiviDAO
	 */
	public static function getControlliAggiuntiviDAO(){
		return new ControlliAggiuntiviMySqlExtDAO();
	}

	/**
	 * @return ControlliFaseDAO
	 */
	public static function getControlliFaseDAO(){
		return new ControlliFaseMySqlExtDAO();
	}

	/**
	 * @return ControlliFaseStampaDAO
	 */
	public static function getControlliFaseStampaDAO(){
		return new ControlliFaseStampaMySqlExtDAO();
	}

	/**
	 * @return ControlliQualitaDAO
	 */
	public static function getControlliQualitaDAO(){
		return new ControlliQualitaMySqlExtDAO();
	}

	/**
	 * @return DateControlliQualitaDAO
	 */
	public static function getDateControlliQualitaDAO(){
		return new DateControlliQualitaMySqlExtDAO();
	}

	/**
	 * @return DepositoLastreDAO
	 */
	public static function getDepositoLastreDAO(){
		return new DepositoLastreMySqlExtDAO();
	}

	/**
	 * @return FasiDAO
	 */
	public static function getFasiDAO(){
		return new FasiMySqlExtDAO();
	}

	/**
	 * @return FasiStampaDAO
	 */
	public static function getFasiStampaDAO(){
		return new FasiStampaMySqlExtDAO();
	}

	/**
	 * @return FermateGuastiDAO
	 */
	public static function getFermateGuastiDAO(){
		return new FermateGuastiMySqlExtDAO();
	}

	/**
	 * @return GruppiPartnerDAO
	 */
	public static function getGruppiPartnerDAO(){
		return new GruppiPartnerMySqlExtDAO();
	}

	/**
	 * @return MacchinariDAO
	 */
	public static function getMacchinariDAO(){
		return new MacchinariMySqlExtDAO();
	}

	/**
	 * @return MagazziniDAO
	 */
	public static function getMagazziniDAO(){
		return new MagazziniMySqlExtDAO();
	}

	/**
	 * @return NazioniDAO
	 */
	public static function getNazioniDAO(){
		return new NazioniMySqlExtDAO();
	}

	/**
	 * @return NoteProveDAO
	 */
	public static function getNoteProveDAO(){
		return new NoteProveMySqlExtDAO();
	}

	/**
	 * @return PartnerDAO
	 */
	public static function getPartnerDAO(){
		return new PartnerMySqlExtDAO();
	}

	/**
	 * @return PartnerReferenceDAO
	 */
	public static function getPartnerReferenceDAO(){
		return new PartnerReferenceMySqlExtDAO();
	}

	/**
	 * @return PrelievoLastreDAO
	 */
	public static function getPrelievoLastreDAO(){
		return new PrelievoLastreMySqlExtDAO();
	}

	/**
	 * @return ProdottiDAO
	 */
	public static function getProdottiDAO(){
		return new ProdottiMySqlExtDAO();
	}

	/**
	 * @return ProdottiInGiacenzaDAO
	 */
	public static function getProdottiInGiacenzaDAO(){
		return new ProdottiInGiacenzaMySqlExtDAO();
	}

	/**
	 * @return ProveControlliLineaDAO
	 */
	public static function getProveControlliLineaDAO(){
		return new ProveControlliLineaMySqlExtDAO();
	}

	/**
	 * @return RicezioneMaterialiDAO
	 */
	public static function getRicezioneMaterialiDAO(){
		return new RicezioneMaterialiMySqlExtDAO();
	}

	/**
	 * @return SchedeProduzioneDAO
	 */
	public static function getSchedeProduzioneDAO(){
		return new SchedeProduzioneMySqlExtDAO();
	}

	/**
	 * @return SchedeProveDAO
	 */
	public static function getSchedeProveDAO(){
		return new SchedeProveMySqlExtDAO();
	}

	/**
	 * @return SchedeTecnicheDAO
	 */
	public static function getSchedeTecnicheDAO(){
		return new SchedeTecnicheMySqlExtDAO();
	}

	/**
	 * @return UnitaMisuraDAO
	 */
	public static function getUnitaMisuraDAO(){
		return new UnitaMisuraMySqlExtDAO();
	}


}
?>
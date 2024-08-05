<?php
	//include all DAO files
	require_once('class/sql/Connection.class.php');
	require_once('class/sql/ConnectionFactory.class.php');
	require_once('class/sql/ConnectionProperty.class.php');
	require_once('class/sql/QueryExecutor.class.php');
	require_once('class/sql/Transaction.class.php');
	require_once('class/sql/SqlQuery.class.php');
	require_once('class/core/ArrayList.class.php');
	require_once('class/dao/DAOFactory.class.php');
 	
	require_once('class/dao/AssociaFasiGiacenzeDAO.class.php');
	require_once('class/dto/AssociaFasiGiacenze.class.php');
	require_once('class/mysql/AssociaFasiGiacenzeMySqlDAO.class.php');
	require_once('class/mysql/ext/AssociaFasiGiacenzeMySqlExtDAO.class.php');
	require_once('class/dao/AssociaFasiStampaGiacenzeDAO.class.php');
	require_once('class/dto/AssociaFasiStampaGiacenze.class.php');
	require_once('class/mysql/AssociaFasiStampaGiacenzeMySqlDAO.class.php');
	require_once('class/mysql/ext/AssociaFasiStampaGiacenzeMySqlExtDAO.class.php');
	require_once('class/dao/AssociaGiacenzaControlloDAO.class.php');
	require_once('class/dto/AssociaGiacenzaControllo.class.php');
	require_once('class/mysql/AssociaGiacenzaControlloMySqlDAO.class.php');
	require_once('class/mysql/ext/AssociaGiacenzaControlloMySqlExtDAO.class.php');
	require_once('class/dao/AssociaGruppiPartnerDAO.class.php');
	require_once('class/dto/AssociaGruppiPartner.class.php');
	require_once('class/mysql/AssociaGruppiPartnerMySqlDAO.class.php');
	require_once('class/mysql/ext/AssociaGruppiPartnerMySqlExtDAO.class.php');
	require_once('class/dao/BatchFaseDAO.class.php');
	require_once('class/dto/BatchFase.class.php');
	require_once('class/mysql/BatchFaseMySqlDAO.class.php');
	require_once('class/mysql/ext/BatchFaseMySqlExtDAO.class.php');
	require_once('class/dao/CategorieProdDAO.class.php');
	require_once('class/dto/CategorieProd.class.php');
	require_once('class/mysql/CategorieProdMySqlDAO.class.php');
	require_once('class/mysql/ext/CategorieProdMySqlExtDAO.class.php');
	require_once('class/dao/CauseFermateDAO.class.php');
	require_once('class/dto/CauseFermate.class.php');
	require_once('class/mysql/CauseFermateMySqlDAO.class.php');
	require_once('class/mysql/ext/CauseFermateMySqlExtDAO.class.php');
	require_once('class/dao/CertificatiCollaudoDAO.class.php');
	require_once('class/dto/CertificatiCollaudo.class.php');
	require_once('class/mysql/CertificatiCollaudoMySqlDAO.class.php');
	require_once('class/mysql/ext/CertificatiCollaudoMySqlExtDAO.class.php');
	require_once('class/dao/CommesseDAO.class.php');
	require_once('class/dto/Commesse.class.php');
	require_once('class/mysql/CommesseMySqlDAO.class.php');
	require_once('class/mysql/ext/CommesseMySqlExtDAO.class.php');
	require_once('class/dao/ControlliAggiuntiviDAO.class.php');
	require_once('class/dto/ControlliAggiuntivi.class.php');
	require_once('class/mysql/ControlliAggiuntiviMySqlDAO.class.php');
	require_once('class/mysql/ext/ControlliAggiuntiviMySqlExtDAO.class.php');
	require_once('class/dao/ControlliFaseDAO.class.php');
	require_once('class/dto/ControlliFase.class.php');
	require_once('class/mysql/ControlliFaseMySqlDAO.class.php');
	require_once('class/mysql/ext/ControlliFaseMySqlExtDAO.class.php');
	require_once('class/dao/ControlliFaseStampaDAO.class.php');
	require_once('class/dto/ControlliFaseStampa.class.php');
	require_once('class/mysql/ControlliFaseStampaMySqlDAO.class.php');
	require_once('class/mysql/ext/ControlliFaseStampaMySqlExtDAO.class.php');
	require_once('class/dao/ControlliQualitaDAO.class.php');
	require_once('class/dto/ControlliQualita.class.php');
	require_once('class/mysql/ControlliQualitaMySqlDAO.class.php');
	require_once('class/mysql/ext/ControlliQualitaMySqlExtDAO.class.php');
	require_once('class/dao/DateControlliQualitaDAO.class.php');
	require_once('class/dto/DateControlliQualita.class.php');
	require_once('class/mysql/DateControlliQualitaMySqlDAO.class.php');
	require_once('class/mysql/ext/DateControlliQualitaMySqlExtDAO.class.php');
	require_once('class/dao/DepositoLastreDAO.class.php');
	require_once('class/dto/DepositoLastre.class.php');
	require_once('class/mysql/DepositoLastreMySqlDAO.class.php');
	require_once('class/mysql/ext/DepositoLastreMySqlExtDAO.class.php');
	require_once('class/dao/FasiDAO.class.php');
	require_once('class/dto/Fasi.class.php');
	require_once('class/mysql/FasiMySqlDAO.class.php');
	require_once('class/mysql/ext/FasiMySqlExtDAO.class.php');
	require_once('class/dao/FasiStampaDAO.class.php');
	require_once('class/dto/FasiStampa.class.php');
	require_once('class/mysql/FasiStampaMySqlDAO.class.php');
	require_once('class/mysql/ext/FasiStampaMySqlExtDAO.class.php');
	require_once('class/dao/FermateGuastiDAO.class.php');
	require_once('class/dto/FermateGuasti.class.php');
	require_once('class/mysql/FermateGuastiMySqlDAO.class.php');
	require_once('class/mysql/ext/FermateGuastiMySqlExtDAO.class.php');
	require_once('class/dao/GruppiPartnerDAO.class.php');
	require_once('class/dto/GruppiPartner.class.php');
	require_once('class/mysql/GruppiPartnerMySqlDAO.class.php');
	require_once('class/mysql/ext/GruppiPartnerMySqlExtDAO.class.php');
	require_once('class/dao/MacchinariDAO.class.php');
	require_once('class/dto/Macchinari.class.php');
	require_once('class/mysql/MacchinariMySqlDAO.class.php');
	require_once('class/mysql/ext/MacchinariMySqlExtDAO.class.php');
	require_once('class/dao/MagazziniDAO.class.php');
	require_once('class/dto/Magazzini.class.php');
	require_once('class/mysql/MagazziniMySqlDAO.class.php');
	require_once('class/mysql/ext/MagazziniMySqlExtDAO.class.php');
	require_once('class/dao/NazioniDAO.class.php');
	require_once('class/dto/Nazioni.class.php');
	require_once('class/mysql/NazioniMySqlDAO.class.php');
	require_once('class/mysql/ext/NazioniMySqlExtDAO.class.php');
	require_once('class/dao/NoteProveDAO.class.php');
	require_once('class/dto/NoteProve.class.php');
	require_once('class/mysql/NoteProveMySqlDAO.class.php');
	require_once('class/mysql/ext/NoteProveMySqlExtDAO.class.php');
	require_once('class/dao/PartnerDAO.class.php');
	require_once('class/dto/Partner.class.php');
	require_once('class/mysql/PartnerMySqlDAO.class.php');
	require_once('class/mysql/ext/PartnerMySqlExtDAO.class.php');
	require_once('class/dao/PartnerReferenceDAO.class.php');
	require_once('class/dto/PartnerReference.class.php');
	require_once('class/mysql/PartnerReferenceMySqlDAO.class.php');
	require_once('class/mysql/ext/PartnerReferenceMySqlExtDAO.class.php');
	require_once('class/dao/PrelievoLastreDAO.class.php');
	require_once('class/dto/PrelievoLastre.class.php');
	require_once('class/mysql/PrelievoLastreMySqlDAO.class.php');
	require_once('class/mysql/ext/PrelievoLastreMySqlExtDAO.class.php');
	require_once('class/dao/ProdottiDAO.class.php');
	require_once('class/dto/Prodotti.class.php');
	require_once('class/mysql/ProdottiMySqlDAO.class.php');
	require_once('class/mysql/ext/ProdottiMySqlExtDAO.class.php');
	require_once('class/dao/ProdottiInGiacenzaDAO.class.php');
	require_once('class/dto/ProdottiInGiacenza.class.php');
	require_once('class/mysql/ProdottiInGiacenzaMySqlDAO.class.php');
	require_once('class/mysql/ext/ProdottiInGiacenzaMySqlExtDAO.class.php');
	require_once('class/dao/ProveControlliLineaDAO.class.php');
	require_once('class/dto/ProveControlliLinea.class.php');
	require_once('class/mysql/ProveControlliLineaMySqlDAO.class.php');
	require_once('class/mysql/ext/ProveControlliLineaMySqlExtDAO.class.php');
	require_once('class/dao/RicezioneMaterialiDAO.class.php');
	require_once('class/dto/RicezioneMateriali.class.php');
	require_once('class/mysql/RicezioneMaterialiMySqlDAO.class.php');
	require_once('class/mysql/ext/RicezioneMaterialiMySqlExtDAO.class.php');
	require_once('class/dao/SchedeProduzioneDAO.class.php');
	require_once('class/dto/SchedeProduzione.class.php');
	require_once('class/mysql/SchedeProduzioneMySqlDAO.class.php');
	require_once('class/mysql/ext/SchedeProduzioneMySqlExtDAO.class.php');
	require_once('class/dao/SchedeProveDAO.class.php');
	require_once('class/dto/SchedeProve.class.php');
	require_once('class/mysql/SchedeProveMySqlDAO.class.php');
	require_once('class/mysql/ext/SchedeProveMySqlExtDAO.class.php');
	require_once('class/dao/SchedeTecnicheDAO.class.php');
	require_once('class/dto/SchedeTecniche.class.php');
	require_once('class/mysql/SchedeTecnicheMySqlDAO.class.php');
	require_once('class/mysql/ext/SchedeTecnicheMySqlExtDAO.class.php');
	require_once('class/dao/UnitaMisuraDAO.class.php');
	require_once('class/dto/UnitaMisura.class.php');
	require_once('class/mysql/UnitaMisuraMySqlDAO.class.php');
	require_once('class/mysql/ext/UnitaMisuraMySqlExtDAO.class.php');


?>
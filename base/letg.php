<?php

if (!defined('_ECRIRE_INC_VERSION')) return;

function letg_declarer_champs_extras($champs = array()){
	// options de base
	$options = array(
		'obligatoire' => false,
		'rechercher' => true, // 2 par défaut, 8 pour le titre
		'sql' => "text DEFAULT '' NOT NULL",
		'traitements' => '_TRAITEMENT_TYPO',
		'versionner' => true
	);
	// articles
	$champs['spip_articles']['lieu'] = array(
		'saisie' => 'input',
		'options' => array_merge($options,array(
			'nom' => 'lieu',
			'label' => _T('letg:label_lieu'),
			'restrictions' => array('secteur' => lire_config('letg/secteur_actus',1) .':'. lire_config('letg/secteur_manifs',10))
		))
	);
	$champs['spip_articles']['date_inscription'] = array(
		'saisie' => 'date',
		'options' => array(
			'nom' => 'date_inscription',
			'label' => _T('letg:label_date_inscription'),
			'restrictions' => array('secteur' => lire_config('letg/secteur_theses',2)),
			'sql' => "datetime DEFAULT '0000-00-00 00:00:00' NOT NULL",
			'defaut' => '',
			'traitements' => 'normaliser_date(%s)',
		),
		'verifier' => array(
			'type' => 'date',
			'options' => array(
				'normaliser' => 'datetime',
			)
		)
	);
	$champs['spip_articles']['date_soutenance'] = array(
		'saisie' => 'date',
		'options' => array(
			'nom' => 'date_soutenance',
			'label' => _T('letg:label_date_soutenance'),
			'restrictions' => array('secteur' => lire_config('letg/secteur_theses',2)),
			'sql' => "datetime DEFAULT '0000-00-00 00:00:00' NOT NULL",
			'defaut' => '',
			'traitements' => 'normaliser_date(%s)',
		),
		'verifier' => array(
			'type' => 'date',
			'options' => array(
				'normaliser' => 'datetime',
			)
		)
	);
	$champs['spip_articles']['ecole_doctorale'] = array(
		'saisie' => 'input',
		'options' => array_merge($options,array(
			'nom' => 'ecole_doctorale',
			'label' => _T('letg:label_ecole_doctorale'),
			'restrictions' => array('secteur' => lire_config('letg/secteur_theses',2))
		))
	);
	$champs['spip_articles']['directeur'] = array(
		'saisie' => 'input',
		'options' => array_merge($options,array(
			'nom' => 'directeur',
			'label' => _T('letg:label_directeur'),
			'traitements' => '_TRAITEMENT_RACCOURCIS',
			'restrictions' => array('secteur' => lire_config('letg/secteur_theses',2))
		))
	);
	$champs['spip_articles']['annee_debut'] = array(
		'saisie' => 'input',
		'options' => array_merge($options,array(
			'nom' => 'annee_debut',
			'label' => _T('letg:label_annee_debut'),
			'rechercher' => false,
			'restrictions' => array('secteur' => lire_config('letg/secteur_programmes',5))
		))
	);
	$champs['spip_articles']['annee_fin'] = array(
		'saisie' => 'input',
		'options' => array_merge($options,array(
			'nom' => 'annee_fin',
			'label' => _T('letg:label_annee_fin'),
			'rechercher' => false,
			'restrictions' => array('secteur' => lire_config('letg/secteur_programmes',5))
		))
	);
	$champs['spip_articles']['responsable'] = array(
		'saisie' => 'input',
		'options' => array_merge($options,array(
			'nom' => 'responsable',
			'label' => _T('letg:label_responsable'),
			'traitements' => '_TRAITEMENT_RACCOURCIS',
			'restrictions' => array('secteur' => lire_config('letg/secteur_programmes',5))
		))
	);
	$champs['spip_articles']['financeur'] = array(
		'saisie' => 'input',
		'options' => array_merge($options,array(
			'nom' => 'financeur',
			'label' => _T('letg:label_financeur'),
			'restrictions' => array('secteur' => lire_config('letg/secteur_programmes',5))
		))
	);
	// auteurs
	$champs['spip_auteurs']['prenom'] = array(
		'saisie' => 'input',
		'options' => array(
			'nom' => 'prenom',
			'label' => _T('letg:label_prenom'),
			'obligatoire' => true,
			'rechercher' => true, // 2 par défaut, 8 pour le titre
			'sql' => "text DEFAULT '' NOT NULL",
			'traitements' => '_TRAITEMENT_TYPO',
			'versionner' => true
		)
	);
	$champs['spip_auteurs']['telephone'] = array(
		'saisie' => 'input',
		'options' => array(
			'nom' => 'telephone',
			'label' => _T('letg:label_telephone'),
			'rechercher' => false, // 2 par défaut, 8 pour le titre
			'sql' => "text DEFAULT '' NOT NULL",
			'traitements' => '_TRAITEMENT_TYPO',
			'versionner' => true
		)
	);
	$champs['spip_auteurs']['fonction'] = array(
		'saisie' => 'selection',
		'options' => array(
			'nom' => 'fonction',
			'label' => _T('letg:label_fonction'),
			'rechercher' => true, // 2 par défaut, 8 pour le titre
			'sql' => "text DEFAULT '' NOT NULL",
			'defaut' => '',
			'datas' => array(
				'professeur' => _T('letg:label_fonction_professeur'),
				'maitre_conference' => _T('letg:label_fonction_maitre_conference'),
				'directeur_etude' => _T('letg:label_fonction_directeur_etude'),
				'directeur_recherche' => _T('letg:label_fonction_directeur_recherche'),
				'charge_recherche' => _T('letg:label_fonction_charge_recherche'),
				'chercheur' => _T('letg:label_fonction_chercheur'),
				'doctorant' => _T('letg:label_fonction_doctorant'),
				'post_doctorant' => _T('letg:label_fonction_post_doctorant'),
				'ingenieur_recherche' => _T('letg:label_fonction_ingenieur_recherche'),
				'ingenieur_etude' => _T('letg:label_fonction_ingenieur_etude'),
				'assistant_ingenieur' => _T('letg:label_fonction_assistant_ingenieur'),
				'technicien' => _T('letg:label_fonction_technicien'),
				'past' => _T('letg:label_fonction_past'),
				'secretaire_gestionnaire' => _T('letg:label_fonction_secretaire_gestionnaire'),
				'autre' => _T('letg:label_fonction_autre'),
			),
			'traitements' => '_TRAITEMENT_TYPO',
			'versionner' => true
		)
	);
	$champs['spip_auteurs']['poste'] = array(
		'saisie' => 'radio',
		'options' => array(
			'nom' => 'poste',
			'label' => _T('letg:label_poste'),
			'rechercher' => false, // 2 par défaut, 8 pour le titre
			'sql' => "text DEFAULT '' NOT NULL",
			'defaut' => 'permanent',
			'datas' => array(
				'permanent' =>  _T('letg:label_poste_permanent'), 
				'contractuel' =>  _T('letg:label_poste_contractuel'), 
			),
			'traitements' => '_TRAITEMENT_TYPO',
			'versionner' => true
		)
	);
	$champs['spip_auteurs']['statutpro'] = array(
		'saisie' => 'radio',
		'options' => array(
			'nom' => 'statutpro',
			'label' => _T('letg:label_statutpro'),
			'rechercher' => false, // 2 par défaut, 8 pour le titre
			'sql' => "text DEFAULT '' NOT NULL",
			'defaut' => 'titulaire',
			'datas' => array(
				'titulaire' =>  _T('letg:label_statutpro_titulaire'), 
				'associe' =>  _T('letg:label_statutpro_associe'), 
				'accueilli' =>  _T('letg:label_statutpro_accueilli'), 
			),
			'traitements' => '_TRAITEMENT_TYPO',
			'versionner' => true
		)
	);
	$champs['spip_auteurs']['employeur'] = array(
		'saisie' => 'input',
		'options' => array(
			'nom' => 'employeur',
			'label' => _T('letg:label_employeur'),
			'rechercher' => true, // 2 par défaut, 8 pour le titre
			'sql' => "text DEFAULT '' NOT NULL",
			'traitements' => '_TRAITEMENT_TYPO',
			'versionner' => true
		)
	);
	$champs['spip_auteurs']['lien_publications'] = array(
		'saisie' => 'input',
		'options' => array(
			'nom' => 'lien_publications',
			'label' => _T('letg:label_lien_publications'),
			'rechercher' => false, // 2 par défaut, 8 pour le titre
			'sql' => "text DEFAULT '' NOT NULL",
			'traitements' => '_TRAITEMENT_TYPO',
			'versionner' => true
		)
	);
	$champs['spip_auteurs']['idhal'] = array(
		'saisie' => 'input',
		'options' => array(
			'nom' => 'idhal',
			'label' => _T('letg:label_idhal'),
			'rechercher' => false, // 2 par défaut, 8 pour le titre
			'sql' => "text DEFAULT '' NOT NULL",
			'traitements' => '_TRAITEMENT_TYPO',
			'versionner' => true
		)
	);
	// mots
	$champs['spip_mots']['collection_hal'] = array(
		'saisie' => 'input',
		'options' => array(
			'nom' => 'collection_hal',
			'label' => _T('letg:label_collection_hal'),
			'rechercher' => false, // 2 par défaut, 8 pour le titre
			'sql' => "text DEFAULT '' NOT NULL",
			'traitements' => '_TRAITEMENT_TYPO',
			'versionner' => false,
			'restrictions' => array('groupemot' => lire_config('letg/groupe_labos',1))
		)
	);
	return $champs;
}

?>
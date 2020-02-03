<?php

if (!defined('_ECRIRE_INC_VERSION')) return;

/**
 * Insertion dans le pipeline rechercher_liste_des_champs (SPIP)
 * 
 * Ne pas indexer le champ url_site pour les auteurs
 * 
 * @param array $liste
 * @return array $liste
 */
function letg_rechercher_liste_des_champs($liste){
	unset($liste['auteur']['url_site']);
	return $liste;
}

/**
 * Insertion dans le pipeline pre_boucle (SPIP)
 * 
 * Forcer les critères {tout} sur les boucles auteurs
 * 
 * @param array $boucle
 * @return array $boucle
 */
function letg_pre_boucle($boucle){
	if ($boucle->type_requete == 'auteurs' AND !isset($boucle->modificateur['criteres']['statut'])) {
		$id_table = $boucle->id_table;
		$statut = $id_table .'.statut';
		$boucle->modificateur['criteres']['statut'] = true;
	}
	return $boucle;
}

/**
 * Insertion dans le pipeline accesrestreint_liste_zones_autorisees (plugin accès restreint)
 * 
 * Donner accès à la zone 1 pour tous les admins et rédacteurs
 * 
 * @param string $zones '1,2,3'
 * @param int $id_auteur
 * @return string '1,2,3'
 */
function letg_accesrestreint_liste_zones_autorisees($zones='', $id_auteur=NULL) {
	if (session_get('statut') < 2) {
		$zones = array_unique(array_merge(explode(',',$zones),array(0 => 1)));
		$zones = join(',', $zones);
	}
	return $zones;
}

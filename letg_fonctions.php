<?php

if (!defined('_ECRIRE_INC_VERSION')) return;

/**
 * Retourne la traduction d'une abbréviation docType_s renvoyée par l'API HAL
 *
 * @param string $abbr
 *     La valeur docType_s renvoyée par l'API HAL
 * @return string
 *     La traduction de l'abbréviation
 */
function letg_traduire_doctype($abbr){
	return _T('letg:label_typedoc_'.strtolower($abbr));
}

/**
 * Autorisation d'ajout d'un logo à un auteur
 * Surcharge du core de SPIP
 *
 * Interdire aux rédacteurs d'envoyer un logo sur leur fiche auteur
 *
 * @param string $faire
 * @param string $quoi
 * @param int $id
 * @param int $qui
 * @param array $options
 * @return bool
 */
if (!function_exists('autoriser_auteur_iconifier')) {
	function autoriser_auteur_iconifier($faire, $type, $id, $qui, $opt) {
		return false;
	}
}
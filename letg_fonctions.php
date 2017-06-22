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

?>
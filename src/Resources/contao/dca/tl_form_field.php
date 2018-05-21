<?php

/**
 * Contao Open Source CMS
 */

/**
 * @file tl_form_field.php
 * @author Sascha Weidner
 * @package sioweb.dsgvo
 * @copyright Sioweb, Sascha Weidner
 */

$GLOBALS['TL_DCA']['tl_form_field']['config']['onload_callback'][] = array(
	'dsgvo_form_field','setFieldName'
);
$GLOBALS['TL_DCA']['tl_form_field']['config']['onsubmit_callback'][] = array(
	'dsgvo_form_field','adjustDcaByType'
);
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['dsgvo'] = '{type_legend},type,name,label;{fconfig_legend},mandatory;{options_legend},options;{expert_legend:hide},class;{template_legend:hide},customTpl;{invisible_legend:hide},invisible';

class dsgvo_form_field extends tl_form_field {

	/**
	 * Adjust the DCA by type
	 *
	 * @param object
	 */
	public function adjustDcaByType($dc)
	{
		$objField = FormFieldModel::findByPk($dc->id);
		if ($objField->type === 'dsgvo') {
			$GLOBALS['TL_DCA']['tl_form_field']['fields']['name']['eval']['readonly'] = true;
			$GLOBALS['TL_DCA']['tl_form_field']['fields']['name']['eval']['mandatory'] = false;
		}
	}

	public function setFieldName($dc) {

		$objField = FormFieldModel::findByPk($dc->id);
		// Front end call
		if (!$dc instanceof DataContainer || $objField->type !== 'dsgvo') {
			return;
		}

		// Fallback solution for existing accounts
		if ($dc->activeRecord->lastLogin > 0) {
			$time = $dc->activeRecord->lastLogin;
		} else {
			$time = time();
		}

		$this->Database->prepare("UPDATE tl_form_field SET name=? WHERE id=?")
					   ->execute('dsgvo', $dc->id);
	}
}
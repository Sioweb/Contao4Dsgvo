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
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['dsgvo'] = '{type_legend},type,name,label;{dsgvo_legend},dsgvo_title,dsgvo_content,dsgvo_accept_button,dsgvo_abort_button;{fconfig_legend},mandatory;{options_legend},options;{expert_legend:hide},class;{template_legend:hide},customTpl;{invisible_legend:hide},invisible';


$GLOBALS['TL_DCA']['tl_form_field']['fields']['dsgvo_title'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['dsgvo_title'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'long clr'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dsgvo_content'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['dsgvo_content'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'allowHtml'=>true, 'tl_class'=>'long clr'),
	'sql'                     => "text NULL"
);
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dsgvo_accept_button'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['dsgvo_accept_button'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'long clr'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dsgvo_abort_button'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['dsgvo_abort_button'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'long clr'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);


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
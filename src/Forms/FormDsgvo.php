<?php

namespace Sioweb\Dsgvo\Forms;
use Contao;

class FormDsgvo extends \FormCheckBox
{

	/**
	 * Template
	 *
	 * @var string
	 */
	protected $strTemplate = 'form_checkbox_dsgvo';

	protected $strPrefix = 'widget widget-checkbox widget-accept-dsgvo';
}
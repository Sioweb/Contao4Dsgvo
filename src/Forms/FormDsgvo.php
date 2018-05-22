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

	protected function getModalTitle() {
		return $this->dsgvo_title;
	}
	protected function getModalContent() {
		return $this->dsgvo_content;
	}
	protected function getModalAccept() {
		return $this->dsgvo_accept_button;
	}
	protected function getModalAbort() {
		return $this->dsgvo_abort_button;
	}
}
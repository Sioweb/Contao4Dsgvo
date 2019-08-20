<?php

/**
 * Contao Open Source CMS
 */

/**
 * @file config.php
 * @author Sascha Weidner
 * @package sioweb.dsgvo
 * @copyright Sioweb, Sascha Weidner
 */

$GLOBALS['TL_FFL']['dsgvo'] = 'Sioweb\Dsgvo\Forms\FormDsgvo';

$GLOBALS['TL_CSS'][] = 'bundles/siowebdsgvo/css/jquery.confirm.css|static';
$GLOBALS['TL_JAVASCRIPT'][] = 'bundles/siowebdsgvo/js/jquery.confirm.js|static';
$GLOBALS['TL_JAVASCRIPT'][] = 'bundles/siowebdsgvo/js/dsgvo.confirm.js|static';
$GLOBALS['TL_JAVASCRIPT'][] = 'bundles/siowebdsgvo/js/loadDsgvo.js|static';

$GLOBALS['EFG']['storable_fields'][] = 'dsgvo';

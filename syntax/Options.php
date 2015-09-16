<?php
/**
 * Name: Options.php
 * Description: A Dokuwiki syntax plugin to display options to initialize tA in another language.
 *
 * Author: Phil Hopper
 * Date:   2015-09-08
 */

// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();

// $door43shared is a global instance, and can be used by any of the door43 plugins
if (empty($door43shared)) {
    $door43shared = plugin_load('helper', 'door43shared');
}

/* @var $door43shared helper_plugin_door43shared */
$door43shared->loadPluginBase();

/**
 * Class to display options the user can select to initialize tA in another language
 */
class syntax_plugin_door43ta_Options extends Door43_Syntax_Plugin {

    /**
     * Class constructor
     */
    function __construct() {
        parent::__construct('ta_setup_options', 'ta_options.php');
    }
}

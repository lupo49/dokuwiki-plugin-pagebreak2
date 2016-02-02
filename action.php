<?php
/**
 *  pagebreak2 action plugin
 *
 *  @license      GPL 2 (http://www.gnu.org/licenses/gpl.html)
 *  @author       Matthias Schulte <dokuwiki@lupo49.de>
 *  @version      2013-06-09
 */

if(!defined('DOKU_INC')) die();
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');

require_once(DOKU_PLUGIN.'action.php');

define('KEYWORD_SOURCE_ABSTRACT', 'abstract');
define('KEYWORD_SOURCE_GLOBAL', 'global');
define('KEYWORD_SOURCE_SYNTAX', 'syntax');

class action_plugin_pagebreak2 extends DokuWiki_Action_Plugin {

    function register(Doku_Event_Handler $controller) {
        $controller->register_hook('TPL_METAHEADER_OUTPUT','BEFORE',$this,'pagebreak2',array());
    }

    function pagebreak2(&$event, $param) {
        if(empty($event->data) || empty($event->data['meta'])) return;
        $key = count($event->data['link']);

        $css = array("rel" => "stylesheet",
                     "type" => "text/css",
                     "href" => DOKU_BASE . "lib/plugins/pagebreak2/" . "title-h1.css"
                    );

        $event->data['link'][$key] = $css;
    }
}

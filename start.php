<?php
	/**
	 * Elgg automated user generation plugin
	 * 
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Andr�s Szepesh�zi
	 * @copyright Skawa 2008
	 */

	/**
	 *
	 */
	function hu_skawa_genusers_init() {

		// Load system configuration
		global $CONFIG;
			
		// Load the language file
		register_translations($CONFIG->pluginspath . "hu_skawa_genusers/languages/");
		register_page_handler('genusers','hu_skawa_genusers_page_handler');

	}
	
	function hu_skawa_genusers_pagesetup() {

		if (get_context() == 'admin' && isadminloggedin()) {
			global $CONFIG;
			add_submenu_item(elgg_echo('genusers:short'), $CONFIG->wwwroot . 'pg/genusers/');
		}
	}
	
	function hu_skawa_genusers_page_handler($page) 
	{
		global $CONFIG;
		
		if ($page[0])
		{
			switch ($page[0])
			{
				default : include($CONFIG->pluginspath . "hu_skawa_genusers/index.php"); 
			}
		}
		else
			include($CONFIG->pluginspath . "hu_skawa_genusers/index.php"); 
	}
	
	global $CONFIG;
	
	register_elgg_event_handler('init','system','hu_skawa_genusers_init');
	register_elgg_event_handler('pagesetup','system','hu_skawa_genusers_pagesetup');

	register_action("hu_skawa_genusers/generate",false, $CONFIG->pluginspath . "hu_skawa_genusers/actions/generate.php", true);
	register_action("hu_skawa_genusers/delete",false, $CONFIG->pluginspath . "hu_skawa_genusers/actions/delete.php", true);
	register_action("hu_skawa_genusers/createtest",false, $CONFIG->pluginspath . "hu_skawa_genusers/actions/createtest.php", true);
	
?>
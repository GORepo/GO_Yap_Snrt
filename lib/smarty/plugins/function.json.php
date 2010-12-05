<?php
/**
 * Smarty {json} plugin
 *
 * Type:       function
 * Name:       json
 * Date:       Apr 12, 2009
 * Purpose:    Read JSON from file, decode and assign data to Smarty template variable
 * Syntax:     {json file="filename.json"}: 'file' is a required parameter (URL)
 *             Predefined additional parameters:
 *             - assign="data": assign all JSON data to template variable $data
 *             - obj2obj [ Boolean | default:false ]:
 *               decodes JSON objects as either PHP associative arrays or PHP objects
 *             - debug [ Boolean | default:false ]: print decoded data in template
 *             Variable parameters:
 *             {json file="filename.json" home="homepage" lang="languages"}:
 *               assign (JSONdata)["homepage"] to template variable $home
 *               and (JSONdata)["languages"] to $lang,
 *               compare to: {config_load file="filename.conf" section="homepage"}
 * Install:    Drop into the plugin directory
 * @link       http://jlix.net/extensions/smarty/json
 * @author     Sander Aarts <smarty at jlix dot net>
 * @copyright  2009 Sander Aarts
 * @license    LGPL License
 * @version    1.0.1
 * @param      array
 * @param      Smarty
 */
function smarty_function_json($params, &$smarty)
{
	if(!is_callable('json_decode')) {
		$smarty->_trigger_fatal_error("{json} requires json_decode() function (PHP 5.2.0+)");
	}
	if (empty($params['file'])) {
		$smarty->_trigger_fatal_error("{json} parameter 'file' must not be empty");
	}
	if (isset($params['assign'], $params[$params['assign']])) {
		$smarty->_trigger_fatal_error("{json} parameter 'assign' conflicts with a variable assign parameter (both refer to the same variable)");
	}
	
	$assoc = ($params['obj2obj']==true) ? false : true;
	$json = trim(file_get_contents($params['file']));
	$data = json_decode($json, $assoc);
	
	if($params['debug']==true) {
		echo "<pre>"; 
		print_r($data);
		echo "</pre>";
	}
	
	unset($params['file'], $params['obj2obj'], $params['debug']);
	
	$assign = array();
	foreach ($params as $key => $value) {
		if ($key==='assign') {
			$assign[$value] = $data;
		} else {
			$assign[$key] = $assoc ? $data[$value] : $data->$value;
		}
	}
	
	if (count($assign)>0) {
		$smarty->assign($assign);
	} else {
		return $data;
	}
}

?><!--gen-->
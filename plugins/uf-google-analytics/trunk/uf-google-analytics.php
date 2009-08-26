<?php
/*
Plugin Name: UF Google Analytics Plugin
Version: 0.1
Plugin URI: http://www.webadmin.ufl.edu/
Description: Handling of the Google Analytics footer code and related text on WordPress sites at UF. Requires the <code>uf-plugin-framework</code> plugin.
Author: Joe Spooner <spooner@ufl.edu>
Author URI: http://dev.webadmin.ufl.edu/~dwc/
*/

define('UF_GOOGLE_ANALYTICS_PLUGIN_BASE', dirname(__FILE__) . '/');

// Load the plugin after the framework
add_action('plugins_loaded', 'uf_google_analytics_plugins_loaded');


$uf_google_analytics_plugin = null;
function uf_google_analytics_plugins_loaded() {
	global $uf_google_analytics_plugin;

	require_once('models/class.UfGoogle_AnalyticsSource.php');

	require_once('plugins/class.UfGoogle_AnalyticsPlugin.php');
	$uf_google_analytics_plugin = new UfGoogle_AnalyticsPlugin('Google_Analytics', __FILE__, $sources);
}

/*
 * Workaround WordPress' braindead lack of stripslashes.
 */
function uf_google_analytics_query() {
	$query = '';

	if (function_exists('get_google_analytics_query')) {
		$query = get_google_analytics_query();
	}
	else {
		$query = stripslashes(get_query_var('s'));
	}

	return $query;
}

function uf_google_analytics_uri($query) {
	global $wp_rewrite;

	$google_analytics_uri = '';

	$google_analytics_permastruct = $wp_rewrite->get_google_analytics_permastruct();
	if ($google_analytics_permastruct) {
		$google_analytics_uri = get_bloginfo('url') . '/' . str_replace('%google_analytics%', urlencode($query), $google_analytics_permastruct);
	}
	else {
		$google_analytics_uri = get_bloginfo('url') . '/index.php?s=' . urlencode($query);
	}

	return $google_analytics_uri;
}

function uf_google_analytics_sources() {
	global $uf_google_analytics_plugin;

	$sources = array();
	if ($uf_google_analytics_plugin) {
		$sources = $uf_google_analytics_plugin->sources;
	}

	return $sources;
}
?>
<!-- print_footer_scripts filter to add in Google Code inserting along with it, the Analytics Account info  -->
<!-- <script type="text/javascript" src="http://www.google-analytics.com/ga.js"></script><script type="text/javascript">/* var pageTracker = _gat._getTracker("UA-3703196-21"); pageTracker._trackPageview(); */</script> -->
<?php
/*
Plugin Name: UF Google Analytics
Version: 0.1
Plugin URI: http://www.webadmin.ufl.edu/
Description: Handling of the Google Analytics footer code and related text on WordPress sites at UF. Requires the <code>uf-plugin-framework</code> plugin.
Author: Joey Spooner <spooner@ufl.edu>
Author URI: http://dev.webadmin.ufl.edu/~dwc/
*/

define('UF_GOOGLE_ANALYTICS_PLUGIN_BASE', dirname(__FILE__) . '/');

// Load the plugin after the framework
add_action('plugins_loaded', 'uf_google_analytics_plugins_loaded');
add_action('wp_footer', 'uf_google_analytics_display');


$uf_google_analytics_plugin = null;
function uf_google_analytics_plugins_loaded() {
	global $uf_google_analytics_plugin;

        require_once('models/class.UfGoogleAnalyticsAccount.php');
	$account = new UfGoogleAnalyticsAccount(get_option('blogname'), get_option('uf_google_analytics_account'));

	require_once('plugins/class.UfGoogleAnalyticsPlugin.php');
	$uf_google_analytics_plugin = new UfGoogleAnalyticsPlugin('Google Analytics', __FILE__, $account);
}

function uf_google_analytics_display() {
	global $uf_google_analytics_plugin;
  
        $account = null;
	//	echo print_r($uf_google_analytics_plugin);
	$account = $uf_google_analytics_plugin->account->account;
	// echo("Account is " . $account);
	if($account) {
?>

<script type="text/javascript" src="http://www.google-analytics.com/ga.js"></script>
<script type="text/javascript">var pageTracker = _gat._getTracker("<?php $account; ?>"); pageTracker._trackPageview();</script>

<?php
	}
}

?>
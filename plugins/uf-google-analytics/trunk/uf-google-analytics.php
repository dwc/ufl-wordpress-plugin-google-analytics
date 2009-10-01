<?php
/*
Plugin Name: UF Google Analytics
Version: 0.1
Plugin URI: http://www.webadmin.ufl.edu/
Description: Handling of the Google Analytics footer code and related text on WordPress sites at the University of Florida. Requires the <code>uf-plugin-framework</code> plugin.
Author: Joey Spooner <spooner@ufl.edu>
Author URI: http://www.spoonstein.com/
*/

define('UF_GOOGLE_ANALYTICS_PLUGIN_BASE', dirname(__FILE__) . '/');
define('UF_GOOGLE_ANALYTICS_PLUGIN_URL', WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), "", plugin_basename(__FILE__))); 
define('UF_GOOGLE_ANALYTICS_PLUGIN_OPTION_NAME', 'uf_google_analytics_account');

// Load the plugin after the framework
add_action('plugins_loaded', 'uf_google_analytics_plugins_loaded');
add_action('wp_footer', 'uf_google_analytics_display');


$uf_google_analytics_plugin = null;
function uf_google_analytics_plugins_loaded() {
	global $uf_google_analytics_plugin;

	require_once('plugins/class.UfGoogleAnalyticsPlugin.php');
	$uf_google_analytics_plugin = new UfGoogleAnalyticsPlugin('Google Analytics', __FILE__);
}

function uf_google_analytics_display() {
	$account = get_option(UF_GOOGLE_ANALYTICS_PLUGIN_OPTION_NAME);

	if($account) {
?>
<script type="text/javascript">var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www."); document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));</script>
<script type="text/javascript">try { var pageTracker = _gat._getTracker("<?php echo $account; ?>"); pageTracker._trackPageview(); } catch(err) {}</script>
<script type="text/javascript" src="http://assets.webadmin.ufl.edu/js/ga-outbound-tracking/1.0.0/ga-outbound-tracking.min.js"></script>
<script type="text/javascript" src="http://assets.webadmin.ufl.edu/js/common/1.0.1/common.min.js"></script>
<script type="text/javascript" src="http://assets.webadmin.ufl.edu/js/search/1.0.1/search.min.js"></script>
<?php
	}
}
?>
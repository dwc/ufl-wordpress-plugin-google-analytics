<?php
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfPlugin.php');
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfOption.php');
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfOptionGroup.php');
require_once(UF_GOOGLE_ANALYTICS_PLUGIN_BASE . '/views/class.UfGoogleAnalyticsPage.php');

if (! class_exists('UfGoogleAnalyticsPlugin')) {
    class UfGoogleAnalyticsPlugin extends UfPlugin {

        function UfGoogleAnalyticsPlugin($name, $file) {

	  $options = array(
	       new UfOptionGroup('Account information', array(
		      new UfOption(UF_GOOGLE_ANALYTICS_PLUGIN_OPTION_NAME),
	  )));

	  $this->add_admin_page(new UfGoogleAnalyticsPage($name, 'Integrating Google Analytics into your Web Administration Theme', $options));
	  $this->{get_parent_class(__CLASS__)}($name, $file);
        }

	function add_plugin_hooks() {
	     parent::add_plugin_hooks();
        }
    }
}
?>

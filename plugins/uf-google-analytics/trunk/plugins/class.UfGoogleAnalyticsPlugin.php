<?php
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfPlugin.php');
require_once(UF_GOOGLE_ANALYTICS_PLUGIN_BASE . '/views/class.UfGoogleAnalyticsPage.php');
require_once(UF_GOOGLE_ANALYTICS_PLUGIN_BASE . '/controllers/class.UfGoogleAnalyticsController.php');

if (! class_exists('UfGoogleAnalyticsPlugin')) {
    class UfGoogleAnalyticsPlugin extends UfPlugin {

        function UfGoogleAnalyticsPlugin($name, $file) {

	    $this->add_admin_page(new UfGoogleAnalyticsPage($name));
	    $this->{get_parent_class(__CLASS__)}($name, $file);
        }

	function add_plugin_hooks() {
	     parent::add_plugin_hooks();

	     $controller = new UfGoogleAnalyticsController();
	     $this->register_action($controller, 'save');
        }
    }
}
?>

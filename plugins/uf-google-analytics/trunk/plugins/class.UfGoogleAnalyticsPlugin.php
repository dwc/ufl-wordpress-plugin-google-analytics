<?php
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfOption.php');
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfOptionGroup.php');
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfOptionsPage.php');
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfPlugin.php');
require_once(UF_GOOGLEANALYTICS_PLUGIN_BASE . '/controllers/class.UfGoogleAnalyticsController.php');
require_once(UF_GOOGLEANALYTICS_PLUGIN_BASE . '/models/class.UfGoogleAnalyticsSource.php');


if (! class_exists('UfGoogleAnalyticsPlugin')) {
	class UfGoogleAnalyticsPlugin extends UfPlugin {
	        var $account = "";

		function UfGoogleAnalyticsPlugin($account) {
			$options = array(
				new UfOptionGroup('General', array(
					new UfOption('uf_googleAnalytics_default_account', '', 'Google Analytics Account'),
				)),
			);
			$this->add_admin_page(new UfOptionsPage($name, '', $options));

			$this->account = $account;

			$this->{get_parent_class(__CLASS__)}($name, $file);
		}

		function add_plugin_hooks() {
			parent::add_plugin_hooks();

			$controller = new UfGoogleAnalyticsController($this->account, get_option('uf_googleAnalytics_default_account'));
			$this->register_action($controller, 'googleAnalytics');
		}

		function add_account($name, $account) {
			$this->account = $account;
		}
	}
}
?>

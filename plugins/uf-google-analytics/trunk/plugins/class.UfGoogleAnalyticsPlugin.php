<?php
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfOption.php');
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfOptionGroup.php');
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfOptionsPage.php');
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfPlugin.php');
require_once(UF_GOOGLE_ANALYTICS_PLUGIN_BASE . '/models/class.UfGoogleAnalyticsAccount.php');


if (! class_exists('UfGoogleAnalyticsPlugin')) {
	class UfGoogleAnalyticsPlugin extends UfPlugin {
	        var $account = "";

		function UfGoogleAnalyticsPlugin($name, $file, $account) {
			$options = array(
				new UfOptionGroup('General', array(
				    new UfOption('uf_google_analytics_account', '', 'Google Analytics Account'),
				)),
			);

			$this->add_admin_page(new UfOptionsPage($name, '', $options));

			$this->account = $account;

			$this->{get_parent_class(__CLASS__)}($name, $file);
		}
	}
}
?>

<?php
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfController.php');


if (! class_exists('UfGoogleAnalyticsController')) {
	class UfGoogleAnalyticsController extends UfController {
		var $account;

		function UfGoogleAnalyticsController($account) {
		        $this->account = $acount;

			$this->{get_parent_class(__CLASS__)}();
		}

		function handle_google_analytics_action() {
                        if($account) {
			  $account->track();
                        }
		}
	}
}
?>

<?php
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfController.php');

if (! class_exists('UfGoogleAnalyticsController')) {
    class UfGoogleAnalyticsController extends UfController {

        function handle_save_action() {
	    $account = $_POST['account'];

	    update_option(UF_GOOGLE_ANALYTICS_PLUGIN_OPTION_NAME, $account);

	    $this->redirect(wp_get_referer(), array());
	}
    }
}
?>

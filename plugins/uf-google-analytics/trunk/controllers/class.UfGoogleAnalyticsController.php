<?php
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfController.php');


if (! class_exists('UfGoogleAnalyticsController')) {
	class UfGoogleAnalyticsController extends UfController {
		var $account = '';
		var $default = '';

		function UfGoogleAnalyticsController($sources, $default) {
			$this->sources = $sources;
			$this->default = $default;

			$this->{get_parent_class(__CLASS__)}();
		}

		function handle_googleAnalytics_action() {
			/*
			$source = $_REQUEST['source'];
			$query = $_REQUEST['query'];

			$sources = $this->sources;
			$default = $this->default;

			$default_source = $sources[$default];
			$selected_source = ($sources[$source]) ? $sources[$source] : $default_source;
			if ($selected_source) {
				$selected_source->googleAnalytics($query);
			}
			else {
				die('Could not determine source');
			}
			*/
		}
	}
}
?>

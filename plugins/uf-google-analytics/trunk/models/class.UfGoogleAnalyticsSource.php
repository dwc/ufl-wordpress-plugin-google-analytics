<?php
if (! class_exists('UfGoogleAnalyticsSource')) {
	class UfGoogleAnalyticsSource {
		var $account;

		function UfGoogleAnalyticsSource($account) {
			$this->account = $account;
		}

		/*
		function googleAnalytics($query) {
			header('Location: ' . $this->url . '?' . $this->parameter . '=' . urlencode($query));
		}
		*/
	}
}
?>

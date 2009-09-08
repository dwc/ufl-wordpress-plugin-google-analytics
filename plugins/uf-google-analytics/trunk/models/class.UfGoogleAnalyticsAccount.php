<?php
if (! class_exists('UfGoogleAnalyticsAccount')) {
	class UfGoogleAnalyticsAccount {
	        var $name;
		var $account;

		function UfGoogleAnalyticsAccount($name, $account) {
 		        $this->name = $name;
			$this->account = $account;
		}

	}
}
?>

<?php
if (! class_exists('UfGoogleAnalyticsAccount')) {
	class UfGoogleAnalyticsAccount {
	        var $name;
		var $account;

		function UfGoogleAnalyticsAccount($name, $account) {
 		        $this->name = $name;
			$this->account = $account;
		}

		function track() {
		  die('I am going to insert into the wp_footer the code');
		}
	}
}
?>

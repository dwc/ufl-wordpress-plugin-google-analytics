<?php
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfOptionsPage.php');

if (! class_exists('UfGoogleAnalyticsPage')) {
    class UfGoogleAnalyticsPage extends UfOptionsPage {

        function display_body() {

	    $page_options = array();
?>
	<style>
	   .form-table th { display: none; }
	</style>
	<form method="post" action="options.php">
<?php foreach ($this->option_groups as $option_group): ?>
		<h3><?php echo htmlspecialchars($option_group->name); ?></h3>
		<table class="form-table">
<?php     foreach ($option_group->options as $option): ?>
<?php         $page_options[] = $option->name; ?>
<?php         $option->display(); ?>
<?php     endforeach; ?>
		</table><!-- .form-table -->
<?php endforeach; ?>

		<?php if (function_exists('wp_nonce_field')): wp_nonce_field('update-options'); endif; ?>

		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="<?php echo implode(",", $page_options); ?>" />

<?php $this->submit_button('Update Options'); ?>
	</form>

    <h3>Getting your account from Google</h3>
    <ul id="uf_google_analytics_instructions">
        <li>Access <a href="http://www.google.com/analytics" target="_blank">Google Analytics</a> and setup an account for this site using the URL "<?php bloginfo('url'); ?>"</li>
  <li>Collect the account id from the "Add Tracking" step of your Analytics: Tracking Instructions setup process (see Figure 1)</li>
    </ul>

    <h3>Figure 1</h3>
    <p>Example "Add Tracking" step screen from Google Analytic's Tracking Instructions setup process. The account is highlighted in this figure.</p>
    <p id="uf_google_analytics_figure"><img src="<?php echo UF_GOOGLE_ANALYTICS_PLUGIN_URL; ?>/views/google_analytics_plugin_add_tracking_example.jpg" /></p>
<?php
   }
  }
}
?>
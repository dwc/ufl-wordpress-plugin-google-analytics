<?php
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfWebAdminPage.php');

if (! class_exists('UfGoogleAnalyticsPage')) {
    class UfGoogleAnalyticsPage extends UfWebAdminPage {

        function display_body() {
	    $account = get_option('uf_google_analytics_account');
      
?>
     <style type="text/css">
     #account {
	 width:25em;
     }

     #uf_google_analytics_instructions { 
         margin-left: 20px;
         list-style-type: decimal; 
     }

     #uf_google_analytics_figure img { 
         border: 1px solid #aaa;
         margin-top: 15px;
     }
     </style>

     <h3>General</h3>
     <form method="post" action="<?php echo htmlspecialchars(uf_plugin_framework_admin_uri()); ?>" enctype="multipart/form-data">
         <?php uf_plugin_framework_admin_form_fields('uf-google-analytics', 'save', "\t\t"); ?>
         <table class="form-table">
             <tr class="form-field">
	         <th scope="row" valign="top"><label for="account">Account</label></th>
                 <td><input type="text" name="account" id="account" value="<?php echo ($account ? htmlspecialchars($account) : ''); ?>" size="10" /></td>
             </tr>
         </table>
         <?php $this->submit_button('Save Account'); ?>
     </form>

    <h3>Getting your account from Google</h3>
    <ul id="uf_google_analytics_instructions">
        <li>Access <a href="http://www.google.com/analytics" target="_blank">Google Analytics</a> and setup an account for this site using the URL "<?php bloginfo('url'); ?>"</li>
  <li>Collect the account id from the "Add Tracking" step of your Analytics: Tracking Instructions setup process (see Figure 1)</li>
    </ul>

    <h3>Figure 1</h3>
    <p>Example "Add Tracking" step screen from Google Analytic's Tracking Instructions setup process. The account is highlighted in this figure.</p>
    <p id="uf_google_analytics_figure"><img src="<?php echo UF_GOOGLE_ANALYTICS_PLUGIN_URL; ?>/views/google_analytics_plugin_add_tracking_example.jpg" /></p>
<?
    }
  }
}
?>
<?php
/*
=====================================
  [[[ Admin & Login Customization ]]]
=====================================
*/

// Admin footer attribution
function remove_footer_admin() {
  echo '<span id="footer-thankyou">Exstructae : <a href="http://domesticjones.com" target="_blank">Exonym</a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

// Kill the admin bar on the front-end
add_filter('show_admin_bar', '__return_false');

// Editor and Custom Admin stylesheets (NOTE: init)
function ex_admin_scripts_and_styles() {
  if (is_admin()) {
    wp_enqueue_style('ex_styles', asset_path('styles/admin.css'));
    add_editor_style(asset_path('styles/editor.css'));
  }
}

// Custom admin JS (NOTE: init)
function ex_admin_js() {
  wp_enqueue_script('custom_admin_js', asset_path('scripts/admin.js'), array('jquery'));
}

// Custom Login Styles & Scripts (NOTE: init)
function custom_login_assets() {
  wp_enqueue_style('custom-login', asset_path('styles/login.css'));
  wp_enqueue_script('custom-login', asset_path('scripts/login.js'));
}

// Custom Login Logo
function custom_login_logo() { ?>
  <style type="text/css">
    #login h1 a,
    .login h1 a {
      background-image: url(<?php echo ex_logo('alternate', 'dark'); ?>);
    }
  </style>
<?php }
add_action('login_enqueue_scripts', 'custom_login_logo');

// Allow Editors to edit Menus
$roleObject = get_role( 'editor' );
if (!$roleObject->has_cap('edit_theme_options')) {
  $roleObject->add_cap('edit_theme_options');
}

// Add Options Pages for the 52 Club
if(function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' 	=> '52 Club Information',
		'menu_title'	=> 'Club Info',
		'menu_slug' 	=> '52-club-options',
		'capability'	=> 'edit_posts'
	));
	acf_add_options_page(array(
		'page_title' 	=> '52 Club Lifetime Memberships',
		'menu_title'	=> 'Lifetime Memberships',
		'menu_slug' 	=> '52-club-lifetime',
		'capability'	=> 'edit_posts'
	));
}

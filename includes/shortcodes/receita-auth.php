<?php
function mr_receitas_auth_form_shordcode() {

	if(is_user_logged_in()) {
		return 'Você já está logado...';
	}


	$formHTML = wp_remote_get(
		plugins_url('shortcodes/receita-auth-template.php', RECEITA_PLUGIN_URL)
	);
	$formHTML = wp_remote_retrieve_body($formHTML);

	
	$formHTML = str_replace(
		'SHOW_REG_FORM_PH',
		( get_option('users_can_register') == '0' ) ? 'br_hide_form' : '',
		$formHTML
	);
	return $formHTML;
}
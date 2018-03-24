<?php
function mr_admin_enqueue() {
	global $typenow;
	if($typenow != 'receita') {
		return;
	}

	// Registros
	wp_register_style(
		'mr_style',
		plugins_url('/assets/css/style.css', RECEITA_PLUGIN_URL)
	);
	// Usos
	wp_enqueue_style('mr_style');
}
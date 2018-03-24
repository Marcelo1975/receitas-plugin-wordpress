<?php
function mr_enqueue_scripts() {
	wp_register_style(
		'mr_style',
		plugins_url('/assets/css/style.css', RECEITA_PLUGIN_URL)
	);

	wp_register_style(
		'mr_rateit',
		plugins_url('/assets/rateit/rateit.css', RECEITA_PLUGIN_URL)
	);
	wp_register_script(
		'mr_rateit',
		plugins_url('/assets/rateit/jquery.rateit.min.js', RECEITA_PLUGIN_URL),
		array('jquery'),
		'1.0',
		true
	);
	wp_register_script(
		'mr_script',
		plugins_url('/assets/js/script.js', RECEITA_PLUGIN_URL),
		array('jquery'),
		'1.0',
		true
	);
	wp_localize_script('mr_script', 'receita_obj', array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'home_url' => home_url('/')
	));

	wp_enqueue_style('mr_style');
	wp_enqueue_style('mr_rateit');
	wp_enqueue_script('mr_rateit');
	wp_enqueue_script('mr_script');
}
<?php
function mr_activate_plugin() {
	if( version_compare(get_bloginfo('version'), '4.5', '<') ) {
		wp_die(__("Para utilizar este plugin, você precisa atualizar seu wordpress para versões acima de 4.5.", "receitas"));
	}

	mr_receitas_init();
	flush_rewrite_rules();

	global $wpdb;

	$sql = "CREATE TABLE ".$wpdb->prefix."receita_votos (
		ID BIGINT(20) NOT NULL AUTO_INCREMENT,
		receita_id BIGINT(20) NOT NULL,
		voto TINYINT(1) NOT NULL,
		user_ip VARCHAR(32) NOT NULL,
		PRIMARY KEY (ID)
	) ".$wpdb->get_charset_collate();

	require_once(ABSPATH.'/wp-admin/includes/upgrade.php');
	dbDelta($sql);

	// hourly, daily, twicedaily
	wp_schedule_event(time(), 'daily', 'mr_receita_diaria_hook');

	$receita_opts = get_option('mr_receita_opts');

	if(!$receita_opts) {
		$opts = array(
			'voto_login' => 1,
			'receita_login' => 1
		);

		add_option('mr_receita_opts', $opts);
	}
}
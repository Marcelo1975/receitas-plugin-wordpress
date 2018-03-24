<?php
function mr_gerar_receita_diaria() {
	global $wpdb;

	$sql = "SELECT ID FROM ".$wpdb->posts." WHERE post_type = 'receita' AND post_status = 'publish' ORDER BY RAND() LIMIT 1";
	$receita_id = $wpdb->get_var($sql);

	set_transient('mr_receita_diaria', $receita_id, DAY_IN_SECONDS);
}
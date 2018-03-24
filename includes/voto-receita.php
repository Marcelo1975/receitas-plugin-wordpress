<?php
function mr_voto_receita() {
	global $wpdb;

	$array = array(
		'status' => 0
	);

	$post_id = absint($_POST['id']);
	$voto = floatval($_POST['voto']);
	$ip = $_SERVER['REMOTE_ADDR']; //retorno local-> 127.0.0.1 ou ::1

	$sql = $wpdb->prepare("SELECT COUNT(*) FROM ".$wpdb->prefix."receita_votos WHERE receita_id = %d AND user_ip = %s", $post_id, $ip);

	$qt = $wpdb->get_var($sql);

	if($qt > 0) {
		wp_send_json($array);
	}

	$wpdb->insert(
		$wpdb->prefix.'receita_votos',
		array(
			'receita_id' => $post_id,
			'voto' => $voto,
			'user_ip' => $ip
		)
	);

	$receita_data = get_post_meta($post_id, 'receita_data', true);
	$receita_data['contagem']++;

	$sql = $wpdb->prepare("SELECT AVG(voto) FROM ".$wpdb->prefix."receita_votos WHERE receita_id = %d", $post_id);
	$receita_data['media'] = $wpdb->get_var($sql);

	update_post_meta($post_id, 'receita_data', $receita_data);

	do_action('receita_voto', array(
		'post_id' => $post_id,
		'vota' => $voto 
	));

	$array['status'] = 1;
	wp_send_json($array);

}
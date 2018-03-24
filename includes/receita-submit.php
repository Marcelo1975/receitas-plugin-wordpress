<?php
function mr_receita_submit(){
	$array = array('status' => 1);

	if(empty($_POST['ingredientes']) ||
		empty($_POST['tempo']) ||
		empty($_POST['utensilios']) ||
		empty($_POST['dificuldade']) ||
		empty($_POST['tipo'])) {

		wp_send_json($array);
	}

	$title = sanitize_text_field($_POST['title']);
	$content = wp_kses_post($_POST['content']);

	$receita_data = array(
		'ingredientes' => sanitize_text_field($_POST['ingredientes']),
		'tempo' => sanitize_text_field($_POST['tempo']),
		'utensilios' => sanitize_text_field($_POST['utensilios']),
		'dificuldade' => sanitize_text_field($_POST['dificuldade']),
		'tipo' => sanitize_text_field($_POST['tipo']),
		'media' => 0,
		'contagem' => 0
	);

	$post_id = wp_insert_post(array(
		'post_title' => $title,
		'post_name' => $title,
		'post_content' => $content,
		'post_status' => 'pending',
		'post_type' => 'receita'
	));

	update_post_meta($post_id, 'receita_data', $receita_data);

	$array['status'] = 2;
	wp_send_json($array);
}
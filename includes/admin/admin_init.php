<?php
include 'metabox_mr_receita_opcoes.php';
include 'enqueue.php';
include 'columns.php';
include 'receita_opts_page_save.php';

function mr_receitas_admin_init() {
	add_action('add_meta_boxes_receita', 'mr_receitas_metaboxes');
	add_action('admin_enqueue_scripts', 'mr_admin_enqueue');
	add_action('admin_post_mr_receita_opts_save', 'mr_receita_opts_save');

	add_filter('manage_receita_posts_columns', 'mr_receita_columns');
	add_action('manage_receita_posts_custom_column', 'mr_manage_receita_columns', 10, 2);
}
function mr_receitas_metaboxes() {
	add_meta_box(
		'mr_receita_opcoes',
		__('Opções da receita', 'receitas'),
		'mr_receita_opcoes',
		'receita',
		'normal', //tipos: normal, side, advanced
		'high' //opções: high, default, low
	);
}
function mr_save_post_admin($post_id, $post, $update) {
	if(!$update) {
		return;
	}

	$receita_data = array(
		'ingredientes' => $_POST['mr_ingredientes'],
		'tempo' => $_POST['mr_tempo'],
		'utensilios' => $_POST['mr_utensilios'],
		'dificuldade' => $_POST['mr_dificuldade,'],
		'tipo' => $_POST['mr_tipo']
	);

	update_post_meta($post_id, 'receita_data', $receita_data);
}
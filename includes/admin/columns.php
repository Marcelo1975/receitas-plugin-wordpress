<?php
function mr_receita_columns($columns) {
	
	$new_columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => 'Título',
		'count' => 'Qt. de Votos',
		'average' => 'Média',
		'author' => 'Autor',
		'date' => 'Data'
	);

	return $new_columns;

}
function mr_manage_receita_columns($column, $post_id) {
	$receita_data = get_post_meta($post_id, 'receita_data', true);

	switch($column) {
		case 'count':
			echo $receita_data['contagem'];
			break;
		case 'average':
			echo number_format($receita_data['media'], 1);
			break;
	}

}
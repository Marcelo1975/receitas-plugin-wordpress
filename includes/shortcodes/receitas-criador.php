<?php
function mr_receitas_criador_shortcode() {
	$criadorHTML = file_get_contents('receitas-criador-template.php', true);

	ob_start();
	wp_editor('', 'receita_criador_editor');
	$editor = ob_get_clean();

	$criadorHTML = str_replace(
		'{EDITOR}',
		$editor,
		$criadorHTML
	);

	return $criadorHTML;
}
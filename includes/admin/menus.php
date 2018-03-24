<?php
function mr_admin_menu() {
	add_menu_page(
		'Opções de Receita',//Título da página
		'Config. de Receita',//Título do menu
		'edit_theme_options',//Capability responsável
		'mr_receita_opts',//Slug da página
		'mr_receita_opts_page'//Função de criação da página
	);
}
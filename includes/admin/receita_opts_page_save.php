<?php
function mr_receita_opts_save() {

	if(!current_user_can('edit_theme_options')) {
		wp_die('Acesso Negado!');
	}

	check_admin_referer('mr_receita_opts_verify');

	$receita_opts = get_option('mr_receita_opts');
	$receita_opts['voto_login'] = absint($_POST['voto_login']);
	$receita_opts['receita_login'] = absint($_POST['receita_login']);

	update_option('mr_receita_opts', $receita_opts);

	wp_redirect(admin_url('admin.php?page=mr_receita_opts&status=1'));
}
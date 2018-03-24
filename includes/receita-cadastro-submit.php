<?php
function mr_receita_criar_conta() {
	$array = array('status' => 1);

	if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['senha']) || !is_email($_POST['email'])) {
		wp_send_json($array);
	}

	$name = sanitize_text_field($_POST['name']);
	$email = sanitize_email($_POST['email']);
	$senha = sanitize_text_field($_POST['senha']);

	$username = explode('@', $email);
	$username = $username[0];

	if(username_exists($username) || email_exists($email)) {
		wp_send_json($array);
	}

	$user_id = wp_insert_user(array(
		'user_login' => $username,
		'user_email' => $email,
		'user_pass' => $senha,
		'user_nicename' => $username
	));

	if(is_wp_error($user_id)) {
		wp_send_json($array);
	}

	$user = get_user_by('id', $user_id);
	wp_set_current_user($user_id, $user->user_login);
	wp_set_auth_cookie($user_id, false);
	do_action('wp_login', $user->user_login, $user);

	$array['status'] = 2;
	wp_send_json($array);
}
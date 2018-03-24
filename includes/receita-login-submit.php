<?php
function mr_receita_login() {
	$array = array('status' => 1);

	if(empty($_POST['email']) || empty($_POST['senha']) || !is_email($_POST['email'])) {
		wp_send_json($array);
	}

	$email = sanitize_email($_POST['email']);
	$senha = sanitize_text_field($_POST['senha']);


	if(!email_exists($email)) {
		wp_send_json($array);
	}

	$userdata = get_user_by('email', $email);

	$user = wp_signon(array(
		'user_login' => $userdata->user_login,
		'user_password' => $senha,
		'remember' => true
	));

	if(is_wp_error($user)) {
		wp_send_json($array);
	}

	$array['status'] = 2;
	wp_send_json($array);
}
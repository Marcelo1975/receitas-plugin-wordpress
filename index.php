<?php
/*
* Plugin Name: Receitas
* Description: Um plugin simples para começar aprender como criar plugins para wordpress
* Version: 1.0
* Author: Marcelo A.
* Author URI: https://marcelotuto.com.br
* Text Domain: receitas
*/

if(!function_exists('add_action')) {
  echo __("Opis!!! Eu sou só um plugin, não posso ser chamado diretamente.", "receitas");
  exit;
}

// Setup
define('RECEITA_PLUGIN_URL', __FILE__);

// Includes
include('includes/init.php');
include('includes/activate.php');
include('includes/admin/admin_init.php');
include('includes/filter-content.php');
include('includes/enqueue.php');
include('includes/voto-receita.php');
include(dirname(RECEITA_PLUGIN_URL).'./includes/widget.php');
include('includes/widgets/receita_diaria.php');
include('includes/cron.php');
include('includes/deactivate.php');
include('includes/shortcodes/receitas-criador.php');
include('includes/shortcodes/receita-auth.php');
include('includes/receita-submit.php');
include('includes/receita-cadastro-submit.php');
include('includes/receita-login-submit.php');
include('includes/admin/dashboard-widgets.php');
include('includes/admin/menus.php');
include('includes/admin/receita_opts_page.php');

// Hooks
register_activation_hook(RECEITA_PLUGIN_URL, 'mr_activate_plugin');
register_deactivation_hook(RECEITA_PLUGIN_URL, 'mr_deactivate_plugin');
add_action('init', 'mr_receitas_init');
add_action('admin_init', 'mr_receitas_admin_init');
add_action('save_post_receita', 'mr_save_post_admin', 10, 3);
add_filter('the_content', 'mr_filter_receita_content');
add_action('wp_enqueue_scripts', 'mr_enqueue_scripts', 100);
add_action('widgets_init', 'mr_widgets_init');
add_action('mr_receita_diaria_hook', 'mr_gerar_receita_diaria');
add_action('wp_dashboard_setup', 'mr_add_dashboard_widgets');
add_action('admin_menu', 'mr_admin_menu');

//Ajax
add_action('wp_ajax_mr_voto_receita', 'mr_voto_receita');
add_action('wp_ajax_nopriv_mr_voto_receita', 'mr_voto_receita');
add_action('wp_ajax_mr_receita_submit', 'mr_receita_submit');
add_action('wp_ajax_nopriv_mr_receita_submit', 'mr_receita_submit');
add_action('wp_ajax_nopriv_mr_receita_criar_conta', 'mr_receita_criar_conta');
add_action('wp_ajax_nopriv_mr_receita_login', 'mr_receita_login');


// Shortcodes
add_shortcode('receita_criador', 'mr_receitas_criador_shortcode');
add_shortcode('receita_auth_form', 'mr_receitas_auth_form_shordcode');
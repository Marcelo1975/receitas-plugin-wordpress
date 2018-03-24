<?php
function mr_deactivate_plugin() {
	wp_clear_scheduled_hook('mr_receita_diaria_hook');
}
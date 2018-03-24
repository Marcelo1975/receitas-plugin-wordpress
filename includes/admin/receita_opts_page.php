<?php
function mr_receita_opts_page() {
	$receita_opts = get_option('mr_receita_opts');
	?>
	<div class="wrap">

		<?php if(isset($_GET['status']) && $_GET['status'] == '1'): ?>
			<h4>Opções salvas com sucesso!</h4>
		<?php endif; ?>

		<form method="POST" action="admin-post.php">
			<input type="hidden" name="action" value="mr_receita_opts_save" />
			<?php wp_nonce_field('mr_receita_opts_verify'); ?>

			O usuário pode votar SEM estar logado?<br/>
			<select name="voto_login">
				<option value="1" <?php echo ($receita_opts['voto_login']=='1')?'selected="selected"':''; ?> >Não</option>
				<option value="2" <?php echo ($receita_opts['voto_login']=='2')?'selected="selected"':''; ?> >Sim</option>
			</select><br/><br/>

			O usuário pode adicionar receitas SEM estar logado?<br/>
			<select name="receita_login">
				<option value="1" <?php echo ($receita_opts['receita_login']=='1')?'selected="selected"':''; ?> >Não</option>
				<option value="2" <?php echo ($receita_opts['receita_login']=='2')?'selected="selected"':''; ?> >Sim</option>
			</select><br/><br/>

			<input type="submit" value="Salvar" />

		</form>
	</div>
	<?php
}
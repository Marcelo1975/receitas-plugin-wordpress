jQuery(function(){

	jQuery('#receita_voto').bind('rated', function(){

		jQuery(this).rateit('readonly', true);

		var id = jQuery(this).attr('data-id');
		var voto = jQuery(this).rateit('value');

		jQuery.ajax({
			type:'POST',
			url:receita_obj.ajax_url,
			data:{action:'mr_voto_receita', id:id, voto:voto},
			success:function(){
				
			}
		});

	});

	jQuery('#receita_criador').on('submit', function(e) {
		e.preventDefault();
		jQuery('#receita_criador_submit').hide();
		jQuery('#receita_criador_aviso').html('Carregando...');

		var form = {
			action:'mr_receita_submit',
			title:jQuery('#receita_title').val(),
			content:tinymce.activeEditor.getContent(),
			ingredientes:jQuery('#receita_ingredientes').val(),
			tempo:jQuery('#receita_tempo').val(),
			utensilios:jQuery('#receita_utensilios').val(),
			dificuldade:jQuery('#receita_dificuldade').val(),
			tipo:jQuery('#receita_tipo').val()
		};

		jQuery.ajax({
			type:'POST',
			url:receita_obj.ajax_url,
			data:form,
			dataType:'json',
			success:function(json) {
				if(json.status == 2) {
					jQuery('#receita_criador_aviso').html('Receita enviada com sucesso! Aguardando moderação.');
					jQuery('#receita_criador').hide();
				}else {
					jQuery('#receita_criador_aviso').html('Não foi possível enviar a receita! Tente novamente mais tarde!');
					jQuery('#receita_criador_aviso').show();
				}
			}
		});
	});

	jQuery('#receita_cadastro').on('submit', function(e){
		e.preventDefault();

		jQuery('#receita_cadastro_aviso').html("Carregando...");
		jQuery('#cadastro_botao').hide();

		var form = {
			action:'mr_receita_criar_conta',
			name:jQuery('#cadastro_name').val(),
			email:jQuery('#cadastro_email').val(),
			senha:jQuery('#cadastro_senha').val()
		};

		jQuery.ajax({
			type:'POST',
			url:receita_obj.ajax_url,
			data:form,
			dataType:'json',
			success:function(json) {
				if(json.status == 2) {
					jQuery("#receita_cadastro_aviso").html("Conta criada com sucesso!");
					window.location.href = receita_obj.home_url;
				} else {
					jQuery("#receita_cadastro_aviso").html("Não foi possível criar sua conta!");
				}
			}
		});
	});

	jQuery('#receita_login').on('submit', function(e){
		e.preventDefault();

		jQuery('#receita_login_aviso').html("Carregando...");
		jQuery('#login_botao').hide();

		var form = {
			action:'mr_receita_login',
			email:jQuery('#login_email').val(),
			senha:jQuery('#login_senha').val()
		};

		jQuery.ajax({
			type:'POST',
			url:receita_obj.ajax_url,
			data:form,
			dataType:'json',
			success:function(json) {
				if(json.status == 2) {
					jQuery("#receita_login_aviso").html("Logado com sucesso!");
					window.location.href = receita_obj.home_url;
				} else {
					jQuery("#receita_login_aviso").html("Não foi possível logar na conta!");
				}
			}
		});
	});
});
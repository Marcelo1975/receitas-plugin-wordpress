<form method="POST" id="receita_criador">
	Título:<br/>
	<input type="text" name="title" id="receita_title" /><br/><br/>

	Modo de Preparo:<br/>
	{EDITOR}<br/>

	Ingredientes:<br/>
	<input type="text" name="ingredientes" id="receita_ingredientes" /><br/><br/>

	Tempo da Receita:<br/>
	<input type="text" name="tempo_receita" id="receita_tempo" /><br/><br/>

	Utensílios:<br/>
	<input type="text" name="utensilios" id="receita_utensilios" /><br/><br/>

	Nível de Dificuldade:<br/>
	<select name="dificuldade" id="receita_dificuldade">
		<option value="0">Iniciante</option>
		<option value="1">Intermediário</option>
		<option value="2">Avançado</option>
	</select><br/><br/>

	Tipo da Receita:<br/>
	<input type="text" name="tipo" id="receita_tipo" /><br/><br/>

	<input type="submit" value="Salvar" id="receita_criador_submit" />
</form>
<div id="receita_criador_aviso"></div>
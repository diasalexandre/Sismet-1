{include file="../templates/default/topo.tpl"}
{literal}
<script type="text/javascript">
	$(document).ready(function(){
		$("#nascimento").mask("99/99/9999");
		$("#telefone").mask("+99 (99) 9999-9999");
		$("#celular").mask("+99 (99) 9999-9999");  
	
	   $("#formulario-usuario").validate({
	      rules: {
		 nome: {required: true},
		 graduacao: {required:true},
		 instituicao: {required: true},
		 idade: {required: true},
		 pais: {required: true},
		 cidade: {required: true},
		 estado: {required: true},
		 telefone: {required: true},
		 nascimento: {required: true},
		 titulacao: {required: true},
		 login: {required:true, email: true},
		 senha: {required:true},
		 repsenha: {required:true, equalTo: '#senha'}
	      },
	      messages: {
		 nome: {required: 'Por favor, informe a nome'},
		 graduacao: {required: 'Por favor, informe a graduação'},
		 instituicao: {required: 'Por favor, informe a instituicao'},
		 idade: {required: 'Por favor, informe a idade'},
		 pais: {required: 'Por favor, informe o país'},
		 cidade: {required: 'Por favor, informe a cidade'},
		 estado: {required: 'Por favor, informe o estado'},
		 telefone: {required: 'Por favor, informe o telefone'},
		 nascimento: {required: 'Por favor, informe a data de nascimento'},
		 titulacao: {required: 'Por favor, informe a titulacao'},
		 login: {required: 'Por favor, informe o seu login', email:'Por favor, digite um email válido'},
		 senha: {required: 'Por favor, informe uma senha'},
		 repsenha: {required: 'Por favor, informe uma senha', equalTo: 'As senhas não correspondem'}
	      }
	      
	   });

	 
	   });
</script>
<script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-v0.2.js"></script> 
<script type="text/javascript">
    window.onload = function() {
        new dgCidadesEstados( 
            document.getElementById('estado'), 
            document.getElementById('cidade'), 
            true
        );
    }
</script>
{/literal}

				<div id="formulario">
					<form action="{$url}cadastro-usuario-1.php" method="post" id="formulario-usuario">

					<h1>Cadastro de usuários</h1>

					<div class="form-txt">
						Nome:
					</div>
					<div class="inputtxt">
						<label for="nome" generated="true" class="error" style="display:none;"></label>
						<input type="text" name="nome" />
					</div>
					<div class="form-txt">
						Graduação:
					</div>
					<div class="inputtxt">
						<label for="graduacao" generated="true" class="error" style="display:none;"></label>
						<input type="text" name="graduacao" />

					</div>

					<div class="form-txt">
						Instituição:
					</div>
					<div class="inputtxt">
						<label for="instituicao" generated="true" class="error" style="display:none;"></label>
						<input type="text" name="instituicao" />
					</div>

					<div class="form-txt">
						Idade *:
					</div>
					<div class="inputtxt">
						<label for="idade" generated="true" class="error" style="display:none;"></label>
						<select name="idade">
							<option value="">Selecione</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							<option value="31">31</option>
							<option value="32">32</option>
							<option value="33">33</option>
							<option value="34">34</option>
							<option value="35">35</option>
							<option value="36">36</option>
							<option value="37">37</option>
							<option value="38">38</option>
							<option value="39">39</option>
							<option value="40">40</option>
						</select>
					</div>
					<div class="form-txt">
						País *:
					</div>
					<div class="inputtxt">
						<label for="pais" generated="true" class="error" style="display:none;"></label>
						<input type="text" name="pais" />
					</div>
					<div class="form-txt">
						Estado *:
					</div>
					<div class="inputtxt">
						<label for="estado" generated="true" class="error" style="display:none;"></label>
						<select name="estado" id="estado"></select>
					</div>
					<div class="form-txt">
						Cidade *:
					</div>
					<div class="inputtxt">
						<label for="cidade" generated="true" class="error" style="display:none;"></label>
						<select name="cidade" id="cidade"></select>
					</div>
					<div class="form-txt">
						Telefone *:
					</div>
					<div class="inputtxt">
						<label for="telefone" generated="true" class="error" style="display:none;"></label>
						<input type="text" name="telefone" id="telefone" />
					</div>
					<div class="form-txt">
						Celular:
					</div>
					<div class="inputtxt">
						<label for="celular" generated="true" class="error" style="display:none;"></label>
						<input type="text" name="celular" id="celular" />
					</div>
					<div class="form-txt">
						Data de nascimento *:
					</div>
					<div class="inputtxt">
						<label for="nascimento" generated="true" class="error" style="display:none;"></label>
						<input type="text" name="nascimento" id="nascimento" />
					</div>
					<div class="form-txt">
						Titulação:
					</div>
					<div class="inputtxt">
						<label for="titulacao" generated="true" class="error" style="display:none;"></label>
						<select name="titulacao">		
							<option value="">Selecione</option>
							<option value="Graduação">Graduação</option>
							<option value="Mestrado">Mestrado</option>
							<option value="Pós-Graduação">Pós-graduação</option>
							<option value="Doutorado">Doutorado</option>
							<option value="Estacialista">Especialista</option>
							<option value="Técnico">Técnico</option>
						</select>
					</div>
					<h1>Informações de acesso ao sistema</h1>
					<div class="form-txt">
						Email *:
					</div>
					<div class="inputtxt">
						<label for="login" generated="true" class="error" style="display:none;"></label>
						<input type="text" name="login" />
					</div>
					<div class="form-txt">
						Senha *:
					</div>
					<div class="inputtxt">
						<label for="senha" generated="true" class="error" style="display:none;"></label>
						<input type="password" name="senha" id="senha"/>
					</div>
					<div class="form-txt">
						Repetir a senha *:
					</div>
					<div class="inputtxt">
						<label for="repsenha" generated="true" class="error" style="display:none;"></label>
						<input type="password" name="repsenha" id="repsenha" />
					</div>

					<div class="form-txt"></div>
					<div class="inputtxt">
						<input type="submit" name="enviar" class="botao" value="Cadastrar usu&aacute;rio"/>
					</form>
				</div>

                        </div>
			<br style="clear:both;" />




{include file="../templates/default/rodape.tpl"}

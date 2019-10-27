<?php 

	header("Content-Type: text/html; charset=UTF-8",true);
	
	$buscacep = $_POST['cep'];

	$json_url = "http://viacep.com.br/ws/".$buscacep."/json";
	
	$json_parser = @file_get_contents($json_url);
	
	if ($json_parser == False) {
		?>
		<p> Verifique o CEP digitado... erro!</p>
		<?php
		exit;
	}
	
	$obj = json_decode($json_parser);


	if ($obj->erro == true) {
		?>
		<p> Pesquisa do CEP retornou com erro! Verifique... </p>
		<?php
		
	} else {
		?>
		
			<ons-list modifier="inset">
				<ons-list-item>CEP: <?php echo $obj->cep; ?></ons-list-item>
				<ons-list-item>Logradouro: <?php echo $obj->logradouro; ?></ons-list-item>
				<ons-list-item>Complemento: <?php echo $obj->complemento; ?></ons-list-item>
				<ons-list-item>Bairro: <?php echo $obj->bairro; ?></ons-list-item>
				<ons-list-item>Cidade: <?php echo $obj->localidade; ?></ons-list-item>
				<ons-list-item>UF: <?php echo $obj->uf; ?></ons-list-item>
			</ons-list>

		<?php		
	}

?>	

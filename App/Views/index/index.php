<h1>Index</h1>
<hr />
<select name="" id="">
	<option value="">Selecione</option>
	<?php 
	foreach($this->view->dados as $p){ 

	}
	?>
</select>
<?php
	foreach($this->view->dados as $indice => $produto) {
		echo $produto['id'] . ' - ' . $produto['descricao'] . ' - ' . $produto['preco'];
		echo '<br />';
	}
?>
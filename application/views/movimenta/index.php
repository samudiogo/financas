<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
# não esqueça de implementar a função de autenticar!!!!!!!!
$valor_saida = 0;
$valor_entrada = 0;
$ur = "movimenta/on_edit/";
?>
<section style="margin-bottom: 10px;">
<script type="text/javascript">
$("body").on("hidden.bs.modal", "#myModal", function () {
	$(this).removeData("bs.modal");
	$(this).find(".modal-body").html('');
	});
</script>
<?php 
echo form_open("movimenta/on_edit")."\n";
$x = array(
		"name" 		=> "mov_tp_mov",
		"id" 		=> "mov_tp_mov");
echo form_button(array_merge($x,array(
		"type"			=> "button",
		"value"			=> "1",
		"content"		=> "Entrada",
		"class"   		=> "mov_tp_mov btn btn-success",
		"data-toggle"	=> "modal",
		"data-target"	=> "#myModal",
		"onClick"	=> "sub()"
))) ."\n";
echo form_button(array_merge($x,array(
		"type" 		=> "button",
		"value"		=> "2",
		"content"	=> "Saida",
		"class"   	=> "mov_tp_mov btn btn-danger",
		"data-toggle"	=> "modal",
		"data-target"	=> "#myModal",
		"onClick"	=> "sub()"
))) ."\n";
echo form_close()."\n";
?>
</section>
<section>
<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#mov_results').dataTable();
			} );
		</script>
	<table class="table table-bordered table-hover" id="mov_results">
	<thead>
		<tr>
		    <th>Editar</th>
		    <th>Titulo</th>
		    <th>Descrição</th>
		    <th>Data da Movimentação</th>
		    <th>Valor</th>
		  </tr>
	</thead>
	<tbody>
	<?php foreach ($moviments as $item):?>
	<tr>
		<td><a data-toggle="modal" class="tooltip-test" href="<?= base_url($ur."{$item['id']}")?>" data-target="#myModal">
		<span data-toggle="tooltip" class="btn btn-default glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="Editar"></span></a></td>
		<td><?= $item['mov_name']?></td>
		<td><?= $item['mov_desc']?></td>
		<td><?= dateEnToBr($item['mov_data'])?></td>
		<td <?= ($item['mov_tp_mov'] == 2) ? "style='color: red';": "" ?>><?= numerosEmReais($item['mov_valor'])?></td>
	</tr>
	<?php
		if ($item['mov_tp_mov'] == 1)
		{
			$valor_entrada = $valor_entrada + $item['mov_valor'];
		}
		else 
		{
			$valor_saida = $valor_saida + $item['mov_valor'];
		} 
	?>
	<?php endforeach;?>
	</tbody>
	<tfoot>
		<tr>
		<td colspan="2"></td>
		<td class="success"><strong>Total de Entrada: </strong><span><?= numerosEmReais($valor_entrada);?></span></td>
		<td class="danger"><strong>Total de Saída:  </strong><span><?=  numerosEmReais($valor_saida);?></span></td>
		<td class="info"><strong>Saldo Geral:  </strong><span><?= numerosEmReais($valor_entrada - $valor_saida);?></span></td>
		</tr>
	</tfoot>
	</table>
</section>
<section>
<script type="text/javascript">
</script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> 
</section>

<section class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="<?= (@$moviments["mov_tp_mov"]==2)? "text-alert":"text-success"?>">Formulário</h4>
</section>
	<?php
	$pre_input = array(
		"class" => "form-control",
		"required" => "required"
	);
	$user = auth_check();
	echo form_open("movimenta/store");
	echo '<section class="modal-body">';
		echo form_hidden("mov_tp_mov",@$moviments["mov_tp_mov"])."\n";
		echo form_hidden("id",@$moviments["id"])."\n";
		echo form_hidden("mov_id_user",$user["id"])."\n";
		echo form_label(@$moviments['id']." Título: ","mov_name")."\n";
		echo form_input(array_merge($pre_input,array(
			"id"	=> "mov_name",
			"name" 	=> "mov_name",
			"value"	=> set_value("mov_name",form_prep(@$moviments["mov_name"]))
		)))."\n";
		echo form_label("Descrição: ","mov_desc")."\n";
		echo form_textarea(array_merge($pre_input,array(
			"id"	=> "mov_desc",
			"name" 	=> "mov_desc",
			"value"	=> set_value("mov_desc",form_prep(@$moviments["mov_desc"]))
				
		)))."\n";
		echo form_label("Data: ","mov_data")."\n";
		echo form_input(array_merge($pre_input,array(
			"id"	=> "mov_data",
			"name" 	=> "mov_data",
			"value"	=> set_value("mov_data",form_prep(dateEnToBr(@$moviments["mov_data"])))
		)))."\n";
		echo form_label("Valor","mov_valor")."\n";
		echo form_input(array_merge($pre_input,array(
				"id"	=> "mov_valor",
				"name" 	=> "mov_valor",
				"value"	=> set_value("mov_valor",form_prep(@$moviments["mov_valor"]))
		)))."\n";
		echo "</section>"."\n".'<footer class="modal-footer">';
		echo form_submit(array_merge($pre_input,array(
				"value" => "Salvar",
				"class"	=> "btn btn-success",
				"data-loading-text"=>"Loading..."
		)))."\n";
		echo form_input(array_merge($pre_input,array(
				"id"		=> "mov_valor",
				"name" 		=> "mov_valor",
				"type" 		=> "button",
				"class" 	=> "btn btn-danger",
				"value"	=> "Fechar",
				"data-dismiss" =>"modal"
		)))."\n";
		echo '</footer>';
	echo form_close();
	
	?>



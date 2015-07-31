<?php
	$this->assign('title','Anna De Sanctis | Traducciones');
	$this->assign('nav','ingles');

	$this->display('_Header.tpl.php');
?>


<script type="text/javascript">
		
	// hack for IE9 which may respond inconsistently with document.ready
	window.onload=function(){
		$("#edicion_manual").click(function(){
			$("#array_traducciones").prop("disabled",false);
			$(this).fadeOut('fast');
			$("#guardar_cambios").fadeIn('slow');
			$("#manualDetailDialog").modal();
		});	

		$("#guardar_cambios").click(function(){
			$.ajax({
				type:"POST",
				data:{texto: $("#array_traducciones").val() },
				url:'./traduccionmanual',
				success:function(data){
					if(!data.success){
						alert(data.message);
					}else{
						alert("El archivo se guardo exitosamente");
					}

					//window.location.reload();
				}
			});
		});

		$("#traduccion_automatica").click(function(){
			$.ajax({
				type:"GET",
				url:'./traducir',
				success:function(data){
					var msg;
					if(data.added>0){
						msg="Se agregaron "+data.added+" nuevos registros de textos traducidos";
						if(data.deleted>0) msg=msg+" y "+data.deleted+" fueron actualizados";
					}else{
						msg="No se encontraron nuevos textos para traducir";
						if(data.deleted>0)msg=msg+" pero "+data.deleted+" registros fueron actualizados";
					}
					alert(msg);
					window.location.reload();
				}
			});
		});
	}

	
	
</script>

<div class="container">

<h1>
	<i class="icon-th-list"></i> Traducciones a Inglés
	
</h1>

	<textarea id="array_traducciones" style="width:90%; height:400px" disabled>
		<?php 
			echo($this->lang); 
		?>

	</textarea>

	<button id="traduccion_automatica" class="btn btn-primary">Traducción Automática</button>
	<button id="edicion_manual" class="btn btn-success">Edición Manual</button>
	<button id="guardar_cambios" class="btn btn-success hide">Guardar</button>
	
	<div class="modal hide fade" id="manualDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			
		</div>
		<div class="modal-body">
			<div id="modelAlert">
				ADVERTENCIA: solemente modificar los textos correspondientes a "traduccion".
			</div>
			
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Aceptar</button>
		</div>
	</div>
	
</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>

<?php
	$this->assign('title','Anna De Santis | Consejos');
	$this->assign('nav','consejos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/consejos.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>

<div class="container">

<h1>
	<i class="icon-th-list"></i> Consejos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="consejoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdConsejo">Id Consejo<% if (page.orderBy == 'IdConsejo') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Titulo">Titulo<% if (page.orderBy == 'Titulo') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idConsejo')) %>">
				<td><%= _.escape(item.get('idConsejo') || '') %></td>				
				<td><%= _.escape(item.get('titulo') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="consejoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idConsejoInputContainer" class="control-group">
					<label class="control-label" for="idConsejo">Id Consejo</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idConsejo"><%= _.escape(item.get('idConsejo') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				
				<div id="tituloInputContainer" class="control-group">
					<label class="control-label" for="titulo">Titulo</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="titulo" placeholder="Titulo" value="<%= _.escape(item.get('titulo') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>

				<div id="htmlInputContainer" class="control-group">
					<label class="control-label" for="html">Html</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="html" rows="3"><%= _.escape(item.get('html') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>

			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteConsejoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteConsejoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Consejo</button>
						<span id="confirmDeleteConsejoContainer" class="hide">
							<button id="cancelDeleteConsejoButton" class="btn btn-mini">Cancelar</button>
							<button id="confirmDeleteConsejoButton" class="btn btn-mini btn-danger">Confirmar</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="consejoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Editar Consejo
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="consejoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancelar</button>
			<button id="saveConsejoButton" class="btn btn-primary">Guardar</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="consejoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newConsejoButton" class="btn btn-primary">Agregar Consejo</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>

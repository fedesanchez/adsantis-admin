<?php
	$this->assign('title','Anna De Santis | Lineas');
	$this->assign('nav','lineas');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/lineas.js").wait(function(){
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
	<i class="icon-th-list"></i> Lineas
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="lineaCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdLinea">Id Linea<% if (page.orderBy == 'IdLinea') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_IdCategoria">Id Categoria<% if (page.orderBy == 'IdCategoria') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Img">Img<% if (page.orderBy == 'Img') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Descripcion">Descripcion<% if (page.orderBy == 'Descripcion') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Atributos">Atributos<% if (page.orderBy == 'Atributos') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idLinea')) %>">
				<td><%= _.escape(item.get('idLinea') || '') %></td>
				<td><%= _.escape(item.get('idCategoria') || '') %></td>
				<td><%= _.escape(item.get('img') || '') %></td>
				<td><%= _.escape(item.get('descripcion') || '') %></td>
				<td><%= _.escape(item.get('atributos') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="lineaModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idLineaInputContainer" class="control-group">
					<label class="control-label" for="idLinea">Id Linea</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="idLinea" placeholder="Id Linea" value="<%= _.escape(item.get('idLinea') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="idCategoriaInputContainer" class="control-group">
					<label class="control-label" for="idCategoria">Id Categoria</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="idCategoria" placeholder="Id Categoria" value="<%= _.escape(item.get('idCategoria') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="imgInputContainer" class="control-group">
					<label class="control-label" for="img">Img</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="img" placeholder="Img" value="<%= _.escape(item.get('img') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descripcionInputContainer" class="control-group">
					<label class="control-label" for="descripcion">Descripcion</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="descripcion" rows="3"><%= _.escape(item.get('descripcion') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="atributosInputContainer" class="control-group">
					<label class="control-label" for="atributos">Atributos</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="atributos" rows="3"><%= _.escape(item.get('atributos') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteLineaButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteLineaButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Linea</button>
						<span id="confirmDeleteLineaContainer" class="hide">
							<button id="cancelDeleteLineaButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteLineaButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="lineaDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Linea
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="lineaModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveLineaButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="lineaCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newLineaButton" class="btn btn-primary">Add Linea</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>

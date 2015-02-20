<?php
	$this->assign('title','PUNTOS | Salones');
	$this->assign('nav','salones');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/salones.js").wait(function(){
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
	<i class="icon-th-list"></i> Salones
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="salonCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdSalon">Id Salon<% if (page.orderBy == 'IdSalon') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Nombre">Nombre<% if (page.orderBy == 'Nombre') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Direccion">Direccion<% if (page.orderBy == 'Direccion') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Telefono">Telefono<% if (page.orderBy == 'Telefono') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Email">Email<% if (page.orderBy == 'Email') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Latitud">Latitud<% if (page.orderBy == 'Latitud') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Longitud">Longitud<% if (page.orderBy == 'Longitud') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idSalon')) %>">
				<td><%= _.escape(item.get('idSalon') || '') %></td>
				<td><%= _.escape(item.get('nombre') || '') %></td>
				<td><%= _.escape(item.get('direccion') || '') %></td>
				<td><%= _.escape(item.get('telefono') || '') %></td>
				<td><%= _.escape(item.get('email') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('latitud') || '') %></td>
				<td><%= _.escape(item.get('longitud') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="salonModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idSalonInputContainer" class="control-group">
					<label class="control-label" for="idSalon">Id Salon</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idSalon"><%= _.escape(item.get('idSalon') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="nombreInputContainer" class="control-group">
					<label class="control-label" for="nombre">Nombre</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="nombre" placeholder="Nombre" value="<%= _.escape(item.get('nombre') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="direccionInputContainer" class="control-group">
					<label class="control-label" for="direccion">Direccion</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="direccion" placeholder="Direccion" value="<%= _.escape(item.get('direccion') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="telefonoInputContainer" class="control-group">
					<label class="control-label" for="telefono">Telefono</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="telefono" placeholder="Telefono" value="<%= _.escape(item.get('telefono') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="emailInputContainer" class="control-group">
					<label class="control-label" for="email">Email</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="email" placeholder="Email" value="<%= _.escape(item.get('email') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="latitudInputContainer" class="control-group">
					<label class="control-label" for="latitud">Latitud</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="latitud" placeholder="Latitud" value="<%= _.escape(item.get('latitud') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="longitudInputContainer" class="control-group">
					<label class="control-label" for="longitud">Longitud</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="longitud" placeholder="Longitud" value="<%= _.escape(item.get('longitud') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteSalonButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteSalonButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Salon</button>
						<span id="confirmDeleteSalonContainer" class="hide">
							<button id="cancelDeleteSalonButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteSalonButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="salonDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Salon
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="salonModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveSalonButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="salonCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newSalonButton" class="btn btn-primary">Add Salon</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>

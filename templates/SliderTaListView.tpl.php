<?php
	$this->assign('title','Anna De Santis | SliderTas');
	$this->assign('nav','slidertas');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/slidertas.js").wait(function(){
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
	<i class="icon-th-list"></i> Slider Triple acción
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="sliderTaCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdSliderTa">Id <% if (page.orderBy == 'IdSliderTa') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_ImgProducto">Imagen Producto<% if (page.orderBy == 'ImgProducto') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TitProducto">Título Producto<% if (page.orderBy == 'TitProducto') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TitProp1">Característica 1<% if (page.orderBy == 'TitProp1') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TitProp2">Característica 2<% if (page.orderBy == 'TitProp2') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TitProp3">Característica 3<% if (page.orderBy == 'TitProp3') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_DescProp1">Descripción C1<% if (page.orderBy == 'DescProp1') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>				
				<th id="header_DescProp2">Descripción C2<% if (page.orderBy == 'DescProp2') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>				
				<th id="header_DescProp3">Descripción C3<% if (page.orderBy == 'DescProp3') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Link">Link<% if (page.orderBy == 'Link') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Orden">Orden<% if (page.orderBy == 'Orden') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Habilitado">Habilitado<% if (page.orderBy == 'Habilitado') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idSliderTa')) %>">
				<td><%= _.escape(item.get('idSliderTa') || '') %></td>
				<td><%= _.escape(item.get('imgProducto') || '') %></td>
				<td><%= _.escape(item.get('titProducto') || '') %></td>
				<td><%= _.escape(item.get('titProp1') || '') %></td>
				<td><%= _.escape(item.get('titProp2') || '') %></td>				
				<td><%= _.escape(item.get('titProp3') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('descProp1') || '') %></td>
				<td><%= _.escape(item.get('descProp2') || '') %></td>				
				<td><%= _.escape(item.get('descProp3') || '') %></td>
				<td><%= _.escape(item.get('link') || '') %></td>
				<td><%= _.escape(item.get('orden') || '') %></td>
				<td><%= _.escape(item.get('habilitado') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="sliderTaModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idSliderTaInputContainer" class="control-group">
					<label class="control-label" for="idSliderTa">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idSliderTa"><%= _.escape(item.get('idSliderTa') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>

				<div id="titProductoInputContainer" class="control-group">
					<label class="control-label" for="titProducto">Título Producto</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="titProducto" placeholder="título" value="<%= _.escape(item.get('titProducto') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>

				<div id="imgProductoInputContainer" class="control-group">
					<label class="control-label" for="imgProducto">Imagen Producto</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="imgProducto" placeholder="seleccione imagen" value="<%= _.escape(item.get('imgProducto') || '') %>" disabled>
						<span class="help-inline"></span>
						<div>
		                    <span class="btn btn-success fileinput-button">
		                        <i class="icon-plus"></i>
		                        <span>Adjuntar...</span>
		                        <!-- The file input field used as target for the file upload widget -->
		                        <input id="fileupload-sliderta-fondo" type="file" name="files[]" multiple>
		                    </span>
		                    <br>
		                    <br>
		                    <!-- The global progress bar -->
		                    <div id="progress" class="progress">
		                        <div class="bar progress-bar-success"></div>
		                    </div>
		                    <!-- The container for the uploaded files -->
		                    <div id="files" class="files"></div>
                    		<br>
                		</div>
					</div>
				</div>
				
				<div id="titProp1InputContainer" class="control-group">
					<label class="control-label" for="titProp1">Característica 1</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="titProp1" placeholder="título de la característica 1" value="<%= _.escape(item.get('titProp1') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descProp1InputContainer" class="control-group">
					<label class="control-label" for="descProp1">Descripción C1</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="descProp1" placeholder="Descripción de la característica 1" ><%= _.escape(item.get('descProp1') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="titProp2InputContainer" class="control-group">
					<label class="control-label" for="titProp2">Característica 2</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="titProp2" placeholder="título de la característica 2" value="<%= _.escape(item.get('titProp2') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descProp2InputContainer" class="control-group">
					<label class="control-label" for="descProp2">Descripción C2</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="descProp2" placeholder="Descripción de la característica 2"><%= _.escape(item.get('descProp2') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="titProp3InputContainer" class="control-group">
					<label class="control-label" for="titProp3">Característica 3</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="titProp3" placeholder="título de la característica 3" value="<%= _.escape(item.get('titProp3') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descProp3InputContainer" class="control-group">
					<label class="control-label" for="descProp3">Descripción C3</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="descProp3" placeholder="Descripción de la característica 3"><%= _.escape(item.get('descProp3') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="linkInputContainer" class="control-group">
					<label class="control-label" for="link">Link</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="link" placeholder="Link" value="<%= _.escape(item.get('link') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="ordenInputContainer" class="control-group">
					<label class="control-label" for="orden">Orden</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="orden" placeholder="Orden" value="<%= _.escape(item.get('orden') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="habilitadoInputContainer" class="control-group">
					<label class="control-label" for="habilitado">Habilitado</label>
					<div class="controls inline-inputs">
						<input type="checkbox" class="input-xlarge" id="habilitado" placeholder="Habilitado" value="1" <% if (item.get('habilitado') == '1') { %>checked="checked"<% } %> >
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteSliderTaButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteSliderTaButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Borrar</button>
						<span id="confirmDeleteSliderTaContainer" class="hide">
							<button id="cancelDeleteSliderTaButton" class="btn btn-mini">Cancelar</button>
							<button id="confirmDeleteSliderTaButton" class="btn btn-mini btn-danger">Confirmar</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="sliderTaDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Editar Slider Triple acción
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="sliderTaModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancelar</button>
			<button id="saveSliderTaButton" class="btn btn-primary">Guardar</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="sliderTaCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newSliderTaButton" class="btn btn-primary">Agregar Slider</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>

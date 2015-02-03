<?php
	$this->assign('title','Anna De Santis | Sliders');
	$this->assign('nav','sliders');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/sliders.js").wait(function(){
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
	<i class="icon-th-list"></i> Sliders
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="sliderCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdSlider">Id Slider<% if (page.orderBy == 'IdSlider') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_NombreProducto">Nombre Producto<% if (page.orderBy == 'NombreProducto') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_DescSupProd">Desc Sup Prod<% if (page.orderBy == 'DescSupProd') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Orden">Orden<% if (page.orderBy == 'Orden') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Habilitado">Habilitado<% if (page.orderBy == 'Habilitado') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_ImgFondo">Img Fondo<% if (page.orderBy == 'ImgFondo') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_ImgProducto">Img Producto<% if (page.orderBy == 'ImgProducto') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>				
				<th id="header_DescInfProd">Desc Inf Prod<% if (page.orderBy == 'DescInfProd') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Link">Link<% if (page.orderBy == 'Link') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idSlider')) %>">
				<td><%= _.escape(item.get('idSlider') || '') %></td>				
				<td><%= _.escape(item.get('nombreProducto') || '') %></td>
				<td><%= _.escape(item.get('descSupProd') || '') %></td>
				<td><%= _.escape(item.get('orden') || '') %></td>
				<td><%= _.escape(item.get('habilitado') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('imgFondo') || '') %></td>
				<td><%= _.escape(item.get('imgProducto') || '') %></td>
				<td><%= _.escape(item.get('descInfProd') || '') %></td>
				<td><%= _.escape(item.get('link') || '') %></td>
				
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="sliderModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idSliderInputContainer" class="control-group">
					<label class="control-label" for="idSlider">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idSlider"><%= _.escape(item.get('idSlider') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="nombreProductoInputContainer" class="control-group">
					<label class="control-label" for="nombreProducto">Nombre Producto</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="nombreProducto" placeholder="Nombre Producto" value="<%= _.escape(item.get('nombreProducto') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="imgFondoInputContainer" class="control-group">
					<label class="control-label" for="imgFondo">Imagen de Fondo</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="imgFondo" placeholder="Seleccionar imagen" value="<%= _.escape(item.get('imgFondo') || '') %>" disabled>
						<span class="help-inline"></span>

						<div>
		                    <span class="btn btn-success fileinput-button">
		                        <i class="icon-plus"></i>
		                        <span>Adjuntar...</span>
		                        <!-- The file input field used as target for the file upload widget -->
		                        <input id="fileupload-slider-fondo" type="file" name="files[]" multiple>
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
				<div id="imgProductoInputContainer" class="control-group">
					<label class="control-label" for="imgProducto">Imagen del Producto</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="imgProducto" placeholder="Seleccionar imagen" value="<%= _.escape(item.get('imgProducto') || '') %>" disabled>
						<span class="help-inline"></span>
						<div>
		                    <span class="btn btn-success fileinput-button">
		                        <i class="icon-plus"></i>
		                        <span>Adjuntar...</span>
		                        <!-- The file input field used as target for the file upload widget -->
		                        <input id="fileupload-slider-prod" type="file" name="files[]" multiple>
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
				
				<div id="descSupProdInputContainer" class="control-group">
					<label class="control-label" for="descSupProd">Descripción Superior</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="descSupProd" placeholder="Descripción ..." value="<%= _.escape(item.get('descSupProd') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descInfProdInputContainer" class="control-group">
					<label class="control-label" for="descInfProd">Descripcion Inferior</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="descInfProd" placeholder="Descripción ..." value="<%= _.escape(item.get('descInfProd') || '') %>">
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
						<input type="checkbox" class="input-xlarge" id="habilitado" placeholder="Habilitado" value="1" <% if (item.get('habilitado') == '1') { %>checked="checked"<% } %>>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteSliderButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteSliderButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Slider</button>
						<span id="confirmDeleteSliderContainer" class="hide">
							<button id="cancelDeleteSliderButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteSliderButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="sliderDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Slider
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="sliderModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveSliderButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="sliderCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newSliderButton" class="btn btn-primary">Add Slider</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>

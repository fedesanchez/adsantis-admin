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
	<i class="icon-th-list"></i> SliderTas
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
				<th id="header_IdSliderTa">Id Slider Ta<% if (page.orderBy == 'IdSliderTa') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_ImgProducto">Img Producto<% if (page.orderBy == 'ImgProducto') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TitProducto">Tit Producto<% if (page.orderBy == 'TitProducto') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TitProp1">Tit Prop 1<% if (page.orderBy == 'TitProp1') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_DescProp1">Desc Prop 1<% if (page.orderBy == 'DescProp1') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_TitProp2">Tit Prop 2<% if (page.orderBy == 'TitProp2') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_DescProp2">Desc Prop 2<% if (page.orderBy == 'DescProp2') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TitProp3">Tit Prop 3<% if (page.orderBy == 'TitProp3') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_DescProp3">Desc Prop 3<% if (page.orderBy == 'DescProp3') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
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
				<td><%= _.escape(item.get('descProp1') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('titProp2') || '') %></td>
				<td><%= _.escape(item.get('descProp2') || '') %></td>
				<td><%= _.escape(item.get('titProp3') || '') %></td>
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
					<label class="control-label" for="idSliderTa">Id Slider Ta</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idSliderTa"><%= _.escape(item.get('idSliderTa') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="imgProductoInputContainer" class="control-group">
					<label class="control-label" for="imgProducto">Img Producto</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="imgProducto" placeholder="Img Producto" value="<%= _.escape(item.get('imgProducto') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="titProductoInputContainer" class="control-group">
					<label class="control-label" for="titProducto">Tit Producto</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="titProducto" placeholder="Tit Producto" value="<%= _.escape(item.get('titProducto') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="titProp1InputContainer" class="control-group">
					<label class="control-label" for="titProp1">Tit Prop 1</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="titProp1" placeholder="Tit Prop 1" value="<%= _.escape(item.get('titProp1') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descProp1InputContainer" class="control-group">
					<label class="control-label" for="descProp1">Desc Prop 1</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="descProp1" placeholder="Desc Prop 1" value="<%= _.escape(item.get('descProp1') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="titProp2InputContainer" class="control-group">
					<label class="control-label" for="titProp2">Tit Prop 2</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="titProp2" placeholder="Tit Prop 2" value="<%= _.escape(item.get('titProp2') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descProp2InputContainer" class="control-group">
					<label class="control-label" for="descProp2">Desc Prop 2</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="descProp2" placeholder="Desc Prop 2" value="<%= _.escape(item.get('descProp2') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="titProp3InputContainer" class="control-group">
					<label class="control-label" for="titProp3">Tit Prop 3</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="titProp3" placeholder="Tit Prop 3" value="<%= _.escape(item.get('titProp3') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descProp3InputContainer" class="control-group">
					<label class="control-label" for="descProp3">Desc Prop 3</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="descProp3" placeholder="Desc Prop 3" value="<%= _.escape(item.get('descProp3') || '') %>">
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
						<input type="text" class="input-xlarge" id="habilitado" placeholder="Habilitado" value="<%= _.escape(item.get('habilitado') || '') %>">
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
						<button id="deleteSliderTaButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete SliderTa</button>
						<span id="confirmDeleteSliderTaContainer" class="hide">
							<button id="cancelDeleteSliderTaButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteSliderTaButton" class="btn btn-mini btn-danger">Confirm</button>
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
				<i class="icon-edit"></i> Edit SliderTa
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="sliderTaModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveSliderTaButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="sliderTaCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newSliderTaButton" class="btn btn-primary">Add SliderTa</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>

<?php
	$this->assign('title','Anna De Santis | Testimonios');
	$this->assign('nav','testimonios');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/testimonios.js").wait(function(){
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
	<i class="icon-th-list"></i> Testimonios
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="testimonioCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdTestimonio">Id Testimonio<% if (page.orderBy == 'IdTestimonio') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Texto">Texto<% if (page.orderBy == 'Texto') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Autor">Autor<% if (page.orderBy == 'Autor') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Profesion">Profesion<% if (page.orderBy == 'Profesion') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Img">Img<% if (page.orderBy == 'Img') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idTestimonio')) %>">
				<td><%= _.escape(item.get('idTestimonio') || '') %></td>
				<td><%= _.escape(item.get('texto') || '') %></td>
				<td><%= _.escape(item.get('autor') || '') %></td>
				<td><%= _.escape(item.get('profesion') || '') %></td>
				<td><%= _.escape(item.get('img') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="testimonioModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idTestimonioInputContainer" class="control-group">
					<label class="control-label" for="idTestimonio">Id Testimonio</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idTestimonio"><%= _.escape(item.get('idTestimonio') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="textoInputContainer" class="control-group">
					<label class="control-label" for="texto">Texto</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="texto" rows="3"><%= _.escape(item.get('texto') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="autorInputContainer" class="control-group">
					<label class="control-label" for="autor">Autor</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="autor" placeholder="Autor" value="<%= _.escape(item.get('autor') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="profesionInputContainer" class="control-group">
					<label class="control-label" for="profesion">Profesion</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="profesion" placeholder="Profesion" value="<%= _.escape(item.get('profesion') || '') %>">
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
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteTestimonioButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteTestimonioButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Testimonio</button>
						<span id="confirmDeleteTestimonioContainer" class="hide">
							<button id="cancelDeleteTestimonioButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteTestimonioButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="testimonioDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Testimonio
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="testimonioModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveTestimonioButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="testimonioCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newTestimonioButton" class="btn btn-primary">Add Testimonio</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>

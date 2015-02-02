<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-Frame-Options" content="deny">
		<base href="<?php $this->eprint($this->ROOT_URL); ?>" />
		<title><?php $this->eprint($this->title); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="Anna De Santis" />
		<meta name="author" content="phreeze builder | phreeze.com" />

		<!-- Le styles -->

		
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet" />

		<link href="styles/style.css" rel="stylesheet" />
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link href="bootstrap/css/font-awesome.min.css" rel="stylesheet" />
		<!--[if IE 7]>
		<link rel="stylesheet" href="bootstrap/css/font-awesome-ie7.min.css">
		<![endif]-->
		<link href="bootstrap/css/datepicker.css" rel="stylesheet" />
		<link href="bootstrap/css/timepicker.css" rel="stylesheet" />
		<link href="bootstrap/css/bootstrap-combobox.css" rel="stylesheet" />
		<link href="bootstrap/css/styles.css" rel="stylesheet" />
		
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Le fav and touch icons -->
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114-precomposed.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72-precomposed.png" />
		<link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-57-precomposed.png" />

		<script type="text/javascript" src="scripts/libs/LAB.min.js"></script>
		<script type="text/javascript">
			$LAB.script("//code.jquery.com/jquery-1.8.2.min.js").wait()
				.script("bootstrap/js/bootstrap.min.js")
				.script("bootstrap/js/bootstrap-datepicker.js")
				.script("bootstrap/js/bootstrap-timepicker.js")
				.script("bootstrap/js/bootstrap-combobox.js")
				.script("scripts/libs/underscore-min.js").wait()
				.script("scripts/libs/underscore.date.min.js")
				.script("scripts/libs/backbone-min.js")
				.script("scripts/app.js")
				.script("scripts/model.js").wait()
				.script("scripts/view.js").wait()
				.script("bootstrap/js/jasny-bootstrap.min.js").wait()

		</script>
		
	</head>

	<body>


			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					<div class="">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<a class="brand" href="./">Anna De Santis</a>
						<div class="nav-collapse collapse">
							
							
							<ul class="nav pull-right">
								<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-lock"></i> <?php $this->eprint($this->currentUser->Username); ?> <i class="caret"></i></a>
								<ul class="dropdown-menu">
									
			                        <li>
			                            <a href="./logout"><i class="fa fa-fw fa-power-off"></i> Salir</a>
			                        </li>
									
								</ul>
								</li>
							</ul>
							
						</div><!--/.nav-collapse -->
					</div>
				</div>
			</div>


			<div class="container-fluid">
            <div class="row-fluid">

			 <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li  <?php if ($this->nav=='inicio') { echo 'class="active"'; } ?>>
                        <a href="./"><i class="fa fa-fw fa-dashboard"></i> Inicio</a>
                    </li>
                    <li  <?php if ($this->nav=='estadisticas') { echo 'class="active"'; } ?>>
                        <a href="./estadisticas"><i class="fa fa-fw fa-table"></i> Estadisticas</a>
                    </li>
                    <li  <?php if ($this->nav=='archivos') { echo 'class="active"'; } ?>>
                    	<a href="#" onclick="$('#media-manager').modal();">Archivos</a>           
                    </li>
                    <li  <?php if ($this->nav=='categorias') { echo 'class="active"'; } ?>>
                        <a href="./categorias"><i class="fa fa-fw fa-bar-chart-o"></i>Categorias</a>
                    </li>
                    <li  <?php if ($this->nav=='lineas') { echo 'class="active"'; } ?>>
                    	<a href="./lineas"><i class="fa fa-fw fa-edit"></i> Lineas</a>                    
                    </li>
                    
                    <li <?php if ($this->nav=='sliders') { echo 'class="active"'; } ?>>
                        <a href="./sliders"><i class="fa fa-fw fa-desktop"></i> Slider Principal</a>
                    </li>
                    <li  <?php if ($this->nav=='slidersta') { echo 'class="active"'; } ?>>
                        <a href="./slidertas"><i class="fa fa-fw fa-wrench"></i> Slider Triple Accion</a>
                    </li>
                    
                    <li  <?php if ($this->nav=='testimonios') { echo 'class="active"'; } ?>>
                        <a href="./testimonios"><i class="fa fa-fw fa-file"></i> Testimonios</a>
                    </li>
                    <li  <?php if ($this->nav=='consejos') { echo 'class="active"'; } ?>>
                        <a href="./consejos"><i class="fa fa-fw fa-table"></i> Consejos</a>
                    </li>
                    
                    </ul>
                </div>
			

   
       <div class="modal hide fade" id="media-manager">
       	<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Media
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<iframe src="media/filemanager/dialog.php?type=0" width="765" height="550"></iframe>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancelar</button>
		</div>       		
       </div>

       <div class="modal hide fade" id="select-image">
       	<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Seleccionar
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<iframe src="media/filemanager/dialog.php?type=1&field_id=img" width="765" height="550" frameborder="0"></iframe>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancelar</button>
		</div>       		
       </div>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-Frame-Options" content="deny">
		<base href="<?php $this->eprint($this->ROOT_URL); ?>" />
		<title>OLIO -> By Anna De Sanctis</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="Anna De Sanctis" />
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
		<link rel="stylesheet" href="upload/jquery.fileupload.css">
		<link rel="stylesheet" type="text/css" href="styles/jquery.tag-editor.css" />
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
			$LAB.script("scripts/libs/jquery-1.11.1.min.js").wait()
				.script("scripts/libs/jquery.ui.widget.js").wait()
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
				.script("upload/jquery.fileupload.js").wait()				
				.script("upload/handler.js").wait()
		</script>

        <!-- The basic File Upload plugin -->
        
		
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
						<a class="brand" href="./">Anna De Sanctis</a>
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
                    <li  <?php if ($this->nav=='categorias') { echo 'class="active"'; } ?>>
                        <a href="./categorias"><i class="icon-chevron-right"></i>Categorias</a>
                    </li>
                    <li  <?php if ($this->nav=='lineas') { echo 'class="active"'; } ?>>
                    	<a href="./lineas"><i class="icon-chevron-right"></i> Lineas</a>                    
                    </li>
                    
                    <li <?php if ($this->nav=='sliders') { echo 'class="active"'; } ?>>
                        <a href="./sliders"><i class="icon-chevron-right"></i> Slider Principal</a>
                    </li>
                    <li  <?php if ($this->nav=='slidertas') { echo 'class="active"'; } ?>>
                        <a href="./slidertas"><i class="icon-chevron-right"></i> Triple Accion</a>
                    </li>
                    
                    <li  <?php if ($this->nav=='testimonios') { echo 'class="active"'; } ?>>
                        <a href="./testimonios"><i class="icon-chevron-right"></i> Testimonios</a>
                    </li>
                    <li  <?php if ($this->nav=='consejos') { echo 'class="active"'; } ?>>
                        <a href="./consejos"><i class="icon-chevron-right"></i> Consejos</a>
                    </li>
                    <li  <?php if ($this->nav=='puntos') { echo 'class="active"'; } ?>>
                        <a href="./puntosdeventa"><i class="icon-chevron-right"></i> Puntos de Venta</a>
                    </li>
                    <li  <?php if ($this->nav=='salones') { echo 'class="active"'; } ?>>
                        <a href="./salones"><i class="icon-chevron-right"></i> Salones</a>
                    </li>                  
                    <li  <?php if ($this->nav=='estadisticas') { echo 'class="active"'; } ?>>
                        <a href="./estadisticas"><i class="icon-chevron-right"></i> Estadisticas</a>
                    </li>
					<li  <?php if ($this->nav=='ingles') { echo 'class="active"'; } ?>>
                        <a href="./ingles"><i class="icon-chevron-right"></i> Ingles</a>
                    </li>                   
                    </ul>
                </div>
			

   
       

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <base href="<?php $this->eprint($this->ROOT_URL); ?>" />
	<title><?php $this->eprint($this->title); ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/css/bootstrap2.min.css" rel="stylesheet">
    
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="bootstrap/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS --
    <!-- Custom Fonts -->
    <link href="bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/datepicker.css" rel="stylesheet" />
    <link href="bootstrap/css/timepicker.css" rel="stylesheet" />
    <link href="bootstrap/css/bootstrap-combobox.css" rel="stylesheet" />
        

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./">Anna De Santis</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="./"><i class="fa fa-fw fa-dashboard"></i> Inicio</a>
                    </li>
                    <li>
                        <a href="./categorias"><i class="fa fa-fw fa-bar-chart-o"></i> Categorias</a>
                    </li>
                    <li>
                    	<a href="./lineas"><i class="fa fa-fw fa-edit"></i> Lineas</a>                    
                    </li>
                    
                    <li>
                        <a href="./sliders"><i class="fa fa-fw fa-desktop"></i> Slider Principal</a>
                    </li>
                    <li>
                        <a href="./slidersta"><i class="fa fa-fw fa-wrench"></i> Slider Triple Accion</a>
                    </li>
                    
                    <li>
                        <a href="./testimonios"><i class="fa fa-fw fa-file"></i> Testimonios</a>
                    </li>
                    <li>
                        <a href="./consejos"><i class="fa fa-fw fa-table"></i> Consejos</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        
        <!-- /#page-wrapper -->

    
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
        </script>

</body>

</html>

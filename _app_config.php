<?php
/**
 * @package Anna De Santis
 *
 * APPLICATION-WIDE CONFIGURATION SETTINGS
 *
 * This file contains application-wide configuration settings.  The settings
 * here will be the same regardless of the machine on which the app is running.
 *
 * This configuration should be added to version control.
 *
 * No settings should be added to this file that would need to be changed
 * on a per-machine basic (ie local, staging or production).  Any
 * machine-specific settings should be added to _machine_config.php
 */

/**
 * APPLICATION ROOT DIRECTORY
 * If the application doesn't detect this correctly then it can be set explicitly
 */
if (!GlobalConfig::$APP_ROOT) GlobalConfig::$APP_ROOT = realpath("./");

/**
 * check is needed to ensure asp_tags is not enabled
 */
if (ini_get('asp_tags')) 
	die('<h3>Server Configuration Problem: asp_tags is enabled, but is not compatible with Savant.</h3>'
	. '<p>You can disable asp_tags in .htaccess, php.ini or generate your app with another template engine such as Smarty.</p>');

/**
 * INCLUDE PATH
 * Adjust the include path as necessary so PHP can locate required libraries
 */
set_include_path(
		GlobalConfig::$APP_ROOT . '/libs/' . PATH_SEPARATOR .
		//'phar://' . GlobalConfig::$APP_ROOT . '/libs/phreeze-3.3.phar' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/../phreeze/libs' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/vendor/phreeze/phreeze/libs/' . PATH_SEPARATOR .
		get_include_path()
);

/**
 * COMPOSER AUTOLOADER
 * Uncomment if Composer is being used to manage dependencies
 */
// $loader = require 'vendor/autoload.php';
// $loader->setUseIncludePath(true);

/**
 * SESSION CLASSES
 * Any classes that will be stored in the session can be added here
 * and will be pre-loaded on every page
 */
require_once "App/User.php";

/**
 * RENDER ENGINE
 * You can use any template system that implements
 * IRenderEngine for the view layer.  Phreeze provides pre-built
 * implementations for Smarty, Savant and plain PHP.
 */
require_once 'verysimple/Phreeze/SavantRenderEngine.php';
GlobalConfig::$TEMPLATE_ENGINE = 'SavantRenderEngine';
GlobalConfig::$TEMPLATE_PATH = GlobalConfig::$APP_ROOT . '/templates/';

/**
 * ROUTE MAP
 * The route map connects URLs to Controller+Method and additionally maps the
 * wildcards to a named parameter so that they are accessible inside the
 * Controller without having to parse the URL for parameters such as IDs
 */
GlobalConfig::$ROUTE_MAP = array(

	// default controller when no route specified
	'GET:' => array('route' => 'Default.Home'),
		
	// example authentication routes
	'GET:loginform' => array('route' => 'Default.Home'),
	'POST:login' => array('route' => 'Secure.Login'),
	'GET:secureuser' => array('route' => 'Secure.UserPage'),
	'GET:secureadmin' => array('route' => 'Secure.AdminPage'),
	'GET:logout' => array('route' => 'Secure.Logout'),

	//estadisticas
	'GET:estadisticas' => array('route' => 'Default.Estadisticas'),
	'GET:iframe' => array('route' => 'Default.iframeEstadisticas'),
	'GET:usage/(:any)' => array('route' => 'Default.usage', 'params' => array('img' => 1 )),

	// Categoria
	'GET:categorias' => array('route' => 'Categoria.ListView'),
	'GET:categoria/(:num)' => array('route' => 'Categoria.SingleView', 'params' => array('idCategoria' => 1)),
	'GET:api/categorias' => array('route' => 'Categoria.Query'),
	'POST:api/categoria' => array('route' => 'Categoria.Create'),
	'GET:api/categoria/(:num)' => array('route' => 'Categoria.Read', 'params' => array('idCategoria' => 2)),
	'PUT:api/categoria/(:num)' => array('route' => 'Categoria.Update', 'params' => array('idCategoria' => 2)),
	'DELETE:api/categoria/(:num)' => array('route' => 'Categoria.Delete', 'params' => array('idCategoria' => 2)),
		
	// Consejo
	'GET:consejos' => array('route' => 'Consejo.ListView'),
	'GET:consejo/(:num)' => array('route' => 'Consejo.SingleView', 'params' => array('idConsejo' => 1)),
	'GET:api/consejos' => array('route' => 'Consejo.Query'),
	'POST:api/consejo' => array('route' => 'Consejo.Create'),
	'GET:api/consejo/(:num)' => array('route' => 'Consejo.Read', 'params' => array('idConsejo' => 2)),
	'PUT:api/consejo/(:num)' => array('route' => 'Consejo.Update', 'params' => array('idConsejo' => 2)),
	'DELETE:api/consejo/(:num)' => array('route' => 'Consejo.Delete', 'params' => array('idConsejo' => 2)),
		
	// Linea
	'GET:lineas' => array('route' => 'Linea.ListView'),
	'GET:linea/(:any)' => array('route' => 'Linea.SingleView', 'params' => array('idLinea' => 1)),
	'GET:api/lineas' => array('route' => 'Linea.Query'),
	'POST:api/linea' => array('route' => 'Linea.Create'),
	'GET:api/linea/(:any)' => array('route' => 'Linea.Read', 'params' => array('idLinea' => 2)),
	'PUT:api/linea/(:any)' => array('route' => 'Linea.Update', 'params' => array('idLinea' => 2)),
	'DELETE:api/linea/(:any)' => array('route' => 'Linea.Delete', 'params' => array('idLinea' => 2)),
		
	// Slider
	'GET:sliders' => array('route' => 'Slider.ListView'),
	'GET:slider/(:num)' => array('route' => 'Slider.SingleView', 'params' => array('idSlider' => 1)),
	'GET:api/sliders' => array('route' => 'Slider.Query'),
	'POST:api/slider' => array('route' => 'Slider.Create'),
	'GET:api/slider/(:num)' => array('route' => 'Slider.Read', 'params' => array('idSlider' => 2)),
	'PUT:api/slider/(:num)' => array('route' => 'Slider.Update', 'params' => array('idSlider' => 2)),
	'DELETE:api/slider/(:num)' => array('route' => 'Slider.Delete', 'params' => array('idSlider' => 2)),
		
	// SliderTa
	'GET:slidertas' => array('route' => 'SliderTa.ListView'),
	'GET:sliderta/(:num)' => array('route' => 'SliderTa.SingleView', 'params' => array('idSliderTa' => 1)),
	'GET:api/slidertas' => array('route' => 'SliderTa.Query'),
	'POST:api/sliderta' => array('route' => 'SliderTa.Create'),
	'GET:api/sliderta/(:num)' => array('route' => 'SliderTa.Read', 'params' => array('idSliderTa' => 2)),
	'PUT:api/sliderta/(:num)' => array('route' => 'SliderTa.Update', 'params' => array('idSliderTa' => 2)),
	'DELETE:api/sliderta/(:num)' => array('route' => 'SliderTa.Delete', 'params' => array('idSliderTa' => 2)),
		
	// Testimonio
	'GET:testimonios' => array('route' => 'Testimonio.ListView'),
	'GET:testimonio/(:num)' => array('route' => 'Testimonio.SingleView', 'params' => array('idTestimonio' => 1)),
	'GET:api/testimonios' => array('route' => 'Testimonio.Query'),
	'POST:api/testimonio' => array('route' => 'Testimonio.Create'),
	'GET:api/testimonio/(:num)' => array('route' => 'Testimonio.Read', 'params' => array('idTestimonio' => 2)),
	'PUT:api/testimonio/(:num)' => array('route' => 'Testimonio.Update', 'params' => array('idTestimonio' => 2)),
	'DELETE:api/testimonio/(:num)' => array('route' => 'Testimonio.Delete', 'params' => array('idTestimonio' => 2)),
		
	// Usuario
	'GET:usuarios' => array('route' => 'Usuario.ListView'),
	'GET:usuario/(:num)' => array('route' => 'Usuario.SingleView', 'params' => array('idUsuario' => 1)),
	'GET:api/usuarios' => array('route' => 'Usuario.Query'),
	'POST:api/usuario' => array('route' => 'Usuario.Create'),
	'GET:api/usuario/(:num)' => array('route' => 'Usuario.Read', 'params' => array('idUsuario' => 2)),
	'PUT:api/usuario/(:num)' => array('route' => 'Usuario.Update', 'params' => array('idUsuario' => 2)),
	'DELETE:api/usuario/(:num)' => array('route' => 'Usuario.Delete', 'params' => array('idUsuario' => 2)),

	// PuntoVenta
	'GET:puntosdeventa' => array('route' => 'PuntoVenta.ListView'),
	'GET:puntoventa/(:num)' => array('route' => 'PuntoVenta.SingleView', 'params' => array('idPunto' => 1)),
	'GET:api/puntos de ventas' => array('route' => 'PuntoVenta.Query'),
	'POST:api/puntoventa' => array('route' => 'PuntoVenta.Create'),
	'GET:api/puntoventa/(:num)' => array('route' => 'PuntoVenta.Read', 'params' => array('idPunto' => 2)),
	'PUT:api/puntoventa/(:num)' => array('route' => 'PuntoVenta.Update', 'params' => array('idPunto' => 2)),
	'DELETE:api/puntoventa/(:num)' => array('route' => 'PuntoVenta.Delete', 'params' => array('idPunto' => 2)),
		
	// Salon
	'GET:salones' => array('route' => 'Salon.ListView'),
	'GET:salon/(:num)' => array('route' => 'Salon.SingleView', 'params' => array('idSalon' => 1)),
	'GET:api/salones' => array('route' => 'Salon.Query'),
	'POST:api/salon' => array('route' => 'Salon.Create'),
	'GET:api/salon/(:num)' => array('route' => 'Salon.Read', 'params' => array('idSalon' => 2)),
	'PUT:api/salon/(:num)' => array('route' => 'Salon.Update', 'params' => array('idSalon' => 2)),
	'DELETE:api/salon/(:num)' => array('route' => 'Salon.Delete', 'params' => array('idSalon' => 2)),


	// catch any broken API urls
	'GET:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'PUT:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'POST:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'DELETE:api/(:any)' => array('route' => 'Default.ErrorApi404')
);

/**
 * FETCHING STRATEGY
 * You may uncomment any of the lines below to specify always eager fetching.
 * Alternatively, you can copy/paste to a specific page for one-time eager fetching
 * If you paste into a controller method, replace $G_PHREEZER with $this->Phreezer
 */
?>
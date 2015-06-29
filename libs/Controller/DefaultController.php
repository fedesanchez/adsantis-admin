<?php
/** @package Santis::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");

/**
 * DefaultController is the entry point to the application
 *
 * @package Santis::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class DefaultController extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 */
	protected function Init()
	{
		parent::Init();

		// TODO: add controller-wide bootstrap code
		
		// TODO: if authentiation is required for this entire controller, for example:
		// $this->RequirePermission(ExampleUser::$PERMISSION_USER,'SecureExample.LoginForm');
	}

	/**
	 * Display the home page for the application
	 */
	public function Home()
	{
		if($this->GetCurrentUser())
		{						
			$this->Assign("currentUser", $this->GetCurrentUser());
			$this->Render('LineaListView');
		}else{			
			$this->Render('Login');	
		}
		
		
	}

	/**
	 * Displayed when an invalid route is specified
	 */
	public function Error404()
	{
		$this->Render();
	}

	/**
	 * Display a fatal error message
	 */
	public function ErrorFatal()
	{
		$this->Render();
	}

	public function ErrorApi404()
	{
		$this->RenderErrorJSON('An unknown API endpoint was requested.');
	}

	public function Estadisticas(){
		$this->Assign("currentUser", $this->GetCurrentUser());
		$this->Render('Estadisticas');
	}

	public function iframeEstadisticas(){
		if($this->GetCurrentUser()){
			$path = '../../stats/';
			$stats = array_diff(scandir($path), array('..', '.'));			
			$index=file_get_contents($path."index.html");
			$index=str_replace("usage.png", "./usage/usage.png", $index);
			
			foreach ($stats as $key) {
				if(strpos($key, ".html")){
					$index=str_replace($key, "#", $index);
				}
			}
			echo $index;
			
		}else{
			echo "no tiene permisos para ver esta informacion";
		}
	}

	public function usage(){
		if($this->GetCurrentUser() && $this->GetRouter()->GetUrlParam('img')){	
			$strImg=$this->GetRouter()->GetUrlParam('img');
			$path = '../../stats/';
			$name = $path.$strImg;
			$fp = fopen($name, 'rb');

			// send the right headers
			header("Content-Type: image/png");
			header("Content-Length: " . filesize($name));

			// dump the picture and stop the script
			fpassthru($fp);
		}
	}

}
?>
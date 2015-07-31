<?php
/** @package Cargo::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require 'translate/vendor/autoload.php';

function in_array_r($needle, $haystack, $strict = false) {
	    foreach ($haystack as $item) {
	        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
	            return true;
	        }
	    }
		return false;
}

use Stichoza\GoogleTranslate\TranslateClient;

class InglesController extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 */
	protected function Init()
	{
		parent::Init();

		// TODO: add controller-wide bootstrap code
	}
	
	/**
	 * This page requires ExampleUser::$PERMISSION_USER to view
	 */
	
	
	/**
	 * Display the login form
	 */
	

	public function ListView()
	{
		if($this->GetCurrentUser())
		{						
			//require 'translate/en.php';
			$lang=file_get_contents('libs/translate/en.php');
			$this->Assign("currentUser", $this->GetCurrentUser());
			$this->Assign("lang",$lang);
			$this->Render();
		}else{			
			$this->Render('Login');	
		}
	}

	public function Traducir(){
		if($this->GetCurrentUser()){
			$rs=$this->Phreezer->DataAdapter->Select('select nombre as original from categoria union 
				select titulo as texto from consejo union 
				select html as texto from consejo union
				select descripcion as texto from linea union
				select atributos as texto from linea union
				select nombre as texto from linea union 
				select resumen as texto from linea union
				select nombre_producto as texto from slider union
				select desc_sup_prod as texto from slider union 
				select desc_inf_prod as texto from slider union
				select tit_producto as texto from slider_ta union
				select tit_prop_1 as texto from slider_ta union
				select tit_prop_2 as texto from slider_ta union
				select tit_prop_3 as texto from slider_ta union
				select desc_prop_1 as texto from slider_ta union
				select desc_prop_2 as texto from slider_ta union
				select desc_prop_3 as texto from slider_ta union
				select texto from testimonio union
				select profesion as texto from testimonio');

			$lang=include('libs/translate/en.php');
			$added=0;
			$deleted=0;
			$aux=array();
			while ($reg=$this->Phreezer->DataAdapter->Fetch($rs)) {
				array_push($aux, $reg);
				if(!is_array($lang))$lang = array();			
				    
					if(!in_array_r($reg['original'], $lang)){
						$tr = new TranslateClient('es', 'en');
						$reg['traduccion']=$tr->translate($reg['original']);
						array_push($lang, $reg);						
						$added++;
					}	
				
				
			}
			//borro las entradas
			error_log("Borrando registros que ya no estan");
			foreach ($lang as $key => $value) {
				$buscar=$lang[$key]['original'];
				//error_log("buscando $buscar");
				if(!in_array_r($buscar,$aux)){
					error_log("borrar $key");
					unset($lang[$key]);
					$deleted++;
				};
			}		

			$file='libs/translate/en.php';
			file_put_contents($file,"<?php\nreturn ".var_export($lang,true).";");
			$this->RenderJSON(array('added' => $added, 'deleted'=>$deleted));
						
		}else{			
			$this->Render('Login');	
		}
		
			
	}

	public function guardarTraducciones()
	{
		try
		{
			
			$contenido=$_POST['texto'];//RequestUtil::GetBody();
			
			if (!$contenido)
			{
				throw new Exception('El contenido no es valido, no se guardaran los cambios');
			}
			$file='libs/translate/en.php';
			$fp = fopen($file, 'w');
			//if(file_put_contents($file,"<?php\nreturn ".var_export($contenido,true).";")){
			if(fwrite($fp, $contenido)){
				fclose($fp);
				$this->RenderJSON(array('success'=>'true'));
			}else{
				$this->RenderJSON(array('success'=>'false','msg'=>'No se pudo guardar el contenido. Revisar permisos del archivo'));
			}
			
			


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}


	
	
}
?>
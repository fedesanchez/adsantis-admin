<?php
/** @package    Anna De Santis::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Slider.php");

/**
 * SliderController is the controller class for the Slider object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package Anna De Santis::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class SliderController extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 *
	 * @inheritdocs
	 */
	protected function Init()
	{
		parent::Init();

		// TODO: add controller-wide bootstrap code
		
		// TODO: if authentiation is required for this entire controller, for example:
		// $this->RequirePermission(ExampleUser::$PERMISSION_USER,'SecureExample.LoginForm');
	}

	/**
	 * Displays a list view of Slider objects
	 */
	public function ListView()
	{
		if($this->GetCurrentUser())
		{						
			$this->Assign("currentUser", $this->GetCurrentUser());
			$this->Render();
		}else{			
			$this->Render('Login');	
		}
	}

	/**
	 * API Method queries for Slider records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new SliderCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdSlider,ImgFondo,ImgProducto,NombreProducto,DescSupProd,DescInfProd,Link,Orden,Habilitado'
				, '%'.$filter.'%')
			);

			// TODO: this is generic query filtering based only on criteria properties
			foreach (array_keys($_REQUEST) as $prop)
			{
				$prop_normal = ucfirst($prop);
				$prop_equals = $prop_normal.'_Equals';

				if (property_exists($criteria, $prop_normal))
				{
					$criteria->$prop_normal = RequestUtil::Get($prop);
				}
				elseif (property_exists($criteria, $prop_equals))
				{
					// this is a convenience so that the _Equals suffix is not needed
					$criteria->$prop_equals = RequestUtil::Get($prop);
				}
			}

			$output = new stdClass();

			// if a sort order was specified then specify in the criteria
 			$output->orderBy = RequestUtil::Get('orderBy');
 			$output->orderDesc = RequestUtil::Get('orderDesc') != '';
 			if ($output->orderBy) $criteria->SetOrder($output->orderBy, $output->orderDesc);

			$page = RequestUtil::Get('page');

			if ($page != '')
			{
				// if page is specified, use this instead (at the expense of one extra count query)
				$pagesize = $this->GetDefaultPageSize();

				$sliders = $this->Phreezer->Query('Slider',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $sliders->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $sliders->TotalResults;
				$output->totalPages = $sliders->TotalPages;
				$output->pageSize = $sliders->PageSize;
				$output->currentPage = $sliders->CurrentPage;
			}
			else
			{
				// return all results
				$sliders = $this->Phreezer->Query('Slider',$criteria);
				$output->rows = $sliders->ToObjectArray(true, $this->SimpleObjectParams());
				$output->totalResults = count($output->rows);
				$output->totalPages = 1;
				$output->pageSize = $output->totalResults;
				$output->currentPage = 1;
			}


			$this->RenderJSON($output, $this->JSONPCallback());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method retrieves a single Slider record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idSlider');
			$slider = $this->Phreezer->Get('Slider',$pk);
			$this->RenderJSON($slider, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Slider record and render response as JSON
	 */
	public function Create()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$slider = new Slider($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $slider->IdSlider = $this->SafeGetVal($json, 'idSlider');

			$slider->ImgFondo = $this->SafeGetVal($json, 'imgFondo');
			$slider->ImgProducto = $this->SafeGetVal($json, 'imgProducto');
			$slider->NombreProducto = $this->SafeGetVal($json, 'nombreProducto');
			$slider->DescSupProd = $this->SafeGetVal($json, 'descSupProd');
			$slider->DescInfProd = $this->SafeGetVal($json, 'descInfProd');
			$slider->Link = $this->SafeGetVal($json, 'link');
			$slider->Orden = $this->SafeGetVal($json, 'orden');
			$slider->Habilitado = $this->SafeGetVal($json, 'habilitado');

			$slider->Validate();
			$errors = $slider->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$slider->Save();
				$this->RenderJSON($slider, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Slider record and render response as JSON
	 */
	public function Update()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$pk = $this->GetRouter()->GetUrlParam('idSlider');
			$slider = $this->Phreezer->Get('Slider',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $slider->IdSlider = $this->SafeGetVal($json, 'idSlider', $slider->IdSlider);

			$slider->ImgFondo = $this->SafeGetVal($json, 'imgFondo', $slider->ImgFondo);
			$slider->ImgProducto = $this->SafeGetVal($json, 'imgProducto', $slider->ImgProducto);
			$slider->NombreProducto = $this->SafeGetVal($json, 'nombreProducto', $slider->NombreProducto);
			$slider->DescSupProd = $this->SafeGetVal($json, 'descSupProd', $slider->DescSupProd);
			$slider->DescInfProd = $this->SafeGetVal($json, 'descInfProd', $slider->DescInfProd);
			$slider->Link = $this->SafeGetVal($json, 'link', $slider->Link);
			$slider->Orden = $this->SafeGetVal($json, 'orden', $slider->Orden);
			$slider->Habilitado = $this->SafeGetVal($json, 'habilitado', $slider->Habilitado);

			$slider->Validate();
			$errors = $slider->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$slider->Save();
				$this->RenderJSON($slider, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Slider record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idSlider');
			$slider = $this->Phreezer->Get('Slider',$pk);

			$slider->Delete();

			$output = new stdClass();

			$this->RenderJSON($output, $this->JSONPCallback());

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}
}

?>

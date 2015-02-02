<?php
/** @package    Anna De Santis::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/SliderTa.php");

/**
 * SliderTaController is the controller class for the SliderTa object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package Anna De Santis::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class SliderTaController extends AppBaseController
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
	 * Displays a list view of SliderTa objects
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
	 * API Method queries for SliderTa records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new SliderTaCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdSliderTa,ImgProducto,TitProducto,TitProp1,DescProp1,TitProp2,DescProp2,TitProp3,DescProp3,Link,Orden,Habilitado'
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

				$slidertas = $this->Phreezer->Query('SliderTa',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $slidertas->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $slidertas->TotalResults;
				$output->totalPages = $slidertas->TotalPages;
				$output->pageSize = $slidertas->PageSize;
				$output->currentPage = $slidertas->CurrentPage;
			}
			else
			{
				// return all results
				$slidertas = $this->Phreezer->Query('SliderTa',$criteria);
				$output->rows = $slidertas->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single SliderTa record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idSliderTa');
			$sliderta = $this->Phreezer->Get('SliderTa',$pk);
			$this->RenderJSON($sliderta, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new SliderTa record and render response as JSON
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

			$sliderta = new SliderTa($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $sliderta->IdSliderTa = $this->SafeGetVal($json, 'idSliderTa');

			$sliderta->ImgProducto = $this->SafeGetVal($json, 'imgProducto');
			$sliderta->TitProducto = $this->SafeGetVal($json, 'titProducto');
			$sliderta->TitProp1 = $this->SafeGetVal($json, 'titProp1');
			$sliderta->DescProp1 = $this->SafeGetVal($json, 'descProp1');
			$sliderta->TitProp2 = $this->SafeGetVal($json, 'titProp2');
			$sliderta->DescProp2 = $this->SafeGetVal($json, 'descProp2');
			$sliderta->TitProp3 = $this->SafeGetVal($json, 'titProp3');
			$sliderta->DescProp3 = $this->SafeGetVal($json, 'descProp3');
			$sliderta->Link = $this->SafeGetVal($json, 'link');
			$sliderta->Orden = $this->SafeGetVal($json, 'orden');
			$sliderta->Habilitado = $this->SafeGetVal($json, 'habilitado');

			$sliderta->Validate();
			$errors = $sliderta->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$sliderta->Save();
				$this->RenderJSON($sliderta, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing SliderTa record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idSliderTa');
			$sliderta = $this->Phreezer->Get('SliderTa',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $sliderta->IdSliderTa = $this->SafeGetVal($json, 'idSliderTa', $sliderta->IdSliderTa);

			$sliderta->ImgProducto = $this->SafeGetVal($json, 'imgProducto', $sliderta->ImgProducto);
			$sliderta->TitProducto = $this->SafeGetVal($json, 'titProducto', $sliderta->TitProducto);
			$sliderta->TitProp1 = $this->SafeGetVal($json, 'titProp1', $sliderta->TitProp1);
			$sliderta->DescProp1 = $this->SafeGetVal($json, 'descProp1', $sliderta->DescProp1);
			$sliderta->TitProp2 = $this->SafeGetVal($json, 'titProp2', $sliderta->TitProp2);
			$sliderta->DescProp2 = $this->SafeGetVal($json, 'descProp2', $sliderta->DescProp2);
			$sliderta->TitProp3 = $this->SafeGetVal($json, 'titProp3', $sliderta->TitProp3);
			$sliderta->DescProp3 = $this->SafeGetVal($json, 'descProp3', $sliderta->DescProp3);
			$sliderta->Link = $this->SafeGetVal($json, 'link', $sliderta->Link);
			$sliderta->Orden = $this->SafeGetVal($json, 'orden', $sliderta->Orden);
			$sliderta->Habilitado = $this->SafeGetVal($json, 'habilitado', $sliderta->Habilitado);

			$sliderta->Validate();
			$errors = $sliderta->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$sliderta->Save();
				$this->RenderJSON($sliderta, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing SliderTa record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idSliderTa');
			$sliderta = $this->Phreezer->Get('SliderTa',$pk);

			$sliderta->Delete();

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

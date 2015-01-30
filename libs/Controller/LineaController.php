<?php
/** @package    Anna De Santis::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Linea.php");

/**
 * LineaController is the controller class for the Linea object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package Anna De Santis::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class LineaController extends AppBaseController
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
	 * Displays a list view of Linea objects
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
	 * API Method queries for Linea records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new LineaCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdLinea,IdCategoria,Img,Descripcion,Atributos'
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

				$lineas = $this->Phreezer->Query('Linea',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $lineas->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $lineas->TotalResults;
				$output->totalPages = $lineas->TotalPages;
				$output->pageSize = $lineas->PageSize;
				$output->currentPage = $lineas->CurrentPage;
			}
			else
			{
				// return all results
				$lineas = $this->Phreezer->Query('Linea',$criteria);
				$output->rows = $lineas->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Linea record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idLinea');
			$linea = $this->Phreezer->Get('Linea',$pk);
			$this->RenderJSON($linea, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Linea record and render response as JSON
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

			$linea = new Linea($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			$linea->IdLinea = $this->SafeGetVal($json, 'idLinea');
			$linea->IdCategoria = $this->SafeGetVal($json, 'idCategoria');
			$linea->Img = $this->SafeGetVal($json, 'img');
			$linea->Descripcion = $this->SafeGetVal($json, 'descripcion');
			$linea->Atributos = $this->SafeGetVal($json, 'atributos');

			$linea->Validate();
			$errors = $linea->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				// since the primary key is not auto-increment we must force the insert here
				$linea->Save(true);
				$this->RenderJSON($linea, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Linea record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idLinea');
			$linea = $this->Phreezer->Get('Linea',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $linea->IdLinea = $this->SafeGetVal($json, 'idLinea', $linea->IdLinea);

			$linea->IdCategoria = $this->SafeGetVal($json, 'idCategoria', $linea->IdCategoria);
			$linea->Img = $this->SafeGetVal($json, 'img', $linea->Img);
			$linea->Descripcion = $this->SafeGetVal($json, 'descripcion', $linea->Descripcion);
			$linea->Atributos = $this->SafeGetVal($json, 'atributos', $linea->Atributos);

			$linea->Validate();
			$errors = $linea->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$linea->Save();
				$this->RenderJSON($linea, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{

			// this table does not have an auto-increment primary key, so it is semantically correct to
			// issue a REST PUT request, however we have no way to know whether to insert or update.
			// if the record is not found, this exception will indicate that this is an insert request
			if (is_a($ex,'NotFoundException'))
			{
				return $this->Create();
			}

			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Linea record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idLinea');
			$linea = $this->Phreezer->Get('Linea',$pk);

			$linea->Delete();

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

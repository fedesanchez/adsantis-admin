<?php
/** @package    Anna De Santis::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Consejo.php");

/**
 * ConsejoController is the controller class for the Consejo object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package Anna De Santis::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class ConsejoController extends AppBaseController
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
	 * Displays a list view of Consejo objects
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
	 * API Method queries for Consejo records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new ConsejoCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdConsejo,Html,Titulo'
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

				$consejos = $this->Phreezer->Query('Consejo',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $consejos->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $consejos->TotalResults;
				$output->totalPages = $consejos->TotalPages;
				$output->pageSize = $consejos->PageSize;
				$output->currentPage = $consejos->CurrentPage;
			}
			else
			{
				// return all results
				$consejos = $this->Phreezer->Query('Consejo',$criteria);
				$output->rows = $consejos->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Consejo record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idConsejo');
			$consejo = $this->Phreezer->Get('Consejo',$pk);
			$this->RenderJSON($consejo, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Consejo record and render response as JSON
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

			$consejo = new Consejo($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $consejo->IdConsejo = $this->SafeGetVal($json, 'idConsejo');

			$consejo->Html = $this->SafeGetVal($json, 'html');
			$consejo->Titulo = $this->SafeGetVal($json, 'titulo');

			$consejo->Validate();
			$errors = $consejo->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$consejo->Save();
				$this->RenderJSON($consejo, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Consejo record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idConsejo');
			$consejo = $this->Phreezer->Get('Consejo',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $consejo->IdConsejo = $this->SafeGetVal($json, 'idConsejo', $consejo->IdConsejo);

			$consejo->Html = $this->SafeGetVal($json, 'html', $consejo->Html);
			$consejo->Titulo = $this->SafeGetVal($json, 'titulo', $consejo->Titulo);

			$consejo->Validate();
			$errors = $consejo->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$consejo->Save();
				$this->RenderJSON($consejo, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Consejo record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idConsejo');
			$consejo = $this->Phreezer->Get('Consejo',$pk);

			$consejo->Delete();

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

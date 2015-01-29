<?php
/** @package Cargo::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("App/User.php");

/**
 * SecureExampleController is a sample controller to demonstrate
 * one approach to authentication in a Phreeze app
 *
 * @package Cargo::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class SecureController extends AppBaseController
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
	public function LoginForm()
	{
		$this->Assign("currentUser", $this->GetCurrentUser());
		
		$this->Assign('page','login');
		$this->Render("Home");
	}
	
	/**
	 * Process the login, create the user session and then redirect to 
	 * the appropriate page
	 */
	public function Login()
	{
		$user = new User();
		
		if ($user->Login(RequestUtil::Get('username'), RequestUtil::Get('password')))
		{
			// login success
			$this->SetCurrentUser($user);

			$this->Redirect('Default.Home');
		}
		else
		{
			// login failed
			$this->Redirect('Default.Home','Los datos ingresados no son válidos.');
		}
	}
	
	/**
	 * Clear the user session and redirect to the login page
	 */
	public function Logout()
	{
		$this->ClearCurrentUser();
		$this->Redirect("Default.Home","You are now logged out");
	}

}
?>
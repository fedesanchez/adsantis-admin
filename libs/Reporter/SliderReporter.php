<?php
/** @package    Santis::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Slider object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Santis::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class SliderReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `slider` table
	public $CustomFieldExample;

	public $IdSlider;
	public $ImgFondo;
	public $ImgProducto;
	public $NombreProducto;
	public $DescSupProd;
	public $DescInfProd;
	public $Link;
	public $Orden;
	public $Habilitado;

	/*
	* GetCustomQuery returns a fully formed SQL statement.  The result columns
	* must match with the properties of this reporter object.
	*
	* @see Reporter::GetCustomQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomQuery($criteria)
	{
		$sql = "select
			'custom value here...' as CustomFieldExample
			,`slider`.`id_slider` as IdSlider
			,`slider`.`img_fondo` as ImgFondo
			,`slider`.`img_producto` as ImgProducto
			,`slider`.`nombre_producto` as NombreProducto
			,`slider`.`desc_sup_prod` as DescSupProd
			,`slider`.`desc_inf_prod` as DescInfProd
			,`slider`.`link` as Link
			,`slider`.`orden` as Orden
			,`slider`.`habilitado` as Habilitado
		from `slider`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();
		$sql .= $criteria->GetOrder();

		return $sql;
	}
	
	/*
	* GetCustomCountQuery returns a fully formed SQL statement that will count
	* the results.  This query must return the correct number of results that
	* GetCustomQuery would, given the same criteria
	*
	* @see Reporter::GetCustomCountQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomCountQuery($criteria)
	{
		$sql = "select count(1) as counter from `slider`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>
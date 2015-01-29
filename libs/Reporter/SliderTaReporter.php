<?php
/** @package    Santis::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the SliderTa object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Santis::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class SliderTaReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `slider_ta` table
	public $CustomFieldExample;

	public $IdSliderTa;
	public $ImgProducto;
	public $TitProducto;
	public $TitProp1;
	public $DescProp1;
	public $TitProp2;
	public $DescProp2;
	public $TitProp3;
	public $DescProp3;
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
			,`slider_ta`.`id_slider_ta` as IdSliderTa
			,`slider_ta`.`img_producto` as ImgProducto
			,`slider_ta`.`tit_producto` as TitProducto
			,`slider_ta`.`tit_prop_1` as TitProp1
			,`slider_ta`.`desc_prop_1` as DescProp1
			,`slider_ta`.`tit_prop_2` as TitProp2
			,`slider_ta`.`desc_prop_2` as DescProp2
			,`slider_ta`.`tit_prop_3` as TitProp3
			,`slider_ta`.`desc_prop_3` as DescProp3
			,`slider_ta`.`link` as Link
			,`slider_ta`.`orden` as Orden
			,`slider_ta`.`habilitado` as Habilitado
		from `slider_ta`";

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
		$sql = "select count(1) as counter from `slider_ta`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>
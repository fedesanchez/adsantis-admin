<?php
/** @package    Santis::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * SliderTaCriteria allows custom querying for the SliderTa object.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the ModelCriteria class which is extended from this class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @inheritdocs
 * @package Santis::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class SliderTaCriteriaDAO extends Criteria
{

	public $IdSliderTa_Equals;
	public $IdSliderTa_NotEquals;
	public $IdSliderTa_IsLike;
	public $IdSliderTa_IsNotLike;
	public $IdSliderTa_BeginsWith;
	public $IdSliderTa_EndsWith;
	public $IdSliderTa_GreaterThan;
	public $IdSliderTa_GreaterThanOrEqual;
	public $IdSliderTa_LessThan;
	public $IdSliderTa_LessThanOrEqual;
	public $IdSliderTa_In;
	public $IdSliderTa_IsNotEmpty;
	public $IdSliderTa_IsEmpty;
	public $IdSliderTa_BitwiseOr;
	public $IdSliderTa_BitwiseAnd;
	public $ImgProducto_Equals;
	public $ImgProducto_NotEquals;
	public $ImgProducto_IsLike;
	public $ImgProducto_IsNotLike;
	public $ImgProducto_BeginsWith;
	public $ImgProducto_EndsWith;
	public $ImgProducto_GreaterThan;
	public $ImgProducto_GreaterThanOrEqual;
	public $ImgProducto_LessThan;
	public $ImgProducto_LessThanOrEqual;
	public $ImgProducto_In;
	public $ImgProducto_IsNotEmpty;
	public $ImgProducto_IsEmpty;
	public $ImgProducto_BitwiseOr;
	public $ImgProducto_BitwiseAnd;
	public $TitProducto_Equals;
	public $TitProducto_NotEquals;
	public $TitProducto_IsLike;
	public $TitProducto_IsNotLike;
	public $TitProducto_BeginsWith;
	public $TitProducto_EndsWith;
	public $TitProducto_GreaterThan;
	public $TitProducto_GreaterThanOrEqual;
	public $TitProducto_LessThan;
	public $TitProducto_LessThanOrEqual;
	public $TitProducto_In;
	public $TitProducto_IsNotEmpty;
	public $TitProducto_IsEmpty;
	public $TitProducto_BitwiseOr;
	public $TitProducto_BitwiseAnd;
	public $TitProp1_Equals;
	public $TitProp1_NotEquals;
	public $TitProp1_IsLike;
	public $TitProp1_IsNotLike;
	public $TitProp1_BeginsWith;
	public $TitProp1_EndsWith;
	public $TitProp1_GreaterThan;
	public $TitProp1_GreaterThanOrEqual;
	public $TitProp1_LessThan;
	public $TitProp1_LessThanOrEqual;
	public $TitProp1_In;
	public $TitProp1_IsNotEmpty;
	public $TitProp1_IsEmpty;
	public $TitProp1_BitwiseOr;
	public $TitProp1_BitwiseAnd;
	public $DescProp1_Equals;
	public $DescProp1_NotEquals;
	public $DescProp1_IsLike;
	public $DescProp1_IsNotLike;
	public $DescProp1_BeginsWith;
	public $DescProp1_EndsWith;
	public $DescProp1_GreaterThan;
	public $DescProp1_GreaterThanOrEqual;
	public $DescProp1_LessThan;
	public $DescProp1_LessThanOrEqual;
	public $DescProp1_In;
	public $DescProp1_IsNotEmpty;
	public $DescProp1_IsEmpty;
	public $DescProp1_BitwiseOr;
	public $DescProp1_BitwiseAnd;
	public $TitProp2_Equals;
	public $TitProp2_NotEquals;
	public $TitProp2_IsLike;
	public $TitProp2_IsNotLike;
	public $TitProp2_BeginsWith;
	public $TitProp2_EndsWith;
	public $TitProp2_GreaterThan;
	public $TitProp2_GreaterThanOrEqual;
	public $TitProp2_LessThan;
	public $TitProp2_LessThanOrEqual;
	public $TitProp2_In;
	public $TitProp2_IsNotEmpty;
	public $TitProp2_IsEmpty;
	public $TitProp2_BitwiseOr;
	public $TitProp2_BitwiseAnd;
	public $DescProp2_Equals;
	public $DescProp2_NotEquals;
	public $DescProp2_IsLike;
	public $DescProp2_IsNotLike;
	public $DescProp2_BeginsWith;
	public $DescProp2_EndsWith;
	public $DescProp2_GreaterThan;
	public $DescProp2_GreaterThanOrEqual;
	public $DescProp2_LessThan;
	public $DescProp2_LessThanOrEqual;
	public $DescProp2_In;
	public $DescProp2_IsNotEmpty;
	public $DescProp2_IsEmpty;
	public $DescProp2_BitwiseOr;
	public $DescProp2_BitwiseAnd;
	public $TitProp3_Equals;
	public $TitProp3_NotEquals;
	public $TitProp3_IsLike;
	public $TitProp3_IsNotLike;
	public $TitProp3_BeginsWith;
	public $TitProp3_EndsWith;
	public $TitProp3_GreaterThan;
	public $TitProp3_GreaterThanOrEqual;
	public $TitProp3_LessThan;
	public $TitProp3_LessThanOrEqual;
	public $TitProp3_In;
	public $TitProp3_IsNotEmpty;
	public $TitProp3_IsEmpty;
	public $TitProp3_BitwiseOr;
	public $TitProp3_BitwiseAnd;
	public $DescProp3_Equals;
	public $DescProp3_NotEquals;
	public $DescProp3_IsLike;
	public $DescProp3_IsNotLike;
	public $DescProp3_BeginsWith;
	public $DescProp3_EndsWith;
	public $DescProp3_GreaterThan;
	public $DescProp3_GreaterThanOrEqual;
	public $DescProp3_LessThan;
	public $DescProp3_LessThanOrEqual;
	public $DescProp3_In;
	public $DescProp3_IsNotEmpty;
	public $DescProp3_IsEmpty;
	public $DescProp3_BitwiseOr;
	public $DescProp3_BitwiseAnd;
	public $Link_Equals;
	public $Link_NotEquals;
	public $Link_IsLike;
	public $Link_IsNotLike;
	public $Link_BeginsWith;
	public $Link_EndsWith;
	public $Link_GreaterThan;
	public $Link_GreaterThanOrEqual;
	public $Link_LessThan;
	public $Link_LessThanOrEqual;
	public $Link_In;
	public $Link_IsNotEmpty;
	public $Link_IsEmpty;
	public $Link_BitwiseOr;
	public $Link_BitwiseAnd;
	public $Orden_Equals;
	public $Orden_NotEquals;
	public $Orden_IsLike;
	public $Orden_IsNotLike;
	public $Orden_BeginsWith;
	public $Orden_EndsWith;
	public $Orden_GreaterThan;
	public $Orden_GreaterThanOrEqual;
	public $Orden_LessThan;
	public $Orden_LessThanOrEqual;
	public $Orden_In;
	public $Orden_IsNotEmpty;
	public $Orden_IsEmpty;
	public $Orden_BitwiseOr;
	public $Orden_BitwiseAnd;
	public $Habilitado_Equals;
	public $Habilitado_NotEquals;
	public $Habilitado_IsLike;
	public $Habilitado_IsNotLike;
	public $Habilitado_BeginsWith;
	public $Habilitado_EndsWith;
	public $Habilitado_GreaterThan;
	public $Habilitado_GreaterThanOrEqual;
	public $Habilitado_LessThan;
	public $Habilitado_LessThanOrEqual;
	public $Habilitado_In;
	public $Habilitado_IsNotEmpty;
	public $Habilitado_IsEmpty;
	public $Habilitado_BitwiseOr;
	public $Habilitado_BitwiseAnd;

}

?>
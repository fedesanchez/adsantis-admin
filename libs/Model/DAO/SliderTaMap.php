<?php
/** @package    Santis::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * SliderTaMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the SliderTaDAO to the slider_ta datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Santis::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class SliderTaMap implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
			self::$FM = Array();
			self::$FM["IdSliderTa"] = new FieldMap("IdSliderTa","slider_ta","id_slider_ta",true,FM_TYPE_INT,10,null,true);
			self::$FM["ImgProducto"] = new FieldMap("ImgProducto","slider_ta","img_producto",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["TitProducto"] = new FieldMap("TitProducto","slider_ta","tit_producto",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["TitProp1"] = new FieldMap("TitProp1","slider_ta","tit_prop_1",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["DescProp1"] = new FieldMap("DescProp1","slider_ta","desc_prop_1",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["TitProp2"] = new FieldMap("TitProp2","slider_ta","tit_prop_2",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["DescProp2"] = new FieldMap("DescProp2","slider_ta","desc_prop_2",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["TitProp3"] = new FieldMap("TitProp3","slider_ta","tit_prop_3",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["DescProp3"] = new FieldMap("DescProp3","slider_ta","desc_prop_3",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Link"] = new FieldMap("Link","slider_ta","link",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Orden"] = new FieldMap("Orden","slider_ta","orden",false,FM_TYPE_INT,10,null,false);
			self::$FM["Habilitado"] = new FieldMap("Habilitado","slider_ta","habilitado",false,FM_TYPE_TINYINT,4,null,false);
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
		}
		return self::$KM;
	}

}

?>
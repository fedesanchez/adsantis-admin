<?php
/** @package    Santis::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * SliderMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the SliderDAO to the slider datastore.
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
class SliderMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdSlider"] = new FieldMap("IdSlider","slider","id_slider",true,FM_TYPE_INT,11,null,true);
			self::$FM["ImgFondo"] = new FieldMap("ImgFondo","slider","img_fondo",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["ImgProducto"] = new FieldMap("ImgProducto","slider","img_producto",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["NombreProducto"] = new FieldMap("NombreProducto","slider","nombre_producto",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["DescSupProd"] = new FieldMap("DescSupProd","slider","desc_sup_prod",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["DescInfProd"] = new FieldMap("DescInfProd","slider","desc_inf_prod",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Link"] = new FieldMap("Link","slider","link",false,FM_TYPE_VARCHAR,255,"#",false);
			self::$FM["Orden"] = new FieldMap("Orden","slider","orden",false,FM_TYPE_INT,10,null,false);
			self::$FM["Habilitado"] = new FieldMap("Habilitado","slider","habilitado",false,FM_TYPE_TINYINT,4,null,false);
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
<?php
/** @package    Santis::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * LineaMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the LineaDAO to the linea datastore.
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
class LineaMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdLinea"] = new FieldMap("IdLinea","linea","id_linea",true,FM_TYPE_INT,11,null,true);
			self::$FM["IdCategoria"] = new FieldMap("IdCategoria","linea","id_categoria",false,FM_TYPE_INT,11,null,false);
			self::$FM["Img"] = new FieldMap("Img","linea","img",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Resumen"] = new FieldMap("Resumen","linea","resumen",false,FM_TYPE_TEXT,null,null,false);
			self::$FM["Descripcion"] = new FieldMap("Descripcion","linea","descripcion",false,FM_TYPE_TEXT,null,null,false);
			self::$FM["Atributos"] = new FieldMap("Atributos","linea","atributos",false,FM_TYPE_TEXT,null,null,false);
			self::$FM["Nombre"] = new FieldMap("Nombre","linea","nombre",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Novedad"] = new FieldMap("Novedad","linea","novedad",false,FM_TYPE_TINYINT,4,null,false);
			self::$FM["ColorFondo"] = new FieldMap("ColorFondo","linea","color_fondo",false,FM_TYPE_VARCHAR,45,null,false);
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
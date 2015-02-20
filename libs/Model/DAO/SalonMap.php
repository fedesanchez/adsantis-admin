<?php
/** @package    Puntos::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * SalonMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the SalonDAO to the salon datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Puntos::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class SalonMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdSalon"] = new FieldMap("IdSalon","salon","id_salon",true,FM_TYPE_INT,11,null,true);
			self::$FM["Nombre"] = new FieldMap("Nombre","salon","nombre",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Direccion"] = new FieldMap("Direccion","salon","direccion",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Telefono"] = new FieldMap("Telefono","salon","telefono",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Email"] = new FieldMap("Email","salon","email",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Latitud"] = new FieldMap("Latitud","salon","latitud",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Longitud"] = new FieldMap("Longitud","salon","longitud",false,FM_TYPE_VARCHAR,45,null,false);
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
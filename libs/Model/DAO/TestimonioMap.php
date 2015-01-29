<?php
/** @package    Santis::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * TestimonioMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the TestimonioDAO to the testimonio datastore.
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
class TestimonioMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdTestimonio"] = new FieldMap("IdTestimonio","testimonio","id_testimonio",true,FM_TYPE_INT,11,null,true);
			self::$FM["Texto"] = new FieldMap("Texto","testimonio","texto",false,FM_TYPE_LONGTEXT,null,null,false);
			self::$FM["Autor"] = new FieldMap("Autor","testimonio","autor",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Profesion"] = new FieldMap("Profesion","testimonio","profesion",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Img"] = new FieldMap("Img","testimonio","img",false,FM_TYPE_VARCHAR,255,null,false);
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